<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PublicController;

// Operator Routes
Route::get('/dashboard', [OperatorController::class, 'dashboard'])->name('dashboard');
Route::get('/visualdata', [OperatorController::class, 'visualdata'])->name('visualdata');
Route::get('/laporan-masuk', [OperatorController::class, 'laporanMasuk'])->name('laporan-masuk');
Route::get('/notifikasi', [OperatorController::class, 'notifikasi'])->name('notifikasi');

// Public Routes
Route::get('/add-report', [PublicController::class, 'addReport'])->name('add-report');
Route::get('/report-list', [PublicController::class, 'reportList'])->name('report-list');
