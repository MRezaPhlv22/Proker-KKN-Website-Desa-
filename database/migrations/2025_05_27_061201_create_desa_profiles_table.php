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
        Schema::create('desa_profiles', function (Blueprint $table) {
            $table->id();
            $table->longText('sejarah_desa')->nullable();
            $table->longText('visi_misi')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->string('telepon_kantor')->nullable();
            $table->string('email_kantor')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_tiktok')->nullable();
            $table->string('link_youtube')->nullable();
            $table->string('latitude')->nullable(); // Untuk koordinat peta
            $table->string('longitude')->nullable(); // Untuk koordinat peta
            $table->json('statistik_desa')->nullable(); // Untuk menyimpan array statistik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_profiles');
    }
};