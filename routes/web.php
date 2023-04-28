<?php

use App\Http\Controllers\C_Users;
use App\Http\Controllers\C_Pegawai;
use App\Http\Controllers\C_PengajuanCuti;
use App\Http\Controllers\Cetak;
use App\Http\Controllers\C_BiodataWeb;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_KelolaPengajuanCuti;
use App\Http\Controllers\C_Login;
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

    // Home
    Route::get('/', [C_Login::class, 'index'])->name('login');

    // Login User
    Route::get('/login', [C_Login::class, 'index'])->name('login');
    Route::post('/login', [C_Login::class, 'prosesLogin']);
    Route::get('/lupa-password', [C_Login::class, 'lupaPassword']);
    Route::post('/prosesEmailLupaPassword', [C_Login::class, 'prosesEmailLupaPassword']);
    Route::get('/reset-password/{id}', [C_Login::class, 'resetPassword']);
    Route::post('/ubah-password', [C_Login::class, 'prosesUbahPassword']);

    // Login Admin
    Route::get('/admin', [C_Login::class, 'admin'])->name('admin');
    Route::get('/lupa-password-admin', [C_Login::class, 'lupaPasswordAdmin']);
    Route::get('/reset-password-admin/{id}', [C_Login::class, 'resetPasswordAdmin']);
    Route::post('/ubah-password-admin', [C_Login::class, 'prosesUbahPasswordAdmin']);

    // Logout
    Route::get('/logout', [C_Login::class, 'logout'])->name('logout');

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

        // Profil User
        Route::get('/profil', [C_Users::class, 'profil'])->name('profil');
        Route::post('/profil/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password/{id}', [C_Users::class, 'changePasswordProcess']);
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
        Route::get('/kirim-atasan/{id}', [C_KelolaPengajuanCuti::class, 'sendToAtasan']);

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
        Route::get('/hapus-pegawai/{id}', [C_Pegawai::class, 'deleteProcess']);

        // profil
        Route::get('/profil-admin', [C_Users::class, 'profil'])->name('profil-admin');
        Route::post('/profil-admin/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password-admin/{id}', [C_Users::class, 'changePasswordProcess']);

        // Cetak PDF
        Route::post('/cetak-pdf', [Cetak::class, 'index']);
        Route::post('/cetak-pdf-order', [Cetak::class, 'cetakOrder']);
    });

    Route::group(['middleware' => 'pejabat'], function () {
        // dashboard
        Route::get('/dashboardPejabat', [C_Dashboard::class, 'index'])->name('dashboardPejabat');

        // Profil User
        Route::get('/profil-pejabat', [C_Users::class, 'profil'])->name('profil-pejabat');
        Route::post('/profil-pejabat/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password-pejabat/{id}', [C_Users::class, 'changePasswordProcess']);

        // perizinan cuti
        Route::get('/perizinan-cuti-pejabat', [C_KelolaPengajuanCuti::class, 'dataCutiPejabat'])->name('perizinan-cuti-pejabat');
        Route::get('/detail-pengajuan-cuti-pejabat/{id}', [C_KelolaPengajuanCuti::class, 'detail'])->name('detail-pengajuan-cuti-pejabat');
        Route::get('/terima-pengajuan-cuti-pejabat/{id}', [C_KelolaPengajuanCuti::class, 'acceptPejabat'])->name('terima-pengajuan-cuti-pejabat');
        Route::get('/izin-pejabat/{id}', [C_KelolaPengajuanCuti::class, 'permissionPejabat']);
    });

    Route::group(['middleware' => 'atasan'], function () {
        // dashboard
        Route::get('/dashboardAtasan', [C_Dashboard::class, 'index'])->name('dashboardAtasan');

        // Profil User
        Route::get('/profil-atasan', [C_Users::class, 'profil'])->name('profil-atasan');
        Route::post('/profil-atasan/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password-atasan/{id}', [C_Users::class, 'changePasswordProcess']);

        // perizinan cuti
        Route::get('/perizinan-cuti-atasan', [C_KelolaPengajuanCuti::class, 'dataCutiAtasan'])->name('perizinan-cuti-atasan');
        Route::get('/detail-pengajuan-cuti-atasan/{id}', [C_KelolaPengajuanCuti::class, 'detail'])->name('detail-pengajuan-cuti-atasan');
        Route::get('/terima-pengajuan-cuti-atasan/{id}', [C_KelolaPengajuanCuti::class, 'acceptAtasan'])->name('terima-pengajuan-cuti-atasan');
        Route::get('/izin-atasan/{id}', [C_KelolaPengajuanCuti::class, 'permissionAtasan']);
    });
});
