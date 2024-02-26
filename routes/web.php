<?php

use App\Http\Controllers\userDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenMasukController;
use App\Http\Controllers\AbsenKeluarController;
// use App\Http\Controllers\DataMagangController;

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
    return redirect('/login');
});
Auth::routes();


Route::group(['middleware' => ['role:user']], function () {
    // Rute untuk user
    Route::get('/index', [userDashboardController::class, "index"])->name('index');
    Route::get('/absensi-masuk', [userDashboardController::class, "absensiMasuk"])->name('absensi-masuk');
    Route::get('/absensi-pulang', [userDashboardController::class, "absensiPulang"])->name('absensi-pulang');
    Route::get('/riwayat', [userDashboardController::class, "riwayat"])->name('riwayat');

    Route::post('/cek-map-masuk', [userDashboardController::class, "cekMapMasuk"])->name('cek-map-masuk');
    Route::post('/cek-map-pulang', [userDashboardController::class, "cekMapPulang"])->name('cek-map-pulang');

    Route::post('/kirim-absensi-masuk', [userDashboardController::class, "kirimAbsensiMasuk"])->name('kirim-absensi-masuk');
    Route::post('/kirim-absensi-pulang', [userDashboardController::class, "kirimAbsensiPulang"])->name('kirim-absensi-pulang');
});

Route::group(['middleware' => ['role:admin']], function () {
    // Rute untuk admin
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/absenmasuk', [AbsenMasukController::class, 'index'])->name('admin.absenmasuk');
    Route::get('/admin/absenkeluar', [AbsenKeluarController::class, 'index'])->name('admin.absenkeluar');

    Route::get('/admin/cekMapMasuk/{id}', [AbsenMasukController::class, 'cekMapMasuk'])->name('admin.cekMapMasuk');
    Route::get('/admin/cekMapPulang/{id}', [AbsenKeluarController::class, 'cekMapPulang'])->name('admin.cekMapPulang');
});

Route::get('/absensi-masuk/{user_id}', [AbsenMasukController::class, 'show'])->name('absensi-masuk.show');

Route::get('/admin/absensi-masuk/{user_id}', [AbsenMasukController::class, 'show'])->name('admin.absensi-masuk.show');






// Route::middleware('role:admin')->get('dashboard', function(){
//     return 'Dashboard';
// })->name('dahsboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
