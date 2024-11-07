<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis
            $table->string('nis'); // Kolom NIS
            $table->string('nama'); // Kolom Nama
            $table->string('kelas'); // Kolom Kelas
            $table->string('gambar'); // Kolom Kelas
            $table->string('rfid_id'); // Kolom ID RFID
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}

