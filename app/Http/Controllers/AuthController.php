<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login utama
     */
    public function showLogin()
    {
        // Jika sudah login, arahkan langsung ke dashboard sesuai level
        if (Session::has('logged_in')) {
            return $this->redirectToDashboard(Session::get('level'));
        }
        return view('login');
    }

    /**
     * Memproses data login
     */
    public function login(Request $request)
    {
        // Validasi input username dan password
        if (!$request->username || !$request->password) {
        return back()->with('login_error', 'Username atau Password wajib diisi.');
    }

        // Cari data di tabel pegawai berdasarkan username
        $pegawai = DB::table('pegawai')->where('username', $request->username)->first();

        // 🔐 CEK PASSWORD HASH
        if (!$pegawai || !Hash::check($request->password, $pegawai->password)) {
            Session::forget('logged_in');

            return back()->with('login_error', 'Username atau Password salah.');
        }

        // Menyimpan data pengguna ke dalam Session
        Session::put([
            'username'     => $pegawai->username,
            'nama_pegawai' => $pegawai->nama_pegawai,
            'level'        => (int)$pegawai->level,
            'logged_in'    => true
        ]);

        return $this->redirectToDashboard($pegawai->level);
    }

    /**
     * Logika pengalihan dashboard berdasarkan level user
     */
    private function redirectToDashboard($level)
    {
        $level = (int)$level;
        if ($level === 1) return redirect()->route('ketua.dashboard'); // Level Ketua
        if ($level === 2) return redirect()->route('admin.dashboard'); // Level Admin

        // Level 3 (Pengunjung) atau lainnya diarahkan ke Beranda
        return redirect()->route('home')->with('success', 'Silahkan mengunduh dokumen yang Anda butuhkan.');
    }

    /**
     * Logout untuk semua user (Ketua, Admin, dan Pengunjung)
     */
    public function logout()
    {
        // Membersihkan seluruh data session
        Session::flush();

        // Kembali ke beranda dengan pesan sukses
        return redirect()->route('home')->with('success', 'Anda telah keluar.');
    }
    
}
