<?php

use App\Models\BagianModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\skController;
use App\Http\Controllers\smController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\bukutamuController;
use App\Http\Controllers\laporanArsipController;
use App\Models\smModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [laporanArsipController::class, 'dashboard']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'proses']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/surat-masuk-download/{id}', [smController::class, 'download']);

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function (){
        Route::get('/user', [AuthController::class, 'index'])->name('user');
        Route::post('/user-add-proses', [AuthController::class, 'store']);
        Route::get('/user-edit/{id}', [AuthController::class, 'edit']);
        Route::put('/user-edit/proses/{id}', [AuthController::class, 'update']);
        Route::get('/user-delete/{id}', [AuthController::class, 'delete']);
        Route::put('/user-update/{id}', [AuthController::class, 'passwordWeb']);

        // Menu Bagian
        Route::get('/bagian', [BagianController::class, 'index']);
        Route::post('/bagian-add-proses', [BagianController::class, 'store']);
        Route::get('/bagian-detail/{id}', [BagianController::class, 'detail']);
        Route::put('/bagian-detail-proses/{id}', [BagianController::class, 'update']);
        Route::get('/bagian-delete/{id}', [BagianController::class, 'delete']);

        //menu surat masuk detail admin 
        Route::get('/surat-masuk', [smController::class, 'index']);
        Route::post('/surat-masuk-add-proses', [smController::class, 'store']);
        
        
        // surat masuk edit admin
        Route::get('/surat-masuk-edit/{id}', [smController::class, 'edit']);
        Route::put('/surat-masuk-edit-proses/{id}', [smController::class, 'update']);
        Route::get('/surat-masuk-hapus/{id}', [smController::class, 'delete']);
        Route::get('/surat-masuk-arsip-proses/{id}', [smController::class, 'arsip']);

        
        
        // Surat Keluar admin
        Route::post('/surat-keluar-add-proses', [skController::class, 'store']);
        Route::get('/surat-keluar-edit/{id}', [skController::class, 'edit']);
        Route::put('/surat-keluar-edit-proses/{id}', [skController::class, 'update']);
        Route::get('/surat-keluar-delete/{id}', [skController::class, 'delete']);
        Route::get('/surat-keluar-arsip-proses/{id}', [skController::class, 'arsip']);

        
    });
    Route::get('/surat-keluar', [skController::class, 'index']);
    
    Route::get('/surat-masuk-detail/{id}', [smController::class, 'detail']);
    // buku tamu admin
    Route::get('/buku-tamu', [bukutamuController::class, 'index']);
    Route::post('/buku-tamu-add-proses', [bukutamuController::class, 'store']);
    Route::get('/buku-tamu-edit/{id}', [bukutamuController::class, 'edit']);
    Route::put('/buku-tamu-edit-proses/{id}', [bukutamuController::class, 'update']);
    Route::get('/buku-tamu-hapus/{id}', [bukutamuController::class, 'delete']);
    Route::get('/buku-tamu-arsip', [bukutamuController::class, 'arsip']);
    
    // surat masuk sekretaris
    Route::get('/sm-sekretaris', [smController::class, 'indexSekretaris']);
    Route::get('/sm-sekretaris-ajukan/{id}', [smController::class, 'ajukanSekretaris']);
    Route::put('/sm-sekretaris-ajukan-proses/{id}', [smController::class, 'prosesSekretaris']);
    Route::get('/sm-sekretaris-detail/{id}', [smController::class, 'detailSekretaris']);

    // surat keluar sekretaris
    Route::get('/sk-sekretaris-validasi/{id}', [skController::class, 'validasiSekretaris']);
    Route::put('/sk-sekretaris-validasi-proses/{id}', [skController::class, 'prosesSekretaris']);
    Route::get('/sk-sekretaris-detail/{id}', [skController::class, 'detailSekretaris']);
    Route::get('/sk-sekretaris-pdf/{id}', [pdfController::class, 'suratKeluar']);

    // camat
    Route::get('/sm-camat', [smController::class, 'indexCamat']);
    Route::get('/sm-camat-ajukan/{id}', [smController::class, 'ajukanCamat']);
    Route::put('/sm-camat-ajukan-proses/{id}', [smController::class, 'prosesCamat']);
    Route::get('/sm-camat-detail/{id}', [smController::class, 'detailCamat']);

    // surat keluar camat
    Route::get('/sk-camat-validasi/{id}', [skController::class, 'validasiCamat']);
    Route::put('/sk-camat-ttd/{id}', [skController::class, 'ttdCamat']);
    Route::get('/sk-camat-detail/{id}', [skController::class, 'detailCamat']);

    // surat masuk arsip
    Route::get('/surat-masuk-arsip', [smController::class, 'indexArsipSM']);
    Route::get('/arsip-sm-detail/{id}', [smController::class, 'detailArsipSM']);
    Route::get('/arsip-sm-hapus/{id}', [smController::class, 'deleteArsipSM']);

    // surat keluar arsip
    Route::get('/surat-keluar-arsip', [skController::class, 'indexArsipSK']);
    Route::get('/arsip-sk-detail/{id}', [skController::class, 'detailArsipSK']);
    Route::get('/arsip-sk-hapus/{id}', [skController::class, 'deleteArsipSK']);

    // search arsip surat masuk
    Route::get('/pencarian-surat-masuk', [laporanArsipController::class, 'cariSuratMasuk'])->name('cari-sm-arsip');

    // search arsip surat keluar
    Route::get('/pencarian-surat-keluar', [laporanArsipController::class, 'cariSuratKeluar'])->name('cari-sk-arsip');

    // search arsip buku tamu
    Route::get('/pencarian-buku-tamu', [laporanArsipController::class, 'caribukuTamu'])->name('cari-bt-arsip');
});

Route::middleware('auth.bagian')->group(function () {
    // devisi bagian
    Route::get('/sm-devisi', [smController::class, 'indexDevisi']);
    Route::get('/sm-devisi-detail/{id}', [smController::class, 'detailDevisi']);
    Route::put('/sm-devisi-arsip/{id}', [smController::class, 'arsipDevisi'])->name('devisi-arsip');

    // arsip
    Route::get('/sm-arsip', [smController::class, 'indexArsipDevisi']);
    Route::get('/sm-arsip-detail/{id}', [smController::class, 'detailArsipDevisi']);

    Route::put('/bagian-update/{id}', [BagianController::class, 'passwordBagian']);

});

Route::get('/sm-disposisi/{id}', [pdfController::class, 'suratDisposisi']);
