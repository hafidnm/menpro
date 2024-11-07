<?php
namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Absensi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKelas = 9; // Set static number of classes
        $totalSiswa = Siswa::count(); // Dynamic count of students
        $absenHariIni = Absensi::whereDate('created_at', Carbon::today())->count(); // Count of today's attendance

        return view('siswa.landing', compact('totalKelas', 'totalSiswa', 'absenHariIni'));
    }
}
