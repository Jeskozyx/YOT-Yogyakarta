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
}