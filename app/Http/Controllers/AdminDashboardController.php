<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil Data Statistik
        $total_user = User::count(); 
        $total_dokumen = Dokumen::count();
        $total_berita = 125; // Data dummy/placeholder
        
        $dokumen_diupload = $total_dokumen; 
        $dokumen_menunggu = Dokumen::where('status', 'belum divalidasi')->count();
        $dokumen_revisi = Dokumen::where('status', 'revisi')->count();

        // Ambil list dokumen terbaru untuk preview
        $dokumen_list = Dokumen::orderBy('tgl_proses', 'desc')->take(5)->get(); 

        return view('admin.dashboard', [
            'total_user' => $total_user,
            'total_dokumen' => $total_dokumen,
            'total_berita' => $total_berita, 
            'dokumen_diupload' => $dokumen_diupload, 
            'dokumen_menunggu' => $dokumen_menunggu,
            'dokumen_revisi' => $dokumen_revisi,
            'dokumen_list' => $dokumen_list, 
        ]);
    }
}