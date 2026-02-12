<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Dokumen; 

class KetuaDashboardController extends Controller
{
    public function index()
    {
        // Pengecekan sesi manual jika middleware belum terpasang di rute
        if (!Session::has('logged_in') || Session::get('level') != 1) {
            return redirect()->route('login');
        }

        // Ambil data statistik untuk 2 kotak utama
        $dokumen_menunggu = Dokumen::where('status', 'belum divalidasi')->count();
        $dokumen_divalidasi = Dokumen::where('status', 'sudah divalidasi')->count();
        
        // Ambil list dokumen terbaru yang butuh perhatian (belum divalidasi/revisi)
        $dokumen_list_menunggu = Dokumen::whereIn('status', ['belum divalidasi', 'revisi'])
                                        ->orderBy('tgl_proses', 'desc')
                                        ->take(5)
                                        ->get();

        return view('ketua.dashboard', [
            'dokumen_menunggu' => $dokumen_menunggu, 
            'dokumen_divalidasi' => $dokumen_divalidasi, 
            'dokumen_list_menunggu' => $dokumen_list_menunggu,
        ]);
    }
}