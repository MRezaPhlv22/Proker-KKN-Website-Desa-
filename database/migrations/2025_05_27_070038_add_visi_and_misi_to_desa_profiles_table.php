<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('desa_profiles', function (Blueprint $table) {
            // Hapus kolom visi_misi yang lama (jika ada)
            // Pastikan kolom ini benar-benar ada sebelum menghapusnya.
            // Jika Anda belum pernah menjalankan migrasi sebelumnya yang menambahkan visi_misi,
            // baris ini mungkin tidak perlu atau bisa menyebabkan error jika kolom tidak ada.
            if (Schema::hasColumn('desa_profiles', 'visi_misi')) {
                $table->dropColumn('visi_misi');
            }

            // Tambahkan kolom baru
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desa_profiles', function (Blueprint $table) {
            // Saat rollback, hapus kolom baru
            if (Schema::hasColumn('desa_profiles', 'visi')) {
                $table->dropColumn('visi');
            }
            if (Schema::hasColumn('desa_profiles', 'misi')) {
                $table->dropColumn('misi');
            }
            // Tambahkan kembali kolom visi_misi jika sebelumnya ada dan Anda ingin mengembalikannya
            // $table->longText('visi_misi')->nullable();
        });
    }
};