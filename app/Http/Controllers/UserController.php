<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        
        return view('screen.account_manage', compact('users'));
    }

    public function suspend(Request $request, $id)
    {
        $request->validate([
            'duration' => 'required|integer|min:1|max:10', 
        ]);
        $user = User::findOrFail($id);
        $user->banned_until = now()->addMinutes($request->integer('duration'));
        $user->save();
        return redirect()->back()->with('success', "Akun {$user->name} berhasil di-suspend selama {$request->duration} menit.");
    }
    public function unban($id)
    {
        $user = User::findOrFail($id);
        
        // Hapus waktu ban agar user bisa login lagi
        $user->banned_until = null;
        $user->save();

        return redirect()->back()->with('success', "Suspend akun {$user->name} berhasil dibatalkan.");
    }
}