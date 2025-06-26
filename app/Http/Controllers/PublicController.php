<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function addReport()
    {
        return response()
            ->view('public.add-report')
            ->header('Cache-Control');
    }

    public function reportList()
    {
        return response()
            ->view('public.report-list')
            ->header('Cache-Control');
    }
    public function success()
    {
        return response()
            ->view('public.report-success')
            ->header('Cache-Control');
    }
    
    
}
