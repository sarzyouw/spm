<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DokumenPublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KetuaDashboardController;
use App\Http\Controllers\KetuaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;

/* --- AUTH --- */
// Halaman Form Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Proses Login (Form action mengarah ke sini)
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK UMUM
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome'))->name('home');

/*
|--------------------------------------------------------------------------
| PROFIL
|--------------------------------------------------------------------------
*/
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('/strukturorganisasi', 'profil.strukturorganisasi')->name('strukturorganisasi');
    Route::view('/tentangspm', 'profil.tentangspm')->name('tentangspm');
});

/*
|--------------------------------------------------------------------------
| SPME (HALAMAN STATIS + DOKUMEN PUBLIK)
|--------------------------------------------------------------------------
*/
Route::prefix('spme')->name('spme.')->group(function () {
    // Rute yang Anda panggil di navbar:
    Route::get('/iap', [DokumenPublicController::class, 'showIAP'])->name('iap'); // <-- spme.iap
    Route::get('/iapt', [DokumenPublicController::class, 'showIAPT'])->name('iapt'); // <-- spme.iapt
    
    // Rute statis
    Route::view('/tentangspme', 'spme.tentangspme')->name('tentangspme'); 
});

/*
|--------------------------------------------------------------------------
| SPMI (HALAMAN STATIS + DOKUMEN PUBLIK)
|--------------------------------------------------------------------------
*/
Route::prefix('spmi')->name('spmi.')->group(function () {

    Route::view('/tentangspmi', 'spmi.tentangspmi')->name('tentangspmi');
    Route::view('/hasilsurveykepuasan', 'spmi.hasilsurveykepuasan')->name('hasilsurveykepuasan');

    Route::get('/auditmutuinternal', [DokumenPublicController::class, 'showAuditMutuInternal'])
        ->name('auditmutuinternal');

    Route::get('/dokumensop', [DokumenPublicController::class, 'showDokumenSOP'])
        ->name('dokumensop');

    Route::prefix('dokumenspmi')->name('dokumenspmi.')->group(function () {
        Route::get('/kebijakanmutu', [DokumenPublicController::class, 'showKebijakanMutu'])
            ->name('kebijakanmutu');

        Route::get('/manualmutu', [DokumenPublicController::class, 'showManualMutu'])
            ->name('manualmutu');

        Route::get('/standarmutu', [DokumenPublicController::class, 'showStandarMutu'])
            ->name('standarmutu');

        Route::get('/pendokumentasian', [DokumenPublicController::class, 'showPendokumentasian'])
            ->name('pendokumentasian');
    });
});

/*
|--------------------------------------------------------------------------
| DASHBOARD BERDASARKAN ROLE
|--------------------------------------------------------------------------
*/
Route::middleware(['role:1'])->group(function () {
    Route::get('/ketua/dashboard', [KetuaDashboardController::class, 'index'])
        ->name('ketua.dashboard');

    // Rute BARU untuk Dokumen Tertunda (Konsolidasi)
    Route::get('/ketua/validasi-tertunda', [KetuaController::class, 'showDokumenTertunda'])
        ->name('ketua.validasi.tertunda');
        
    // Rute untuk proses validasi (PUT)
    Route::put('/ketua/dokumen/{no_dokumen}/validasi', [KetuaController::class, 'validasi'])
        ->name('ketua.dokumen.validasi');

    // Rute untuk Dokumen yang Sudah Divalidasi
    Route::get('/ketua/dokumen-divalidasi', [KetuaController::class, 'showDokumenDivalidasi'])
        ->name('ketua.dokumen.divalidasi');
});
Route::middleware(['role:2'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['role:3'])->group(function () {
    Route::get('/pengunjung/dashboard', function () {
        return view('pengunjung.dashboard', [
            'total_dokumen' => DB::table('dokumen')->count(),
        ]);
    })->name('pengunjung.dashboard');
});

/*
|--------------------------------------------------------------------------
| DOWNLOAD DOKUMEN (SEMUA USER LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['role:1,2,3'])->group(function () {
    // Pastikan mengarah ke DokumenController yang sudah kita perbaiki di atas
    Route::get('/download/{no_dokumen}', [DokumenController::class, 'download'])
        ->name('dokumen.download');
});
/*
|--------------------------------------------------------------------------
| DOKUMEN PUBLIK INTERNAL (SETELAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['role:1,2,3'])->group(function () {
    Route::get('/dokumen', [DokumenController::class, 'publik'])->name('dokumen.publik');
    Route::get('/dokumen/{id}/lihat', [DokumenController::class, 'lihat'])->name('dokumen.lihat');
});

/*
Halaman ubah password
*/
Route::get('/ubah-password', function () {
    return view('ubah-password');
})->name('password.form');

/*
POST ubah password
*/
Route::post('/ubah-password', [PasswordController::class, 'update'])
    ->name('password.update');

/*
Reset PW
*/
Route::post(
    '/admin/users/{username}/reset-password',
    [ResetPasswordController::class, 'reset']
)->name('admin.users.reset-password');

/*
|--------------------------------------------------------------------------
| ADMIN (LEVEL 2) – CRUD DOKUMEN & USER
|--------------------------------------------------------------------------
*/
Route::middleware(['role:2'])->prefix('admin')->name('admin.')->group(function () {

    // DOKUMEN
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{no_dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{no_dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{no_dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

    // USERS
    Route::resource('users', UserController::class)
        ->parameters(['users' => 'username']);
});


