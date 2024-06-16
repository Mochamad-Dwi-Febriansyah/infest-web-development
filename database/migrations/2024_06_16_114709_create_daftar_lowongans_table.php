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
        Schema::create('daftar_lowongans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitras')->onDelete('cascade');
            $table->foreignId('user_pelamar_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('lowongan_id')->constrained('lowongans')->onDelete('cascade');
            $table->string('ktp')->nullable();
            $table->string('cv')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('dokumen_pendukung');
            $table->string('keterangan_lainnya');
            $table->tinyInteger('is_aktif')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_lowongans');
    }
};
