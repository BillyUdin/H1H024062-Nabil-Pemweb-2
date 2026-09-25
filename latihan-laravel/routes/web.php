<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaWebController;
use App\Http\Controllers\MatakuliahController;

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

// Rute Matakuliah yang baru ditambahkan
Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah/{kode}', [MatakuliahController::class, 'show'])->name('matakuliah.show');
Route::get('/mahasiswa-data', [MahasiswaWebController::class, 'index'])->name('mahasiswa.data');
Route::get('/mahasiswa-data/{mahasiswa}', [MahasiswaWebController::class, 'show'])->name('mahasiswa.detail');