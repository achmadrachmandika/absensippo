<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('role:admin')->get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin/data_magang', [DataMagangController::class, 'index'])->name('admin.data_magang.index');

Route::get('/admin/absenmasuk', [AbsenMasukController::class, 'index'])->name('admin.absenmasuk');
Route::get('/admin/absenkeluar', [AbsenKeluarController::class, 'index'])->name('admin.absenkeluar');




// Route::middleware('role:admin')->get('dashboard', function(){
//     return 'Dashboard';
// })->name('dahsboard');
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');