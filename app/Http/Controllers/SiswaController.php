<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class SiswaController extends Controller
{
    // Menampilkan dashboard
    public function dashboard()
    {
        $totalKelas = 9; // Set static number of classes
        $totalSiswa = Siswa::count(); // Dynamic count of students
        $absenHariIni = Absensi::whereDate('created_at', Carbon::today())->count(); // Count of today's attendance

        return view('siswa.dashboard', compact('totalKelas', 'totalSiswa', 'absenHariIni'));
    }

    // Menampilkan form pendaftaran siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa
   public function store(Request $request)
{
    $request->validate([
        'nis' => 'required',
        'nama' => 'required',
        'kelas' => 'required',
        'rfid_id' => 'required|unique:siswas,rfid_id',
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    try {
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
        }

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'rfid_id' => $request->rfid_id,
            'gambar' => $imagePath ?? null,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil didaftarkan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data siswa: ' . $e->getMessage());
    }
}



    // Menampilkan daftar siswa
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    // Mencari siswa berdasarkan RFID ID
    public function read(Request $request)
    {
        $request->validate([
            'rfid_id' => 'required|string',
        ]);

        $siswa = Siswa::where('rfid_id', $request->rfid_id)->first();

        if (!$siswa) {
            return redirect()->back()->with('message', 'Siswa tidak ditemukan.');
        }

        return view('siswa.read', ['siswa' => $siswa]);
    }

    // Menampilkan form edit siswa
    public function edit($rfid_id)
    {
        $siswa = Siswa::where('rfid_id', $rfid_id)->first();
        return view('siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $rfid_id)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'rfid_id' => 'required|unique:siswas,rfid_id,' . $rfid_id . ',rfid_id', // Allowing current RFID ID
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = Siswa::where('rfid_id', $rfid_id)->first();

        if ($siswa) {
            $siswa->nis = $request->nis;
            $siswa->nama = $request->nama;
            $siswa->kelas = $request->kelas;
            $siswa->rfid_id = $request->rfid_id;

            if ($request->hasFile('gambar')) {
                $imagePath = $request->file('gambar')->store('images', 'public');
                $siswa->gambar = $imagePath;
            }

            $siswa->save();

            return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
        } else {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
        }
    }

    // Menghapus data siswa berdasarkan RFID ID
    public function destroy($rfid_id)
    {
        $siswa = Siswa::where('rfid_id', $rfid_id)->first();
        if ($siswa) {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('message', 'Data siswa berhasil dihapus.');
        }
        return redirect()->route('siswa.index')->with('message', 'Data siswa tidak ditemukan.');
    }

    // Menyimpan data absensi
    public function storeAbsensi(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'kelas' => 'required|string',
        ]);

        Absensi::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'waktu_absen' => now(),
        ]);

        return redirect()->route('siswa.scan')->with('message', 'Absen berhasil !');
    }
    
    public function sudahAbsen(Request $request)
    {
        // Ambil parameter filter dari request
        $hari = $request->get('hari');
        $tanggal = $request->get('tanggal');
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        // Query dasar untuk tabel absensi
        $query = Absensi::query();

        // Filter berdasarkan hari (1 = Minggu, 2 = Senin, dst.)
        if ($hari) {
            $query->whereRaw('DAYOFWEEK(waktu_absen) = ?', [$hari]);
        }

        // Filter berdasarkan tanggal
        if ($tanggal) {
            $query->whereDate('waktu_absen', $tanggal);
        }

        // Filter berdasarkan bulan
        if ($bulan) {
            $query->whereMonth('waktu_absen', $bulan);
        }

        // Filter berdasarkan tahun
        if ($tahun) {
            $query->whereYear('waktu_absen', $tahun);
        }

        // Ambil data yang sudah difilter
        $absensi = $query->orderBy('waktu_absen', 'desc')->get();

        // Kirim data ke view
        return view('siswa.sudah_absen', compact('absensi'));
    }

    // Fungsi untuk download CSV
    public function download(Request $request)
    {
        // Ambil parameter filter dari request
        $hari = $request->get('hari');
        $tanggal = $request->get('tanggal');
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');

        // Query dasar untuk tabel absensi
        $query = Absensi::query();

        // Filter berdasarkan hari (1 = Minggu, 2 = Senin, dst.)
        if ($hari) {
            $query->whereRaw('DAYOFWEEK(waktu_absen) = ?', [$hari]);
        }

        // Filter berdasarkan tanggal
        if ($tanggal) {
            $query->whereDate('waktu_absen', $tanggal);
        }

        // Filter berdasarkan bulan
        if ($bulan) {
            $query->whereMonth('waktu_absen', $bulan);
        }

        // Filter berdasarkan tahun
        if ($tahun) {
            $query->whereYear('waktu_absen', $tahun);
        }

        // Ambil data yang sudah difilter
        $absensi = $query->get();

        // Membuat data CSV
        $csvData = "NIS,Nama,Kelas,Waktu Absen\n";

        foreach ($absensi as $item) {
            $csvData .= "{$item->nis},{$item->nama},{$item->kelas},{$item->waktu_absen}\n";
        }

        // Menghasilkan file CSV dan mengunduhnya
        return Response::make($csvData, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="absensi.csv"',
        ]);
    }
}
