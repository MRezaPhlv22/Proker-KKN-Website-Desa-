<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\Produk;
use App\Models\DesaProfile; // Import model DesaProfile untuk footer

class UmkmController extends Controller
{
    public function detail($id)
    {
        $umkm = Umkm::with('produks')->findOrFail($id); // Gunakan 'produks' sesuai relasi di model Umkm
        return view('umkm.detailumkm', compact('umkm'));
    }

 public function daftarumkm()
    {
        // Ubah ini untuk pagination UMKM
        $umkms = Umkm::latest()->paginate(8); // Misalnya, tampilkan 8 UMKM per halaman
        $profilDesa = DesaProfile::firstOrCreate([]);

        // Ubah ini untuk pagination Produk
        $produks = Produk::with('umkm')->latest()->paginate(8); // Misalnya, tampilkan 8 Produk per halaman

        return view('umkm.daftarumkm', compact('umkms', 'profilDesa', 'produks'));
    }

public function store(Request $request)
{
    $data = $request->validate([
        'nama_umkm' => 'required',
        'pemilik' => 'required',
        'kategori' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
    }

    Umkm::create($data);
    return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
}


public function update(Request $request, Umkm $umkm)
{
    $data = $request->validate([
        'nama_umkm' => 'required',
        'pemilik' => 'required',
        'kategori' => 'required',
        'alamat' => 'required',
        'kontak' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('umkm', 'public');
    }

    

    $umkm->update($data);
    return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diupdate!');
}



}
