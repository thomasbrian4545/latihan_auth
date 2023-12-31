<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar-mahasiswa', [MahasiswaController::class, 'daftarMahasiswa'])->middleware('auth');
Route::get('/tabel-mahasiswa', [MahasiswaController::class, 'tabelMahasiswa'])->middleware('auth');
Route::get('/blog-mahasiswa', [MahasiswaController::class, 'blogMahasiswa'])->middleware('auth');

Route::get('/', [JurusanController::class,'index'])->middleware('auth');
Route::resource('jurusans', JurusanController::class)->middleware('auth');
