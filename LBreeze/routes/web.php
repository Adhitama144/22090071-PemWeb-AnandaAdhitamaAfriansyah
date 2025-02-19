<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/rekomendasi', function () {
    return view('rekomendasi.index');
})->middleware(['auth', 'verified'])->name('rekomendasi');

Route::get('/riwayat-spk', function () {
    return view('riwayat-spk.index');
})->middleware(['auth', 'verified'])->name('riwayat-spk');

Route::get('/daftar-mitra', function () {
    return view('daftar-mitra.index');
})->middleware(['auth', 'verified'])->name('daftar-mitra');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
