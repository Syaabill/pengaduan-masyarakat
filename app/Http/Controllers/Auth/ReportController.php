<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController
{
    public function getReportData()
    {
        $totalReports = DB::table('pengaduan')->count();
        $completedReports = DB::table('pengaduan')->where('status', 'Selesai')->count();

        return response()->json([
            'totalReports' => $totalReports,
            'completedReports' => $completedReports,
        ]);
    }
}
