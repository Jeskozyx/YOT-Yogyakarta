<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->date('tanggal_pelaksanaan');
            $table->text('deskripsi');
            $table->json('anggota')->nullable(); // Untuk menyimpan multiple anggota
            $table->string('divisi'); // Akan otomatis terisi berdasarkan user yang login
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke user yang membuat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};