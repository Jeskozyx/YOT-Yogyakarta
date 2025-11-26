<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'coordinator') {
            $events = Event::where('divisi', $user->division)->get();
        } else {
            $events = Event::all();
        }

        $users = User::all();
        return view('dashboard', compact('events', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('screen.kegiatan', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'deskripsi' => 'required',
            'user_id' => 'required',
        ]);

        $data = $request->all();
        $data['divisi'] = auth()->user()->division; // Set division from logged in user

        Event::create($data);
        return redirect()->route('dashboard')->with('success', 'Event berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        return view('screen.kegiatan', compact('event', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        return view('screen.kegiatan', compact('event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Event berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('dashboard')->with('success', 'Event berhasil dihapus');
    }
}
