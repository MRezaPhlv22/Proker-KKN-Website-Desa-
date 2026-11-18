<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesaProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'sejarah_desa',
        'visi',        
        'misi',        
        'alamat_kantor',
        'telepon_kantor',
        'email_kantor',
        'link_facebook',
        'link_tiktok',
        'link_instagram',
        'link_youtube',
        'latitude',
        'longitude',
        'statistik_desa', 
    ];

    protected $casts = [
        'statistik_desa' => 'array', // Laravel akan otomatis meng-cast ke array/JSON
    ];
}