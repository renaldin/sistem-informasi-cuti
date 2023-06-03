<?php

use App\Http\Controllers\C_Users;
use App\Http\Controllers\C_Pegawai;
use App\Http\Controllers\C_PengajuanCuti;
use App\Http\Controllers\Cetak;
use App\Http\Controllers\C_BiodataWeb;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_KelolaPengajuanCuti;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Surat;
use App\Http\Controllers\C_Absensi;
use App\Http\Controllers\C_Landing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'revalidate'], function () {

    // Landing
    Route::get('/', [C_Landing::class, 'index'])->name('landing');

    // Home
    Route::get('/login', [C_Login::class, 'index'])->name('login');

    // Login User
    Route::get('/login', [C_Login::class, 'index'])->name('login');
    Route::post('/login', [C_Login::class, 'prosesLogin']);
    Route::get('/lupa-password', [C_Login::class, 'forgotPassword']);
    Route::post('/lupa-password', [C_Login::class, 'forgotPasswordProcess']);
    Route::get('/reset-password/{id}', [C_Login::class, 'resetPassword']);
    Route::post('/reset-password/{id}', [C_Login::class, 'resetPasswordProcess']);

    // Logout
    Route::get('/logout', [C_Login::class, 'logout'])->name('logout');

    // Profil User
    Route::get('/profil', [C_Users::class, 'profil'])->name('profil');
    Route::post('/profil/{id}', [C_Users::class, 'editProfilProcess']);
    Route::post('/ubah-password/{id}', [C_Users::class, 'changePasswordProcess']);

    // Kelola surat
    Route::get('/kelola-surat', [C_Surat::class, 'index'])->name('kelola-surat');
    Route::get('/detail-surat/{id}', [C_Surat::class, 'detail'])->name('detail-surat');
    Route::get('/tambah-surat', [C_Surat::class, 'add'])->name('tambah-surat');
    Route::post('/tambah-surat', [C_Surat::class, 'addProcess']);
    Route::get('/edit-surat/{id}', [C_Surat::class, 'edit'])->name('edit-surat');
    Route::post('/edit-surat/{id}', [C_Surat::class, 'editProcess']);
    Route::get('/kirim-surat/{id}', [C_Surat::class, 'sendToPegawai'])->name('kirim-surat');
    Route::get('/hapus-surat/{id}', [C_Surat::class, 'deleteProcess']);

    Route::group(['middleware' => 'pegawai'], function () {
        // dashboard
        Route::get('/dashboardPegawai', [C_Dashboard::class, 'index'])->name('dashboardPegawai');

        // pengajuan cuti
        Route::get('/pengajuan-cuti', [C_PengajuanCuti::class, 'index'])->name('pengajuan-cuti');
        Route::get('/tambah-pengajuan-cuti', [C_PengajuanCuti::class, 'add'])->name('tambah-pengajuan-cuti');
        Route::post('/tambah-pengajuan-cuti', [C_PengajuanCuti::class, 'addProcess']);
        Route::get('/edit-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'edit'])->name('edit-pengajuan-cuti');
        Route::post('/edit-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'editProcess'])->name('edit-pengajuan-cuti');
        Route::get('/detail-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'detail'])->name('detail-pengajuan-cuti');
        Route::get('/kirim-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'sendToAdmin']);
        Route::get('/hapus-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'deleteProcess']);

        // riwayat pengajuan cuti
        Route::get('/riwayat-pengajuan-cuti', [C_PengajuanCuti::class, 'history'])->name('riwayat-pengajuan-cuti');
        Route::get('/download-riwayat-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'downloadProcess']);
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboardAdmin', [C_Dashboard::class, 'index'])->name('dashboardAdmin');

        // biodata web
        Route::get('/biodata-website', [C_BiodataWeb::class, 'index'])->name('biodata-web');
        Route::post('/biodata-website/{id}', [C_BiodataWeb::class, 'prosesEdit']);

        // kelola pengajuan cuti
        Route::get('/kelola-pengajuan-cuti', [C_KelolaPengajuanCuti::class, 'index'])->name('kelola-pengajuan-cuti');
        Route::get('/detail-kelola-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'detail'])->name('detail-kelola-pengajuan-cuti');
        Route::get('/edit-kelola-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'edit'])->name('edit-kelola-pengajuan-cuti');
        Route::post('/edit-kelola-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'editProcess']);
        Route::get('/hapus-kelola-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'deleteProcess']);
        Route::get('/download-kelola-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'downloadProcess']);
        Route::get('/download-semua-pengajuan-cuti', [C_KelolaPengajuanCuti::class, 'downloadAllProcess']);
        Route::get('/terima-pengajuan-cuti/{id}', [C_KelolaPengajuanCuti::class, 'accept']);
        Route::get('/kirim-ketua-jurusan/{id}', [C_KelolaPengajuanCuti::class, 'sendToKetuaJurusan']);

        // Kelola User
        Route::get('/kelola-user', [C_Users::class, 'index'])->name('kelola-user');
        Route::get('/tambah-user', [C_Users::class, 'add'])->name('tambah-user');
        Route::post('/tambah-user', [C_Users::class, 'addProcess']);
        Route::get('/edit-user/{id}', [C_Users::class, 'edit'])->name('edit-user');
        Route::post('/edit-user/{id}', [C_Users::class, 'editProcess']);
        Route::get('/detail-user/{id}', [C_Users::class, 'detail'])->name('detail-user');
        Route::get('/hapus-user/{id}', [C_Users::class, 'deleteProcess']);

        // Kelola Pegawai
        Route::get('/kelola-pegawai', [C_Pegawai::class, 'index'])->name('kelola-pegawai');
        Route::get('/tambah-pegawai', [C_Pegawai::class, 'add'])->name('tambah-pegawai');
        Route::post('/tambah-pegawai', [C_Pegawai::class, 'addProcess']);
        Route::get('/edit-pegawai/{id}', [C_Pegawai::class, 'edit'])->name('edit-pegawai');
        Route::post('/edit-pegawai/{id}', [C_Pegawai::class, 'editProcess']);
        Route::get('/detail-pegawai/{id}', [C_Pegawai::class, 'detail'])->name('detail-pegawai');
        Route::get('/hapus-pegawai/{id}', [C_Pegawai::class, 'deleteProcess']);

        // Kelola absensi
        Route::get('/kelola-absensi', [C_Absensi::class, 'index'])->name('kelola-absensi');
        Route::post('/import-absensi', [C_Absensi::class, 'import']);
        Route::post('/tambah-absensi', [C_Absensi::class, 'addProcess']);
        Route::post('/edit-absensi/{id}', [C_Absensi::class, 'editProcess']);

        // Cetak PDF
        Route::post('/cetak-pdf', [Cetak::class, 'index']);
        Route::post('/cetak-pdf-order', [Cetak::class, 'cetakOrder']);
    });

    Route::group(['middleware' => 'wakildirektur'], function () {
        // dashboard
        Route::get('/dashboardWakilDirektur', [C_Dashboard::class, 'index'])->name('dashboardWakilDirektur');

        // perizinan cuti
        Route::get('/perizinan-cuti-wakil-direktur', [C_KelolaPengajuanCuti::class, 'dataCutiWakilDirektur'])->name('perizinan-cuti-wakil-direktur');
        Route::get('/detail-pengajuan-cuti-wakil-direktur/{id}', [C_KelolaPengajuanCuti::class, 'detail'])->name('detail-pengajuan-cuti-wakil-direktur');
        Route::get('/terima-pengajuan-cuti-wakil-direktur/{id}', [C_KelolaPengajuanCuti::class, 'acceptWakilDirektur'])->name('terima-pengajuan-cuti-wakil-direktur');
        Route::get('/izin-wakil-direktur/{id}', [C_KelolaPengajuanCuti::class, 'permissionWakilDirektur']);
        Route::post('/izin-wakil-direktur/{id}', [C_KelolaPengajuanCuti::class, 'permissionWakilDirekturProcess']);
    });

    Route::group(['middleware' => 'ketuajurusan'], function () {
        // dashboard
        Route::get('/dashboardKetuaJurusan', [C_Dashboard::class, 'index'])->name('dashboardKetuaJurusan');

        // perizinan cuti
        Route::get('/perizinan-cuti-ketua-jurusan', [C_KelolaPengajuanCuti::class, 'dataCutiKetuaJurusan'])->name('perizinan-cuti-ketua-jurusan');
        Route::get('/detail-pengajuan-cuti-ketua-jurusan/{id}', [C_KelolaPengajuanCuti::class, 'detail'])->name('detail-pengajuan-cuti-ketua-jurusan');
        Route::get('/terima-pengajuan-cuti-ketua-jurusan/{id}', [C_KelolaPengajuanCuti::class, 'acceptKetuaJurusan'])->name('terima-pengajuan-cuti-ketua-jurusan');
        Route::get('/izin-ketua-jurusan/{id}', [C_KelolaPengajuanCuti::class, 'permissionKetuaJurusan']);
        Route::post('/izin-ketua-jurusan/{id}', [C_KelolaPengajuanCuti::class, 'permissionKetuaJurusanProcess']);
    });

    Route::group(['middleware' => 'bagianumum'], function () {
        // dashboard
        Route::get('/dashboardBagianUmum', [C_Dashboard::class, 'index'])->name('dashboardBagianUmum');
    });
});
