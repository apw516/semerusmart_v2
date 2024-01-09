<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\LandingController;

//dashboard route
Route::get('/', [LandingController::class, 'index'])->middleware('guest')->name('landing');
Route::get('dashboardlanding', [LandingController::class, 'Dashboard_landing'])->middleware('guest')->name('dashboardlanding');
Route::get('jadwalpoli', [LandingController::class, 'Jadwal_poli'])->middleware('guest')->name('jadwalpoli');
Route::get('kontakkami', [LandingController::class, 'Kontak_kami'])->middleware('guest')->name('kontakkami');
Route::get('login', [LandingController::class, 'login'])->middleware('guest')->name('login');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');


//pendaftaran route
Route::get('DaftarPelayanan', [PendaftaranController::class, 'DaftarPelayanan'])->middleware('guest')->name('DaftarPelayanan');

Route::get('RiwayatPendaftaran', [PendaftaranController::class, 'Riwayat_pendaftaran'])->middleware('guest')->name('RiwayatPendaftaran');

Route::get('cariprovinsi', [PendaftaranController::class, 'Cari_provinsi'])->middleware('guest')->name('cariprovinsi');
Route::get('carikabupaten', [PendaftaranController::class, 'Cari_kabupaten'])->middleware('guest')->name('carikabupaten');
Route::get('carikecamatan', [PendaftaranController::class, 'Cari_kecamatan'])->middleware('guest')->name('carikecamatan');
Route::get('caridesa', [PendaftaranController::class, 'Cari_desa'])->middleware('guest')->name('caridesa');
Route::post('ambildatapasien', [PendaftaranController::class, 'Ambil_data_pasien'])->name('ambildatapasien');
Route::post('caripasien', [PendaftaranController::class, 'Cari_pasien'])->name('caripasien');
Route::post('ambildetailpasien', [PendaftaranController::class, 'Ambil_detail_pasien'])->name('ambildetailpasien');
Route::post('simpanpendaftaran', [PendaftaranController::class, 'Simpan_pendaftaran'])->name('simpanpendaftaran');
=======

Route::post('ambil_riwayat_pendaftaran', [PendaftaranController::class, 'Ambil_riwayat_pendaftaran'])->name('ambil_riwayat_pendaftaran');
Route::post('caripasien', [PendaftaranController::class, 'Cari_pasien'])->name('caripasien');
Route::post('ambildetailpasien', [PendaftaranController::class, 'Ambil_detail_pasien'])->name('ambildetailpasien');
Route::post('simpanpendaftaran', [PendaftaranController::class, 'Simpan_pendaftaran'])->name('simpanpendaftaran');

//Farmasi Route
Route::get('masterbarang', [FarmasiController::class, 'Master_barang'])->middleware('guest')->name('masterbarang');
Route::post('ambil_master_barang', [FarmasiController::class, 'Ambil_master_barang'])->middleware('guest')->name('ambil_master_barang');
=======
Route::post('caripasien', [PendaftaranController::class, 'Cari_pasien'])->name('caripasien');
Route::post('ambildetailpasien', [PendaftaranController::class, 'Ambil_detail_pasien'])->name('ambildetailpasien');
Route::post('simpanpendaftaran', [PendaftaranController::class, 'Simpan_pendaftaran'])->name('simpanpendaftaran');


//farmasi route
Route::get('Layananresep', [FarmasiController::class, 'Layananresep'])->middleware('guest')->name('Layananresep');



//RME DOKTER
Route::get('rmedokter', [DokterController::class, 'index'])->middleware('guest')->name('rmedokter');
Route::post('assesmendokter', [DokterController::class, 'assesmendokter'])->middleware('guest')->name('assesmendokter');



//RME PERAWAT
Route::get('rmeperawat', [PerawatController::class, 'index'])->middleware('guest')->name('rmeperawat');
Route::post('assesmenperawat', [PerawatController::class, 'assesmenperawat'])->middleware('guest')->name('assesmenperawat');

//penunjang
Route::get('laboratorium', [LaboratoriumController::class, 'index'])->middleware('guest')->name('laboratorium');
Route::post('detailorderlab', [LaboratoriumController::class, 'detailorderlab'])->middleware('guest')->name('detailorderlab');
