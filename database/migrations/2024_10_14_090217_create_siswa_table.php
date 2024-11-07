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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('rfid_id')->unique(); // Kolom untuk menyimpan ID RFID
            $table->string('nis')->unique();      // NIS siswa
            $table->string('nama');               // Nama siswa
            $table->string('kelas');              // Kelas siswa
            $table->string('gambar');              // Kelas siswa
            $table->timestamps();                 // Timestamps (created_at, updated_at)
        });               
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
