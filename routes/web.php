<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/visualdata', [AdminController::class, 'visualdata'])->name('admin.visualdata');
Route::get('/admin/laporan-masuk', [AdminController::class, 'laporanMasuk'])->name('admin.laporan-masuk');
Route::get('/admin/laporan-masuk2', [AdminController::class, 'laporanMasuk2'])->name('admin.laporan-masuk2');
Route::get('/admin/notifikasi', [AdminController::class, 'notifikasi'])->name('admin.notifikasi');
Route::get('/admin/manage-user', [AdminController::class, 'manageUser'])->name('admin.manage-user');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/chart', [AdminController::class, 'chart'])->name('admin.chart');



// Operator Routes
Route::get('/operator/login', [OperatorController::class, 'login'])->name('operator.login');
Route::get('/operator/dashboard', [OperatorController::class, 'dashboard'])->name('operator.dashboard');
Route::get('/operator/visualdata', [OperatorController::class, 'visualdata'])->name('operator.visualdata');
Route::get('/operator/laporan-masuk', [OperatorController::class, 'laporanMasuk'])->name('operator.laporan-masuk');
Route::get('/operator/laporan-masuk2', [OperatorController::class, 'laporanMasuk2'])->name('operator.laporan-masuk2');
Route::get('/operator/notifikasi', [OperatorController::class, 'notifikasi'])->name('operator.notifikasi');
Route::get('/operator/profile', [OperatorController::class, 'profile'])->name('profile');

// Public Routes
Route::get('/public/daftar', [PublicController::class, 'daftar'])->name('daftar');
Route::get('/public/login', [PublicController::class, 'login'])->name('login');
Route::get('/public/add-report', [PublicController::class, 'addReport'])->name('add-report');
Route::get('/public/report-list', [PublicController::class, 'reportList'])->name('report-list');
Route::get('/public/daftar', [PublicController::class, 'daftar'])->name('daftar');
