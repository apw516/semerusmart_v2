<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\PerawatController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\RegisterController;

//dashboard route
Route::get('home', [LandingController::class, 'index'])->name('home');
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('dashboardlanding', [LandingController::class, 'Dashboard_landing'])->name('dashboardlanding');
Route::get('jadwalpoli', [LandingController::class, 'Jadwal_poli'])->name('jadwalpoli');
Route::get('kontakkami', [LandingController::class, 'Kontak_kami'])->name('kontakkami');
Route::get('login', [LandingController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LandingController::class, 'authenticate']);
Route::get('register', [LandingController::class, 'Register'])->middleware('guest')->name('register');
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/register', [LandingController::class, 'Store'])->name('/register');
Route::get('logout', [LandingController::class, 'logout'])->name('logout');

//kasir route
Route::get('Kasir', [KasirController::class, 'index'])->middleware('guest')->name('kasir');
Route::post('get_patient_cashier', [KasirController::class, 'get_data_patient_cashier'])->middleware('guest')->name('get_patient_cashier');
Route::post('search_patient_cashier', [KasirController::class, 'search_patient_cashier'])->middleware('guest')->name('search_patient_cashier');

//pendaftaran route
Route::get('DaftarPelayanan', [PendaftaranController::class, 'DaftarPelayanan'])->middleware('auth')->name('DaftarPelayanan');
Route::get('RiwayatPendaftaran', [PendaftaranController::class, 'Riwayat_pendaftaran'])->middleware('auth')->name('RiwayatPendaftaran');
Route::get('cariprovinsi', [PendaftaranController::class, 'Cari_provinsi'])->middleware('auth')->name('cariprovinsi');
Route::get('carikabupaten', [PendaftaranController::class, 'Cari_kabupaten'])->middleware('auth')->name('carikabupaten');
Route::get('carikecamatan', [PendaftaranController::class, 'Cari_kecamatan'])->middleware('auth')->name('carikecamatan');
Route::get('caridesa', [PendaftaranController::class, 'Cari_desa'])->middleware('auth')->name('caridesa');
Route::post('ambildatapasien', [PendaftaranController::class, 'Ambil_data_pasien'])->name('ambildatapasien');
Route::post('ambil_riwayat_pendaftaran', [PendaftaranController::class, 'Ambil_riwayat_pendaftaran'])->name('ambil_riwayat_pendaftaran');
Route::post('caripasien', [PendaftaranController::class, 'Cari_pasien'])->name('caripasien');
Route::post('ambildetailpasien', [PendaftaranController::class, 'Ambil_detail_pasien'])->name('ambildetailpasien');
Route::post('simpanpendaftaran', [PendaftaranController::class, 'Simpan_pendaftaran'])->name('simpanpendaftaran');
Route::post('simpanpasienbaru', [PendaftaranController::class, 'Simpan_pasien_baru'])->name('simpanpasienbaru');


//Farmasi Route
Route::get('masterbarang', [FarmasiController::class, 'Master_barang'])->middleware('auth')->name('masterbarang');
Route::get('stokbarang', [FarmasiController::class, 'Stok_barang'])->middleware('auth')->name('stokbarang');
Route::post('ambil_master_barang', [FarmasiController::class, 'Ambil_master_barang'])->middleware('auth')->name('ambil_master_barang');
Route::post('cari_master_barang', [FarmasiController::class, 'Cari_master_barang'])->middleware('auth')->name('cari_master_barang');
Route::get('indexmastersupplier', [FarmasiController::class, 'Index_master_supplier'])->middleware('auth')->name('indexmastersupplier');
Route::post('ambil_master_supplier', [FarmasiController::class, 'Ambil_master_supplier'])->middleware('auth')->name('ambil_master_supplier');
Route::post('simpanmasterbarang', [FarmasiController::class, 'Simpan_master_barang'])->middleware('auth')->name('simpanmasterbarang');
Route::post('simpanmastersupplier', [FarmasiController::class, 'Simpan_master_supplier'])->middleware('auth')->name('simpanmastersupplier');
Route::post('simpan_po', [FarmasiController::class, 'Simpan_po_masuk'])->middleware('auth')->name('simpan_po');
Route::post('add_obat_po', [FarmasiController::class, 'Add_obat_po'])->middleware('auth')->name('add_obat_po');
Route::post('ambil_riwayat_po_header', [FarmasiController::class, 'Ambil_riwayat_po_header'])->middleware('auth')->name('ambil_riwayat_po_header');
Route::post('ambil_riwayat_stok_sediaan', [FarmasiController::class, 'Ambil_riwayat_stok_sediaan'])->middleware('auth')->name('ambil_riwayat_stok_sediaan');
Route::post('ambil_kartu_stok', [FarmasiController::class, 'Ambil_kartu_stok'])->middleware('auth')->name('ambil_kartu_stok');
Route::post('detail_po', [FarmasiController::class, 'Detail_po'])->middleware('auth')->name('detail_po');


//farmasi route
Route::get('Layananresep', [FarmasiController::class, 'Layananresep'])->middleware('auth')->name('Layananresep');



//RME DOKTER
Route::get('rmedokter', [DokterController::class, 'index'])->middleware('guest')->name('rmedokter');
Route::post('assesmendokter', [DokterController::class, 'assesmendokter'])->middleware('guest')->name('assesmendokter');



//RME PERAWAT
Route::get('rmeperawat', [PerawatController::class, 'index'])->middleware('guest')->name('rmeperawat');
Route::post('assesmenperawat', [PerawatController::class, 'assesmenperawat'])->middleware('guest')->name('assesmenperawat');

//penunjang
Route::get('laboratorium', [LaboratoriumController::class, 'index'])->middleware('guest')->name('laboratorium');
Route::post('detailorderlab', [LaboratoriumController::class, 'detailorderlab'])->middleware('guest')->name('detailorderlab');
