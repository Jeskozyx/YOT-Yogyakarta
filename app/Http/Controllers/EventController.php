<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function divisionPage()
    {
        $divisions = Event::select('divisi')
                          ->whereNotNull('divisi')
                          ->distinct()
                          ->pluck('divisi');

        $events = Event::whereNotNull('foto')
                       ->where('foto', '!=', '')
                       ->latest('tanggal_pelaksanaan')
                       ->get();

        return view('users.division', compact('divisions', 'events'));
    }

    public function create()
    {
        return view('screen.kegiatan');
    }

    public function documentation(Request $request)
    {
        $query = Event::whereNotNull('foto')
                      ->where('foto', '!=', '');

        $user = auth()->user();
        if ($user && $user->role === 'coordinator') {
            $query->where('divisi', $user->division);
        }

        if ($request->filled('kegiatan')) {
            $query->where('id', $request->kegiatan);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_pelaksanaan', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_pelaksanaan', $request->tahun);
        }

        $events = $query->latest('tanggal_pelaksanaan')->paginate(9);

       $filterOptionsQuery = Event::whereNotNull('foto')->select('id', 'nama_kegiatan');

       if ($user && $user->role === 'coordinator') {
           $filterOptionsQuery->where('divisi', $user->division);
       }

       $filterOptions = $filterOptionsQuery->latest()->get();

        return view('screen.documentations', compact('events', 'filterOptions'));  
    }

    public function store(Request $request)
    {
        // Logging request
        Log::info('=== KEGIATAN STORE REQUEST ===');
        Log::info('All Input:', $request->all());
        Log::info('All Files:', $request->allFiles());

        // Validasi
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200000',
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255',
            'jabatan' => 'nullable|array',
            'jabatan.*' => 'nullable|string|max:255',
        ]);

        // Handle foto dengan safe check
        $fotoPath = null;
        try {
            if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                $fotoPath = $request->file('foto')->store('events', 'public');
                Log::info('✅ Foto uploaded:', ['path' => $fotoPath]);
            }
        } catch (\Exception $e) {
            Log::error('❌ Foto upload error:', ['message' => $e->getMessage()]);
        }

        // Proses anggota
        $anggotaData = [];
        if ($request->nama_anggota && is_array($request->nama_anggota)) {
            foreach ($request->nama_anggota as $index => $nama) {
                if (!empty(trim($nama))) {
                    $anggotaData[] = [
                        'nama' => trim($nama),
                        'jabatan' => $request->jabatan[$index] ?? 'Anggota'
                    ];
                }
            }
        }

        // Create event
        Event::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'lokasi_kegiatan'=> $request->lokasi_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'anggota' => $anggotaData,
            'divisi' => auth()->user()->division ?? 'GENERAL',
            'user_id' => auth()->id(),
        ]);

        Log::info('✅ Event created successfully');

        return redirect()->route('documentations')
            ->with('success', 'Kegiatan berhasil dibuat!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('screen.kegiatan', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200000',
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255',
            'jabatan' => 'nullable|array',
            'jabatan.*' => 'nullable|string|max:255',
        ]);

        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            'lokasi_kegiatan'=> $request->lokasi_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle upload foto
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Delete old photo if exists
            if ($event->foto && Storage::disk('public')->exists($event->foto)) {
                Storage::disk('public')->delete($event->foto);
            }
            $data['foto'] = $request->file('foto')->store('events', 'public');
        }

        // Proses data anggota dan jabatan
        $anggotaData = [];
        if ($request->nama_anggota && is_array($request->nama_anggota)) {
            foreach ($request->nama_anggota as $index => $nama) {
                if (!empty(trim($nama))) {
                    $anggotaData[] = [
                        'nama' => trim($nama),
                        'jabatan' => $request->jabatan[$index] ?? 'Anggota'
                    ];
                }
            }
        }
        $data['anggota'] = $anggotaData;

        $event->update($data);

        return redirect()->route('documentations')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        if ($event->foto && Storage::disk('public')->exists($event->foto)) {
            Storage::disk('public')->delete($event->foto);
        }

        $event->delete();

        return redirect()->back()->with('success', 'Kegiatan berhasil dihapus!');
    }
}