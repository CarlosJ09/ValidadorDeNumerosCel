<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        $user->name = 'Carlos';
        $user->email = 'carlos.ml.jimenezz@gmail.com';

        $user->save();
    }
}
