<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\FarmasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\LandingController;

use App\Http\Controllers\PerawatController;



//dashboard route
Route::get('/', [DashboardController::class, 'index'])->middleware('guest')->name('dashboard');


//pendaftaran route
Route::get('DaftarPelayanan', [PendaftaranController::class, 'DaftarPelayanan'])->middleware('guest')->name('DaftarPelayanan');




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