<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'lokasi_kegiatan',
        'tanggal_pelaksanaan',
        'deskripsi',
        'foto', 
        'anggota',
        'divisi',
        'user_id'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date',
        'anggota' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByUserDivision($query)
    {
        return $query->where('divisi', auth()->user()->role);
    }
}