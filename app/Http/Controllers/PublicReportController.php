<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Report;

class PublicReportController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kontak' => 'required|string|max:50',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('laporan', 'public');
        }

        $token = 'LPR-' . strtoupper(Str::random(8));

        $report = Report::create([
            'reporter_name' => $request->nama,
            'reporter_phone' => $request->kontak,
            'title' => $request->judul,
            'description' => $request->deskripsi,
            'location' => $request->lokasi,
            'priority' => $request->priority,
            'status' => 'pending',
            'image_path' => $gambarPath,
            'report_token' => $token,
            'user_id' => null,
        ]);

        return redirect()->route('public.report.success', ['token' => $token]);
    }

    public function success($token)
    {
        return view('public.report-success', compact('token'));
    }

    public function searchForm()
    {
        return view('public.status-form');
    }

    public function lookup(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:reports,report_token'
    ]);

        $report = \App\Models\Report::where('report_token', $request->token)->firstOrFail();

        return view('public.report-list', compact('report'));
    }
     
}
