<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', [LoginController::class, 'store']);

Route::get('/Create', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return view('welcome');
});

Route::get('/Validacion', function () {
    return view('welcome');
});

Route::post('/Validacion', function () {
    return view('welcome');
});

Route::resource('/Reports', ReportController::class);

Route::resource('/Clients', ClientController::class);

Route::resource('/createUser', UserController::class);



