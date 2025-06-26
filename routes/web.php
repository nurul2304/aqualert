<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\OperatorAuthController;
use App\Http\Controllers\PublicReportController;
use App\Http\Controllers\AdminReportController;


Route::get('/', function () {
    return view('landing');
});

// Admin Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login'); // <- ini harus .login
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/manage-user', [AdminController::class, 'index'])->name('admin.users');
Route::post('/manage-user', [AdminController::class, 'store'])->name('admin.users.store');
Route::put('/admin/manage-user/{id}', [AdminController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/manage-user/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/laporan-masuk2', [AdminReportController::class, 'laporanMasuk2'])->name('admin.laporan-masuk2');
Route::patch('/admin/reports/{report_id}/update-status', [AdminReportController::class, 'updateStatus'])
    ->name('admin.reports.updateStatus');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/visualdata', [AdminController::class, 'visualData'])->name('admin.visualdata');

Route::get('/admin/notifikasi', [AdminController::class, 'notifikasi'])->name('admin.notifikasi');
Route::get('/admin/manage-user', [AdminController::class, 'manageUser'])->name('admin.manage-user');
Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::get('/admin/chart', [AdminController::class, 'chart'])->name('admin.chart');



// Operator Routes
Route::get('/operator/login', [OperatorAuthController::class, 'showLoginForm'])->name('operator.login');
Route::post('/operator/login', [OperatorAuthController::class, 'login'])->name('operator.login.post');

Route::get('/operator/dashboard', [OperatorController::class, 'dashboard'])->name('operator.dashboard');
Route::get('/operator/visualdata', [OperatorController::class, 'visualdata'])->name('operator.visualdata');
Route::get('/operator/laporan-masuk2', [OperatorController::class, 'laporanMasuk2'])->name('operator.laporan-masuk2');
Route::get('/operator/notifikasi', [OperatorController::class, 'notifikasi'])->name('operator.notifikasi');
Route::get('/operator/profile', [OperatorController::class, 'profile'])->name('operator.profile');


// Public Routes
Route::post('/public/report', [PublicReportController::class, 'store'])->name('public.report.store');
Route::get('/public/report-success/{token}', [PublicReportController::class, 'success'])->name('public.report.success');
Route::get('/public/report-track', [PublicReportController::class, 'lookup'])->name('public.status.lookup');
Route::post('/public/report-list', [PublicReportController::class, 'reportList'])->name('public.report-list');



Route::get('/public/add-report', [PublicController::class, 'addReport'])->name('add-report');
Route::get('/public/report-list', [PublicController::class, 'reportList'])->name('report-list');

