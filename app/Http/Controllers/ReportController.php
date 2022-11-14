<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{

    public function store(Request $request)
    {
        $reports = new Report;
        
        $reports->client_id = 1;
        $reports->report_name = 'report1';
        $reports->cant_val = '58';
        $reports->user_id = '1';
        $reports->json = json_encode($request->all());;

        $reports->save();
    }
}
