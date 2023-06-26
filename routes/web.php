<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

    // Result
    Route::get('/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result.index');

    // Logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auths.logout');
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homeUser');

    // Get Data for ajax automaticly
    Route::get('/getDataProvinsi/{id}', [App\Http\Controllers\HomeController::class, 'getDataProvinsi']);
    Route::get('/getDataKabupaten/{id}', [App\Http\Controllers\HomeController::class, 'getDataKabupaten']);
    Route::get('/getDataKecamatan/{id}', [App\Http\Controllers\HomeController::class, 'getDataKecamatan']);
    Route::get('/getDataDesa/{id}', [App\Http\Controllers\HomeController::class, 'getDataDesa']);
    Route::get('/getDataSl/{id}/{id_sub}', [App\Http\Controllers\HomeController::class, 'getDataSl']);
    Route::get('/getDataKeluarga/{id}', [App\Http\Controllers\HomeController::class, 'getDataKeluarga']);
    Route::get('/getDataPpl/{id}', [App\Http\Controllers\HomeController::class, 'getDataPpl']);
    Route::get('/getDataPml/{id}', [App\Http\Controllers\HomeController::class, 'getDataPml']);
    Route::get('/getDataKuisioner/{id}', [App\Http\Controllers\HomeController::class, 'getDataKuisioner']);

    // Result
    Route::post('/result', [App\Http\Controllers\ResultController::class, 'store'])->name('result.store');
    Route::delete('/result/{id}', [App\Http\Controllers\ResultController::class, 'destroy'])->name('result.destroy');

    // After Result
    Route::get('/afterResult', [App\Http\Controllers\ResultController::class, 'showResult'])->name('afterResult');

    // Logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auths.logout');
});
