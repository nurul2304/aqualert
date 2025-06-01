<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function dashboard()
    {
        return view('operator.dashboard');
    }

    public function laporanMasuk()
    {
        return view('operator.laporan-masuk');
    }

    public function index()
    {
    return view('operator.visualdata'); // pastikan file views/operator/visualdata.blade.php ada
    }

    public function notifikasi()
    {
        return view('operator.notifikasi');
    }
}
