<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import View facade
use App\Models\DesaProfile; // Import model DesaProfile

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftarkan View Composer untuk view-view yang akan menggunakan footer
        // Ganti daftar view ini sesuai dengan nama view yang akan menampilkan footer Anda
        View::composer([
            'welcome',                   // Contoh: halaman utama
            'profildesa.profildesa',     // Halaman profil desa
            'profildesa.strukturDesa',   // Halaman struktur desa
            'profildesa.galeri',     // Halaman galeri desa 
            'umkm.daftarumkm',

            // Tambahkan view lain di sini yang membutuhkan footer
        ], function ($view) {
            $profilDesa = DesaProfile::firstOrCreate([]);
            $view->with('profilDesa', $profilDesa);
        });

        // Catatan: Jika Anda ingin '$profilDesa' tersedia di SEMUA view tanpa terkecuali,
        // Anda bisa menggunakan: View::share('profilDesa', DesaProfile::firstOrCreate([]));
        // Namun, gunakan secara bijak karena ini akan memuat data di setiap halaman.
    }
}