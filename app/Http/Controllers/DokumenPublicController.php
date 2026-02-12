<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DokumenPublicController extends Controller // Nama Kelas harus sama persis dengan nama file
{
    /**
     * Ambil dokumen yang sudah divalidasi berdasarkan jenis (kategori).
     * @param string $jenis_dokumen (contoh: 'kebijakan mutu', 'audit mutu internal')
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getValidatedDocuments($jenis_dokumen)
    {
        // Pengecekan status menggunakan lowercase untuk menghindari masalah huruf besar/kecil di DB
        return DB::table('dokumen')
                    ->where('status', 'sudah divalidasi')
                    ->where('jenis', strtolower($jenis_dokumen)) // Pastikan jenis juga di-lowercase
                    ->orderBy('tgl_proses', 'desc') 
                    ->get();
    }
    
    // --- SPMI VIEWS ---

    public function showKebijakanMutu()
    {
        $dokumen = $this->getValidatedDocuments('kebijakan mutu');
        return view('spmi.dokumenspmi.kebijakanmutu', compact('dokumen'));
    }

    public function showManualMutu()
    {
        $dokumen = $this->getValidatedDocuments('manual mutu');
        return view('spmi.dokumenspmi.manualmutu', compact('dokumen'));
    }

    public function showStandarMutu()
    {
        $dokumen = $this->getValidatedDocuments('standar mutu');
        return view('spmi.dokumenspmi.standarmutu', compact('dokumen'));
    }

    public function showPendokumentasian()
    {
        $dokumen = $this->getValidatedDocuments('pendokumentasian');
        return view('spmi.dokumenspmi.pendokumentasian', compact('dokumen'));
    }
    
    public function showAuditMutuInternal()
    {
        $dokumen = $this->getValidatedDocuments('audit mutu internal');
        return view('spmi.auditmutuinternal', compact('dokumen'));
    }

    public function showDokumenSOP()
    {
        // Asumsi jenis di DB adalah 'sop'
        $dokumen = $this->getValidatedDocuments('sop'); 
        return view('spmi.dokumensop', compact('dokumen'));
    }

    // --- SPME VIEWS ---

// In App\Http\Controllers\DokumenPublicController.php

    public function showIap()
    {
        // Asumsi jenis di DB adalah 'iap'
        $dokumen = $this->getValidatedDocuments('akreditasi program studi'); 
        return view('spme.iap', compact('dokumen'));
    }


    public function showIAPT()
    {
        // Asumsi jenis di DB adalah 'iapt'
        $dokumen = $this->getValidatedDocuments('akreditasi perguruan tinggi');
        return view('spme.iapt', compact('dokumen'));
    }
}
