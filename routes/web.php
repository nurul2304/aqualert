<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/visualdata', function () {
    return view('visualdata');
})->name('visualdata');

Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');

Route::get('/notifikasi', function () {
    return view('notifikasi');
})->name('notifikasi');
