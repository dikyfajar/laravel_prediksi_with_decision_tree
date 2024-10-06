<?php

use App\Http\Controllers\AkurasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\SplitController;
use App\Http\Controllers\VisualisasiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Navigasi
Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/input', [InputController::class, 'index'])->name('input');
Route::get('/split', [SplitController::class, 'index'])->name('split');
Route::get('/visualisasi', [VisualisasiController::class, 'index'])->name('visualisasi');
Route::get('/prediksi', [PrediksiController::class, 'index'])->name('prediksi');
Route::get('/akurasi', [AkurasiController::class, 'index'])->name('akurasi');

// Input
Route::post('/upload', [InputController::class, 'upload'])->name('upload');

// Split
Route::post('/spliting', [SplitController::class, 'split'])->name('spliting');

// Prediksi
Route::post('/proses-prediksi', [PrediksiController::class, 'process'])->name('proses-prediksi');
Route::post('/predict', [PrediksiController::class, 'predict'])->name('predict');
