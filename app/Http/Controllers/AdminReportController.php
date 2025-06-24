<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function laporanMasuk2(Request $request)
    {
        $month = $request->query('month');

        $reports = Report::when($month, function ($query, $month) {
            return $query->whereMonth('created_at', $month);
        })
        ->latest()
        ->paginate(10);

        return view('admin.laporan-masuk2', compact('reports'));
    }

    public function updateStatus(Request $request, $report_id)
    {
        $report = Report::where('report_id', $report_id)->firstOrFail();
        $report->status = $request->input('status');
        $report->save();

        return back()->with('success', 'Status updated!');
    }


}
