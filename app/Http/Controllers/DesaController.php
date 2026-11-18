<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemerintahan; // Pastikan ini sudah diimport
use App\Models\DesaProfile; // Pastikan ini sudah diimport (jika Anda juga butuh data profil di welcome page)
use App\Models\Umkm; // Jika Anda menampilkan UMKM di welcome page
use App\Models\Produk; // Jika Anda menampilkan Produk di welcome page
use App\Models\Galeri; // Jika Anda menampilkan Galeri di welcome page


class DesaController extends Controller
{
    public function welcome()
    {
        // Ambil semua data pejabat dari tabel 'pemerintahan'
        // Anda bisa mengurutkannya berdasarkan 'jabatan' atau 'created_at'
        // Di sini saya akan mengambil semua dan mengurutkannya nanti di view jika diperlukan,
        // atau Anda bisa mengambil yang spesifik seperti Kepala Desa, Sekretaris Desa.
        // Untuk contoh ini, saya akan mengambil semua dan menampilkannya.
        // Jika Anda ingin menonjolkan Kepala Desa dan Sekretaris Desa,
        // bisa seperti yang saya contohkan di jawaban sebelumnya.

        // Ambil data pejabat yang akan ditampilkan di halaman depan
        // Contoh: Ambil Kepala Desa, Sekretaris Desa, dan 3 pejabat lainnya
        $kepalaDesa = Pemerintahan::where('jabatan', 'Kepala Desa')->first();
        $sekretarisDesa = Pemerintahan::where('jabatan', 'Sekretaris Desa')->first();
        $otherPemerintahan = Pemerintahan::whereNotIn('jabatan', ['Kepala Desa', 'Sekretaris Desa'])
                                         ->orderBy('jabatan') // Urutkan berdasarkan jabatan atau created_at
                                         ->take(3) // Ambil 3 pejabat lainnya saja untuk tampilan ringkas
                                         ->get();

        // Anda juga mungkin ingin mengambil data lain untuk welcome page, contoh:
        $profilDesa = DesaProfile::firstOrCreate([]); // Ambil data profil, atau buat jika belum ada
        $latestUmkms = Umkm::latest()->take(3)->get();
        $latestProduks = Produk::latest()->take(3)->get(); // Mengambil 3 produk terbaru dari database
        $latestGaleri = Galeri::latest()->take(6)->get(); // Mengambil 6 item galeri terbaru


        return view('welcome', compact(
            'kepalaDesa',
            'sekretarisDesa',
            'otherPemerintahan',
            'profilDesa', // Jika dibutuhkan di welcome page
            'latestUmkms', // Jika dibutuhkan di welcome page
            'latestProduks', // Jika dibutuhkan di welcome page
            'latestGaleri' // Jika dibutuhkan di welcome page
        ));
    }

    public function index() // Ini untuk profil desa yang lebih lengkap
    {
         // Ambil data profil desa pertama, atau buat jika belum ada (kosong)
        $profilDesa = DesaProfile::firstOrCreate([]);

        // Kirim data profil desa ke view
        return view('profildesa.profildesa', compact('profilDesa'));
    }

    // Fungsi untuk menampilkan struktur desa (strukturDesa.blade.php)
    public function struktur()
    {
        // Ambil data pejabat utama
        $kepalaDesa = Pemerintahan::where('jabatan', 'Kepala Desa')->first();
        $sekretarisDesa = Pemerintahan::where('jabatan', 'Sekretaris Desa')->first();

        // Ambil semua data Kasi dan Kaur, lalu kelompokkan berdasarkan jabatan
        $allKasi = Pemerintahan::where('jabatan', 'like', 'Kasi%')->get()->groupBy('jabatan');
        $allKaur = Pemerintahan::where('jabatan', 'like', 'Kaur%')->get()->groupBy('jabatan');

        // Ambil semua data Kadus dan kelompokkan berdasarkan nama jabatan lengkapnya
        $allKadus = Pemerintahan::where('jabatan', 'like', 'Kepala Dusun%')->get()->groupBy('jabatan');

        return view('profildesa.strukturDesa', compact(
            'kepalaDesa',
            'sekretarisDesa',
            'allKasi',
            'allKaur',
            'allKadus'
        ));
    }
    
    // Fungsi untuk galeri (jika ada)
    public function galeri()
{
    $galeriItems = Galeri::latest()->paginate(9); // Contoh: 9 item per halaman
    return view('profildesa.galeri', compact('galeriItems'));
}
}