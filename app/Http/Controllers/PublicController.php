<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function addReport()
    {
        return view('public.add-report');
    }

    public function reportList()
    {
        return view('public.report-list');
    }
}
