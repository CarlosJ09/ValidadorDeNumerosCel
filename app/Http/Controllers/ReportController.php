<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Client;

class ReportController extends Controller
{

    public function store(Request $request)
    {
        $client = new Client;
        $reports = new Report;
        
        $reports->client_id = $request->$client->client_id;
        $reports->report_name = 'report1';
        $reports->cant_val = '58';
        $reports->user_id = '1';
        $reports->json = json_encode($request->all());;
        
        $reports->save();
    }
}
