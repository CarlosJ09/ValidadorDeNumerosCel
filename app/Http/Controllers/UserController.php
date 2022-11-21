<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name', 'N/A');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->company = $request->input('company', 'N/A');
        $user->remember_token = $request->input('confirmPassword');

        $user->save();

        Auth::login($user);
        return redirect()->to('/Home');
    }
}
