<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input username dan password
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Pengecekan username dan password secara manual
        if ($request->username === 'admin' && $request->password === '123') {
            Session::put('auth', true); // Simpan autentikasi di sesi
            return redirect()->route('siswa.dashboard'); // Arahkan ke halaman index siswa
        }

        // Kembalikan pesan kesalahan jika login gagal
        return back()->withErrors(['login_error' => 'Username atau password salah']);
    }

    // Proses logout
    public function logout()
    {
        Session::forget('auth'); // Hapus autentikasi dari sesi
        return redirect()->route('siswa.landing'); // Arahkan ke halaman login
    }
}
