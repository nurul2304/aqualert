<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function laporanMasuk()
    {
        return view('admin.laporan-masuk');
    }
     public function laporanMasuk2()
    {
        return view('admin.laporan-masuk2');
    }
    public function visualData()
    {
    return view('admin.visualdata');
    }
    public function notifikasi()
    {
        return view('admin.notifikasi');
    }
    public function manageUser()
    {
        return view('admin.manage-user');
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function chart()
    {
        return view('admin.chart');
    }
}