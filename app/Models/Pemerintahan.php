<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemerintahan extends Model
{
    use HasFactory;

    protected $table = 'pemerintahan'; // Pastikan nama tabelnya 'pemerintahan' (lowercase, plural by default Laravel)

    protected $fillable = [
        'nama',
        'jabatan',
        'deskripsi',
        'foto',
    ];
}