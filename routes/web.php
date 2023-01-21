<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\KategoriController;
use App\Http\Controllers\Petugas\PenerbitController;
use App\Http\Controllers\Petugas\RakController;
use App\Http\Controllers\Petugas\BukuController;
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

Route::get('/cek-role', function () {
    if (auth()->user()->hasRole(['admin','petugas'])) {
        return redirect('/dashboard');
    } else {
        return redirect('/');
    }
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth','role:admin|petugas'])->group(function () {

    Route::get('/dashboard', function () {
        return view('petugas/dashboard');
    });

    Route::get('/kategori',KategoriController::class);
    Route::get('/rak',RakController::class);
    Route::get('/penerbit',PenerbitController::class);
    Route::get('/buku',BukuController::class);
});
