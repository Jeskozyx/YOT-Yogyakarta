<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskNote extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'date',
        'status',
        'tags',
        'collaborators',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
