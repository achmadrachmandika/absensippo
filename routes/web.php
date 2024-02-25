<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return redirect('/index');
});
Route::get('/index',[dashboardController::class,"index"])->name('index');
Route::get('/absensi-masuk',[dashboardController::class,"absensiMasuk"])->name('absensi-masuk');
Route::get('/absensi-pulang',[dashboardController::class,"absensiPulang"])->name('absensi-pulang');
Route::get('/riwayat',[dashboardController::class,"riwayat"])->name('riwayat');

Route::post('/cek-map-masuk',[dashboardController::class,"cekMapMasuk"])->name('cek-map-masuk');
Route::post('/cek-map-pulang',[dashboardController::class,"cekMapPulang"])->name('cek-map-pulang');

Route::post('/kirim-absensi-masuk',[dashboardController::class,"kirimAbsensiMasuk"])->name('kirim-absensi-masuk');
Route::post('/kirim-absensi-pulang',[dashboardController::class,"kirimAbsensiPulang"])->name('kirim-absensi-pulang');

