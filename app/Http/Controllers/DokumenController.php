<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Exports\DokumenExport; 
use Maatwebsite\Excel\Facades\Excel;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session()->has('username')) {  
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    // ================= DASHBOARD ADMIN (UNTUK MENGISI STATISTIK) =================
public function adminDashboard()
    {
        // Dihapus karena sudah dipindahkan ke AdminDashboardController
        // Pastikan Anda menghapus method ini jika Anda menggunakan AdminDashboardController
        // JIKA Anda tetap menggunakan DokumenController::adminDashboard di web.php,
        // maka Anda perlu memastikan DokumenController.php berisi method ini.
        
        // Asumsi: Karena kita sudah pindah, saya sarankan hapus method ini dari sini,
        // dan gunakan AdminDashboardController.php yang baru.
        
        // JIKA Anda ingin tetap mempertahankan logic AdminDashboardController di file ini,
        // gunakan kode ini:
        
        $total_user = User::count(); 
        $total_dokumen = Dokumen::count();
        $dokumen_menunggu = Dokumen::where('status', 'belum divalidasi')->count();
        $dokumen_revisi = Dokumen::where('status', 'revisi')->count();

        $dokumen_list = Dokumen::orderBy('tgl_proses', 'desc')->take(5)->get(); 

        return view('admin.dashboard', [
            'total_user' => $total_user,
            'total_dokumen' => $total_dokumen,
            'dokumen_menunggu' => $dokumen_menunggu,
            'dokumen_revisi' => $dokumen_revisi,
            'dokumen_list' => $dokumen_list, 
            'total_berita' => 125, 
            'dokumen_diupload' => $total_dokumen, 
        ]);
    }

    // ================= CRUD ADMIN (LEVEL 2) =================

    public function index()
    {
        $dokumen = Dokumen::orderBy('tgl_proses', 'desc')->get();
        return view('admin.dokumen.index', compact('dokumen')); 
    }

    public function create()
    {
        if (!in_array(session('level'), [1, 2])) {
            abort(403);
        }
        return view('admin.dokumen.create'); 
    }

    public function store(Request $request)
    {
        if (!in_array(session('level'), [1, 2])) {
            abort(403);
        } 

        $data = $request->validate([
            'no_dokumen'  => 'required|unique:dokumen,no_dokumen',
            'nama_dok'    => 'required|max:100', 
            'jenis'       => 'required',
            'keterangan'  => 'nullable',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20480', 
            'link'        => 'nullable|string|max:255', // KRITIS: Diubah dari 'url' ke 'string'
        ]);

        $data['username']   = session('username');
        $data['status']     = 'belum divalidasi';
        $data['validasi']   = 'validasi';
        $data['tgl_proses'] = now();

        if ($request->hasFile('file_upload')) {
    $filename = time() . '_' . $request->file('file_upload')->getClientOriginalName();
    $request->file('file_upload')->storeAs('public/dokumen', $filename);
    // Simpan dengan awalan storage/ agar mudah dikenali di fungsi download
    $data['link'] = 'storage/dokumen/' . $filename;
}
        
        if (!$request->hasFile('file_upload') && !$request->filled('link')) {
             $data['link'] = null;
        }

        unset($data['file_upload']); 
        
        Dokumen::create($data);

        return redirect()
            ->route('admin.dokumen.index') 
            ->with('success', 'Dokumen berhasil ditambahkan dan menunggu validasi.');
    }

    public function edit($no_dokumen)
    {
        if (!in_array(session('level'), [1, 2])) {
            abort(403);
        }

        $dokumen = Dokumen::findOrFail($no_dokumen); 
        return view('admin.dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, $no_dokumen)
    {
        if (!in_array(session('level'), [1, 2])) {
            abort(403);
        }

        $dokumen = Dokumen::findOrFail($no_dokumen);

        $data = $request->validate([
            'no_dokumen'  => 'required|unique:dokumen,no_dokumen,' . $dokumen->no_dokumen . ',no_dokumen', 
            'nama_dok'    => 'required|max:100',
            'jenis'       => 'required',
            'keterangan'  => 'nullable',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048', 
            'link'        => 'nullable|string|max:255', // KRITIS: Diubah dari 'url' ke 'string'
        ]);

        // Logika Penanganan File Update
        if ($request->hasFile('file_upload')) {
            if ($dokumen->link && str_contains($dokumen->link, 'storage/dokumen')) {
                Storage::delete(str_replace('storage/', 'public/', $dokumen->link));
            }
            $filename = time() . '_' . $request->file('file_upload')->getClientOriginalName();
            $request->file('file_upload')->storeAs('public/dokumen', $filename);
            $data['link'] = 'storage/dokumen/' . $filename;
        } elseif (is_null($request->link) && !$request->hasFile('file_upload') && $dokumen->link && str_contains($dokumen->link, 'storage/dokumen')) {
            Storage::delete(str_replace('storage/', 'public/', $dokumen->link));
            $data['link'] = null;
        } elseif (!$request->hasFile('file_upload') && $request->filled('link')) {
            $data['link'] = $request->link;
        }

        unset($data['file_upload']);

        $dokumen->update($data);

        return redirect()
            ->route('admin.dokumen.index')
            ->with('success', 'Dokumen "' . $dokumen->nama_dok . '" berhasil diperbarui.');
    }


    public function destroy($no_dokumen) 
    {
        $dokumen = Dokumen::findOrFail($no_dokumen); 

        if ($dokumen->link && str_contains($dokumen->link, 'storage/dokumen')) {
            Storage::delete(str_replace('storage/', 'public/', $dokumen->link));
        }

        $dokumen->delete();

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen dihapus');
    }

    // ================= PUBLIK & VALIDASI =================
    
    public function publik()
    {
        $dokumen = Dokumen::where('status', 'sudah divalidasi')
            ->where('validasi', 'validasi')
            ->orderBy('tgl_proses', 'desc')
            ->get();

        return view('dokumen.index', compact('dokumen'));
    }

public function download($no_dokumen)
{
    $dokumen = Dokumen::where('no_dokumen', $no_dokumen)->firstOrFail();

    if ($dokumen->link) {
        // Cek apakah ini file lokal (baik diawali 'storage/' atau 'dokumen/')
        if (str_contains($dokumen->link, 'dokumen/')) {
            
            // Bersihkan path agar menjadi path yang dikenali Storage (public/dokumen/...)
            $cleanPath = str_replace('storage/', '', $dokumen->link); // hapus storage/ jika ada
            $pathFisik = 'public/' . ltrim($cleanPath, '/'); 
            
            if (Storage::exists($pathFisik)) {
                $ekstensi = pathinfo($pathFisik, PATHINFO_EXTENSION);
                return Storage::download($pathFisik, $dokumen->nama_dok . '.' . $ekstensi);
            }
        }
        
        // Jika link eksternal (http...)
        if (filter_var($dokumen->link, FILTER_VALIDATE_URL)) {
            return redirect()->away($dokumen->link);
        }
    }

    return back()->with('error', 'File tidak ditemukan di server.');
}
    
    public function validasi($no_dokumen, Request $request)
    {
        if (!in_array(session('level'), [1])) {
            abort(403);
        }

        $request->validate(['status_baru' => 'required|in:sudah divalidasi,revisi']);

        $dokumen = Dokumen::findOrFail($no_dokumen);
        
        $dokumen->update([
            'status' => $request->status_baru,
            'validasi' => 'validasi'
        ]);

        return back()->with('success', 'Status dokumen berhasil diperbarui.');
    }

}
