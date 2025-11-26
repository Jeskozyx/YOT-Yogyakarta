<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function create()
    {
        return view('screen.kegiatan');
    }

    public function documentation(Request $request)
    {
        // 1. Query Dasar: Ambil event yang punya foto saja
        $query = Event::whereNotNull('foto')
                      ->where('foto', '!=', '');

        // Filter Divisi
        $user = auth()->user();
        if ($user && $user->role === 'coordinator') {
            $query->where('divisi', $user->division);
        }

        // 2. Logika Filter (Berdasarkan Input User)
        
        // Filter by Nama Kegiatan (ID)
        if ($request->filled('kegiatan')) {
            $query->where('id', $request->kegiatan);
        }

        // Filter by Bulan
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_pelaksanaan', $request->bulan);
        }

        // Filter by Tahun
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
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:200000',
            'nama_anggota' => 'nullable|array',
            'nama_anggota.*' => 'nullable|string|max:255',
            'jabatan' => 'nullable|array',
            'jabatan.*' => 'nullable|string|max:255',
        ]);

        // Handle upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('events', 'public');
        }

        // Proses data anggota dan jabatan
        $anggotaData = [];
        if ($request->nama_anggota) {
            foreach ($request->nama_anggota as $index => $nama) {
                if (!empty(trim($nama))) {
                    $anggotaData[] = [
                        'nama' => $nama,
                        'jabatan' => $request->jabatan[$index] ?? 'Anggota'
                    ];
                }
            }
        }

        Event::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'anggota' => $anggotaData,
            'divisi' => auth()->user()->division,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('kegiatan')
            ->with('success', 'Kegiatan berhasil dibuat!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        // Check authorization if needed (e.g., only own division) - skipping for now as requested "all roles can edit"
        return view('screen.kegiatan', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
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
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'deskripsi' => $request->deskripsi,
        ];

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($event->foto && Storage::disk('public')->exists($event->foto)) {
                Storage::disk('public')->delete($event->foto);
            }
            $data['foto'] = $request->file('foto')->store('events', 'public');
        }

        // Proses data anggota dan jabatan
        $anggotaData = [];
        if ($request->nama_anggota) {
            foreach ($request->nama_anggota as $index => $nama) {
                if (!empty(trim($nama))) {
                    $anggotaData[] = [
                        'nama' => $nama,
                        'jabatan' => $request->jabatan[$index] ?? 'Anggota'
                    ];
                }
            }
        }
        $data['anggota'] = $anggotaData;

        $event->update($data);

        return redirect()->route('documentations') // Redirect back to documentations
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