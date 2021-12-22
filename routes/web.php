<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin|manager']], function () {
    Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard.admin');
});