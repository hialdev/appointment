<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OperationController;
use App\Models\Menu;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/mkview', function() {
    $exitCode = Artisan::call('make:view dashboard.crud.jadwal --extends=dashboard.layout.app --section="title_dashboard:Jadwal Create" --section=dashcontent');
    return 'DONE Create View'; //Return anything
});
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

Route::resource('database', DatabaseController::class);
Route::resource('menu', MenuController::class);
Route::resource('crud', CrudController::class);

Route::group(['as'=>'aldev'],function(){
    $menus = Menu::where('url','!=',"menu")->where('url','!=',"database")->where('url','!=',"crud")->get();
    foreach ($menus as $menu) {
        Route::get("$menu->url", [OperationController::class, 'index'])->name("$menu->url.index");
        Route::get("$menu->url/create", [OperationController::class, 'create'])->name("$menu->url.create");
        Route::post("$menu->url", [OperationController::class, 'store'])->name("$menu->url.store");
        Route::get("$menu->url/{id}", [OperationController::class, 'show'])->name("$menu->url.show");
        Route::get("$menu->url/{id}/edit", [OperationController::class, 'edit'])->name("$menu->url.edit");
        Route::put("$menu->url/{id}", [OperationController::class, 'update'])->name("$menu->url.update");
        Route::delete("$menu->url/{id}", [OperationController::class, 'destroy'])->name("$menu->url.destroy");
    }
});