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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitras')->onDelete('cascade');
            $table->string('nama_lowongan');
            $table->string('lokasi_lowongan');
            $table->string('deskripsi_lowongan');
            $table->string('kriteria_lowongan')->nullable();
            $table->integer('gaji_batas_awal')->nullable();
            $table->integer('gaji_batas_akhir')->nullable();
            $table->tinyInteger('level_lowongan')->default(1); // dasar menengah ahli
            $table->tinyInteger('tipe_lowongan')->default(1); // paruh waktu penuh waktu remote
            $table->tinyInteger('kategori_lowongan')->default(1); // design pemrograman ai engginer 
            $table->tinyInteger('is_aktif')->default(0); // 0 non aktif 1 aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
