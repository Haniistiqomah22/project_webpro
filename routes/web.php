<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/nilai', [App\Http\Controllers\NilaiController::class, 'index'])->name('nilai');
Route::get('/himatika', [App\Http\Controllers\HimatikaController::class, 'index'])->name('himatika');

Route::post('/simpan-data-nilai', [App\Http\Controllers\NilaiController::class, 'simpan'])->name('simpan');
Route::get('/hapus-data-nilai/{id}', [App\Http\Controllers\NilaiController::class, 'hapus'])->name('hapus');
Route::get('/update-data-nilai/{id}', [App\Http\Controllers\NilaiController::class, 'update'])->name('update');

Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa');
Route::post('/simpan-data-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'simpan'])->name('simpan');
Route::get('/hapus-data-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'hapus'])->name('hapus');
Route::get('/update-data-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('update');

Route::post('/simpan-data-mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'simpan'])->name('simpan');
Route::get('/hapus-data-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'hapus'])->name('hapus');
Route::get('/update-data-mahasiswa/{id}', [App\Http\Controllers\MahasiswaController::class, 'update'])->name('update');


