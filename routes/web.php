<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\TemplatePengajuanController;
use App\Http\Controllers\Admin\AdministrasiController as AdministrasiAdminController;
use App\Http\Controllers\FormulirController;

// Users
Route::view('/', 'welcome')->name('home');
Route::get('/formulirs', [FormulirController::class, 'index'])->name('formulir');
Route::controller(AdministrasiController::class)->middleware('auth')->group(function () {

    Route::get('/administrasi', 'administrasi')->name('administrasi');
    Route::get('/administrasi/search', [AdministrasiController::class, 'search'])->name('administrasi.cari');


    Route::get('/pengajuan/detail/{ticket}', 'detailPengajuan')->name('administrasi.pengajuan.detail');

    Route::get('/pengajuan', 'pengajuan')
        ->middleware('check.jenis_pengajuan')
        ->name('administrasi.pengajuan');

    Route::get('/pengajuan/success/{tiket}', 'success')
        ->middleware('check.ticket')
        ->name('administrasi.pengajuan.success');

    Route::post('/pengajuan/akta-kelahiran', 'pengajuanAktaKelahiran')
        ->name('administrasi.pengajuan.akta-kelahiran');

    Route::post('/pengajuan/akta-kematian', 'pengajuanAktaKematian')
        ->name('administrasi.pengajuan.akta-kematian');

    Route::post('/pengajuan/pindah-datang', 'pengajuanPindahDatang')
        ->name('administrasi.pengajuan.pindah-datang');

    Route::post('/pengajuan/pindah-keluar', 'pengajuanPindahKeluar')
        ->name('administrasi.pengajuan.pindah-keluar');

    Route::post('/pengajuan/kehilangan-kk', 'pengajuanKehilanganKK')
        ->name('administrasi.pengajuan.kehilangan-kk');

    Route::post('/pengajuan/skck', 'pengajuanSkck')
        ->name('administrasi.pengajuan.skck');

    Route::post('/pengajuan/keterangan-belum-menikah', 'pengajuanKetBelumMenikah')
        ->name('administrasi.pengajuan.belum-menikah');

    Route::post('/pengajuan/keterangan-surat-keterangan', 'pengajuanSuratKeterangan')
        ->name('administrasi.pengajuan.surat-keterangan');

    Route::post('/pengajuan/keterangan-pengantar-kehilangan', 'pengajuanPengantarKehilangan')
    ->name('administrasi.pengajuan.pengantar-kehilangan');


    //Unduh Bukti Pengajuan
    Route::get('/cetak-bukti-pengajuan/{ticket}', 'buktiPengajuan')
    ->name('administrasi.bukti-pengajuan');

});

// Download Form Pengajuan
Route::controller(TemplatePengajuanController::class)->group(function () {
    Route::get('/form-akta-kelahiran', 'aktaKelahiran')->name('form.akta-kelahiran');
});

// Route::controller(FormulirController::class)->prefix('download')->group(function () {
//     Route::get('/catatan-sipil', 'downloadFormPencatatanSipil')->name('download.catatan-sipil');
//     Route::get('/biodata-keluarga', 'downloadFormBiodataKeluarga')->name('download.biodata-keluarga');
//     Route::get('/skck', 'downloadSkck')->name('download.skck');
//     Route::get('/belum-menikah', 'downloadBelumMenikah')->name('download.belum-menikah');
// });
Route::get('/download/{berkas}', [FormulirController::class, 'download'])->name('download');

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'updateUser'])->name('profile.update');
    Route::patch('/profil/user-detail', [ProfileController::class, 'updateUserDetail'])->name('profile.update.user-detail');
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin & Pegawai
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboards');

    // Role Admin
    Route::middleware('only.admin')->group(function () {
        // Pegawai
        Route::get('/dashboard/pegawai', [UserController::class, 'pegawai'])->name('users.pegawai');
        Route::get('/dashboard/pegawai/tambah', [UserController::class, 'createPegawai'])->name('users.pegawai.create');
        Route::post('/dashboard/pegawai/tambah', [UserController::class, 'registerPegawai']);

        // Masyarakat
        Route::get('/dashboard/masyarakat', [UserController::class, 'masyarakat'])->name('users.masyarakat');
        Route::get('/dashboard/masyarakat/detail/{username}', [UserController::class, 'detailMasyarakat'])->name('users.masyarakat.detail');
    });

    // Role Pegawai
    // Administrasi
    Route::controller(AdministrasiAdminController::class)->name('admin.')->group(function () {
        Route::get('/dashboard/administrasi', 'administrasi')->name('administrasi');
        Route::get('/dashboard/administrasi/{tiket}', 'detailAdministrasi')->name('administrasi.detail');
        Route::post('/dashboard/administrasi/konfirmasi/{tiket}', 'konfirmasiAdministrasi')->name('administrasi.konfirmasi');
        Route::get('/dashboard/administrasi/openpdf/{id}', 'openpdf')->name('admin.administrasi.openpdf');
        Route::get('/dashboard/administrasi/openexcel/{id}', 'openexcel')->name('admin.administrasi.openexcel');
    });
});
require __DIR__ . '/auth.php';
