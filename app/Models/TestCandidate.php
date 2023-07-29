<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCandidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'jenis_kelamin',
        'alamat',
    ];
}
