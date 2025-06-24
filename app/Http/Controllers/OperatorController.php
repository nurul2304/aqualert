<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    
    public function login()
    {
        return view('operator.login');
    }
    public function dashboard()
    {
        return view('operator.dashboard');
    }
     public function laporanMasuk2()
    {
        return view('operator.laporan-masuk2');
    }
    public function visualData()
    {
    return view('operator.visualdata');
    }
    public function notifikasi()
    {
        return view('operator.notifikasi');
    }
    public function profile()
    {
        return view('operator.profile');
    }
}
