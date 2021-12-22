<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/clear-view', function() {
    $exitCode = Artisan::call('view:cache');
    return 'DONE Clear View Cache'; //Return anything
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/ceo', [DashboardController::class, 'admin'])->name('dashboard.admin');
});
Route::group(['middleware' => ['role:dosen']], function () {
    Route::get('/ruangdosen', [DashboardController::class, 'dosen'])->name('dashboard.dosen');
});
Route::group(['middleware' => ['role:mahasiswa']], function () {
    Route::get('/cafetaria', [DashboardController::class, 'mahasiswa'])->name('dashboard.mahasiswa');
});

Route::resource('menu', MenuController::class);
Route::resource('dosen', DosenController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('jadwal', JadwalController::class);