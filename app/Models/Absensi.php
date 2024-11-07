<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    // Tambahkan kolom-kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'waktu_absen',
    ];
}
