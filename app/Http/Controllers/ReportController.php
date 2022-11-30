<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return response()->json($reports);
    }

    public function store(Request $request)
    {
        $reports = new Report;

        $reports->client_id = '1';
        $reports->report_name = 'reporte SENDIU';
        $reports->cant_val = count($request->all());
        $reports->user_id = '1';
        $reports->json = json_encode($request->all());

        $reports->save();
    }
}
