<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function daftar()
    {
        return response()
            ->view('public.daftar')
            ->header('Cache-Control', 'max-age=3600, public');
    }

    public function login()
    {
        return response()
            ->view('public.login')
            ->header('Cache-Control', 'max-age=3600, public');
    }

    public function addReport()
    {
        return response()
            ->view('public.add-report')
            ->header('Cache-Control', 'max-age=3600, public');
    }

    public function reportList()
    {
        return response()
            ->view('public.report-list')
            ->header('Cache-Control', 'max-age=3600, public');
    }
    
}
