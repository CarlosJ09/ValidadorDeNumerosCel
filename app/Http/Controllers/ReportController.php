<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Client;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();

        return response()->json($reports);
    }

    public function store(Request $request)
    {
        $client = new Client;
        $reports = new Report;

        $reports->client_id = '1';
        $reports->report_name = 'reportePrueba';
        $reports->cant_val = '58';
        $reports->user_id = '1';
        $reports->json = json_encode($request->all());;

        $reports->save();
    }
}
