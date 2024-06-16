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
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_create_on_mitra_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('email')->unique();
            $table->bigInteger('no_hp')->nullable();
            $table->date('tahun_berdiri')->nullable();
            $table->string('deskripsi_perusahaan')->nullable();
            $table->string('karakteristik_perusahaan')->nullable();
            $table->string('latarbelakang_pengajuan')->nullable();
            $table->string('alamat')->nullable();
            $table->tinyInteger('rt')->nullable();
            $table->tinyInteger('rw')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('foto')->nullable(); 
            $table->tinyInteger('user_type')->default(1);
            $table->tinyInteger('is_aktif')->default(0);
            $table->string('username')->nullable();
            $table->string('password_mentah')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
