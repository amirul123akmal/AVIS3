<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\Actor;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function showReportController(){
        return view('admin.Report.report');
    }

    public function activityReport(Request $request){
        $query = null;
        $name = '';
        if ($request->reportType === 'activity') {
            $query = Activity::query();
            $name = 'Activity_Report';
        } elseif ($request->reportType === 'transport') {
            $query = Transportation::query();
            $name = 'Transport_Report';
        } elseif ($request->reportType === 'volunteer') {
            $name = 'Volunteer_Report';
            $query = Actor::query();
            $query->join('status', 'actor.statusID', '=', 'status.statusID');
            $query->whereAccountid(3);
        } elseif ($request->reportType === 'beneficiary') {
            $name = 'Beneficiary_Report';
            $query = Actor::query();
            $query->join('status', 'actor.statusID', '=', 'status.statusID');
            $query->whereAccountid(2);
        } elseif ($request->reportType === 'all') {
            // No additional filtering needed for all types
        }

        if ($request->startDate) {
            $query->whereDate('created_at', '>=', $request->startDate);
        }

        if ($request->endDate) {
            $query->whereDate('created_at', '<=', $request->endDate);
        }

        $data = $query->get();
        $pdf = Pdf::loadView('admin.Report.GenReport', ['data' => $data, 'type' => $request->reportType])->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        $pdf->setPaper('a3', 'landscape');
        return $pdf->download($name.'.pdf');
        // return view('admin.Report.GenReport', ['data' => $data, 'type' => $request->reportType]);
    }
}
