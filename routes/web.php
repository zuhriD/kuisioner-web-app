<?php

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

Route::middleware('guest')->group(function () {
    
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('auths.login');
});



Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('homeAdmin');

    // User
    Route::resource('users', App\Http\Controllers\UserController::class);
    // provinsi
    Route::resource('provinsis', App\Http\Controllers\ProvinsiController::class);
    // kabupaten
    Route::resource('kabupatens', App\Http\Controllers\KabupatenController::class);
    // kecamatan
    Route::resource('kecamatans', App\Http\Controllers\KecamatanController::class);
    // desa
    Route::resource('desas', App\Http\Controllers\DesaController::class);
    // sls  
    Route::resource('sls', App\Http\Controllers\SlsController::class);
    // keluarga
    Route::resource('keluargas', App\Http\Controllers\KeluargaController::class);
    // ppl  
    Route::resource('ppl', App\Http\Controllers\PplController::class);
    // pml
    Route::resource('pml', App\Http\Controllers\PmlController::class);
    // kuisioner
    Route::resource('kuisioners', App\Http\Controllers\KuisionerController::class);


    // Logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auths.logout');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homeUser');
    // Logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auths.logout');
});
