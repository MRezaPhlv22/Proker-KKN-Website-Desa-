<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_umkm',
        'pemilik',
        'kategori',
        'alamat',
        'kontak',
        'gambar',
    ];

    // Relasi dengan Produk (satu UMKM memiliki banyak Produk)
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}