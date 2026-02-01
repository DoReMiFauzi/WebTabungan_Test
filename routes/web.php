<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tabunganController;

Route::get('/Beranda', [tabunganController::class, 'index'])->name('tabungan.index');
Route::get('/TambahDana', [tabunganController::class, 'create'])->name('tabungan.create');
Route::post('/store', [tabunganController::class, 'store'])->name('tabungan.store');
Route::get('/TarikDana', [tabunganController::class, 'viewTarik'])->name('tabungan.viewTarik');
Route::post('/tarikTabungan', [tabunganController::class, 'tarikTabungan'])->name('tabungan.tarikTabungan');

