<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\C_Users;
use App\Http\Controllers\C_Pegawai;
use App\Http\Controllers\C_PengajuanCuti;
use App\Http\Controllers\Login;
use App\Http\Controllers\Cetak;
use App\Http\Controllers\BiodataWeb;
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
    Route::get('/', [Login::class, 'index'])->name('login');

    // Login User
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login', [Login::class, 'prosesLogin']);
    Route::get('/lupa-password', [Login::class, 'lupaPassword']);
    Route::post('/prosesEmailLupaPassword', [Login::class, 'prosesEmailLupaPassword']);
    Route::get('/reset-password/{id}', [Login::class, 'resetPassword']);
    Route::post('/ubah-password', [Login::class, 'prosesUbahPassword']);

    // Login Admin
    Route::get('/admin', [Login::class, 'admin'])->name('admin');
    Route::get('/lupa-password-admin', [Login::class, 'lupaPasswordAdmin']);
    Route::get('/reset-password-admin/{id}', [Login::class, 'resetPasswordAdmin']);
    Route::post('/ubah-password-admin', [Login::class, 'prosesUbahPasswordAdmin']);

    // Logout
    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'pegawai'], function () {
        // dashboard
        Route::get('/dashboardPegawai', [Dashboard::class, 'index'])->name('dashboardPegawai');

        // pengajuan cuti
        Route::get('/pengajuan-cuti', [C_PengajuanCuti::class, 'index'])->name('pengajuan-cuti');
        Route::get('/tambah-pengajuan-cuti', [C_PengajuanCuti::class, 'add'])->name('tambah-pengajuan-cuti');
        Route::post('/tambah-pengajuan-cuti', [C_PengajuanCuti::class, 'addProcess']);
        Route::get('/edit-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'edit'])->name('edit-pengajuan-cuti');
        Route::post('/edit-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'editProcess'])->name('edit-pengajuan-cuti');
        Route::get('/kirim-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'sendPengajuanCuti']);
        Route::get('/hapus-pengajuan-cuti/{id}', [C_PengajuanCuti::class, 'deleteProcess']);

        // Profil User
        Route::get('/profil', [C_Users::class, 'profil'])->name('profil');
        Route::post('/profil/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password/{id}', [C_Users::class, 'changePasswordProcess']);
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/dashboardAdmin', [Dashboard::class, 'index'])->name('dashboardAdmin');

        // biodata web
        Route::get('/biodata-website', [BiodataWeb::class, 'index'])->name('biodata-web');
        Route::post('/biodata-website/{id}', [BiodataWeb::class, 'prosesEdit']);

        // kelola pengajuan cuti
        Route::get('/kelola-pengajuan-cuti', [C_PengajuanCuti::class, 'managePengajuanCuti'])->name('kelola-pengajuan-cuti');

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

    Route::group(['middleware' => 'wakildirektur'], function () {
        // dashboard
        Route::get('/dashboardWadir', [Dashboard::class, 'index'])->name('dashboardWadir');

        // Profil User
        Route::get('/profil-wadir', [C_Users::class, 'profil'])->name('profil-wadir');
        Route::post('/profil-wadir/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password-wadir/{id}', [C_Users::class, 'changePasswordProcess']);
    });

    Route::group(['middleware' => 'ketuajurusan'], function () {
        // dashboard
        Route::get('/dashboardKajur', [Dashboard::class, 'index'])->name('dashboardKajur');

        // Profil User
        Route::get('/profil-kajur', [C_Users::class, 'profil'])->name('profil-kajur');
        Route::post('/profil-kajur/{id}', [C_Users::class, 'editProfilProcess']);
        Route::post('/ubah-password-kajur/{id}', [C_Users::class, 'changePasswordProcess']);
    });
});
