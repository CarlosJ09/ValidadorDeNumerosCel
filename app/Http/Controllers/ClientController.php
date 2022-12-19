<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();

        return response()->json($clients);
    }

    public function store(Request $request)
    {
        $client = new Client;

        $client->name = $request->input('name', 'N/A');
        $client->email = $request->input('email', 'N/A');
        $client->company = $request->input('company', 'N/A');
       
        $client->save();
    } 
}
