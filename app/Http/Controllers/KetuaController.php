<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Dokumen; 
use Carbon\Carbon;

class KetuaController extends Controller
{
    private function getCategoryName($jenis)
    {
        // Fungsi ini hanya digunakan untuk judul dinamis
        $names = [
            'semua_tertunda' => 'Semua Dokumen Menunggu Validasi', 
            'semua_divalidasi' => 'Semua Dokumen Divalidasi' 
        ];
        return $names[$jenis] ?? ucwords(str_replace('_', ' ', $jenis));
    }

    // =============================================================
    // FUNGSI 1: MENAMPILKAN SEMUA DOKUMEN YANG TERTUNDA (KONSOLIDASI)
    // =============================================================
    public function showDokumenTertunda()
    {
        if (Session::get('level') != 1) { abort(403); }
        
        // Ambil SEMUA dokumen dengan status 'belum divalidasi' atau 'revisi'
        $dokumen_list = Dokumen::whereIn('status', ['belum divalidasi', 'revisi'])
                                ->orderBy('tgl_proses', 'asc')
                                ->get();
                                
        $judul_kategori = $this->getCategoryName('semua_tertunda');
        $jenis = 'semua_tertunda'; // Penanda untuk sidebar

        // Gunakan layout validasi
        return view('ketua.validasi_dokumen_layout', compact('dokumen_list', 'judul_kategori', 'jenis'));
    }
    
    // =============================================================
    // FUNGSI 2: MENAMPILKAN SEMUA DOKUMEN YANG SUDAH DIVALIDASI (ARSIP)
    // =============================================================
    public function showDokumenDivalidasi()
    {
        if (Session::get('level') != 1) { abort(403); }

        // Ambil SEMUA dokumen dengan status 'sudah divalidasi'
        $dokumen_list = Dokumen::where('status', 'sudah divalidasi')
                            ->orderBy('tgl_proses', 'desc')
                            ->get();
                            
        $judul_kategori = $this->getCategoryName('semua_divalidasi');
        $jenis = 'semua_divalidasi'; // Penanda untuk sidebar
        
        return view('ketua.validasi_dokumen_layout', compact('dokumen_list', 'judul_kategori', 'jenis'));
    }

    // Mengubah status dokumen
    public function validasi($no_dokumen, Request $request)
    {
        if (Session::get('level') != 1) { abort(403); }

        $request->validate(['status_baru' => 'required|in:sudah divalidasi,revisi']);

        $dokumen = Dokumen::findOrFail($no_dokumen);
        
        $dokumen->update([
            'status' => $request->status_baru,
            'validasi' => 'validasi'
        ]);
        
        // Redirect ke view konsolidasi dokumen tertunda setelah validasi
        $redirect_route = route('ketua.validasi.tertunda');

        return redirect($redirect_route)->with('success', 'Status dokumen berhasil diperbarui menjadi ' . $request->status_baru . '.');
    }
    
    // FUNGSI LAMA: showValidasiTable DAN validasi($jenis) SUDAH TIDAK DIBUTUHKAN JIKA ANDA MENGGUNAKAN KONSOLIDASI
    // Jika masih ada di file Anda, hapuslah.
}