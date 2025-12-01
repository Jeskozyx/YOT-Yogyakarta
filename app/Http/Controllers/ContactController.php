<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Wajib import ini

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Validasi Input (Opsional tapi disarankan)
        $request->validate([
            'nama' => 'required',
            'nowa' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        // 2. Ambil data
        $nama = $request->input('nama');
        $nowa = $request->input('nowa');
        $email = $request->input('email');
        $isiPesan = $request->input('pesan');

        // 3. Setup Token Fonnte (Daftar di fonnte.com untuk dapat token)
        $token = 'gsg6EWBqr39DEhAJbHTo'; 

        // 4. Nomor Admin (Tujuan Pesan)
        $target = '087738438643'; 

        // 5. Susun Pesan
        $message = "*Pesan Baru dari Website YOT Yogya*\n\n" .
                   "Nama: $nama\n" .
                   "Email: $email\n" .
                   "WA User: $nowa\n\n" .
                   "Pesan:\n$isiPesan";

        // 6. Kirim ke API Fonnte
// Tambahkan withoutVerifying()
$response = Http::withoutVerifying()->withHeaders([
    'Authorization' => $token,
])->post('https://api.fonnte.com/send', [
    'target' => $target,
    'message' => $message,
]);

        // 7. Cek status pengiriman (opsional, untuk debugging)
        // if ($response->failed()) {
        //     return back()->with('error', 'Gagal mengirim pesan.');
        // }

        // 8. Redirect kembali dengan pesan sukses
        return back()->with('success', 'Terima kasih! Pesan Anda telah terkirim ke Admin.');
    }
}