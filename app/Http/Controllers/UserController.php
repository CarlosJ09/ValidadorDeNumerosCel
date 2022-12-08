<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }
    public function register(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name', 'N/A');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->company = $request->input('company', 'N/A');
        $user->remember_token = $request->input('confirm');

        $user->save();

        Auth::login($user);
        return redirect()->route('Home');
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
            /* "active" => true, */
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();

            return redirect('/Home');  /* ->intended((route('Home'))); */
        } else {
            return redirect()->route('LogIn');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
