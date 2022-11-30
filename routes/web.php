<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

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

//Login y Registro
Route::get('/', function () {
    return view('welcome');
})->name('LogIn');

Route::get('/Register', function () {
    return view('welcome');
})->name('Register');

/* Requieren Validacion */

Route::get('/Home', function () {
    return view('welcome');
})->middleware('auth')->name('Home');

Route::get('/Validacion', function () {
    return view('welcome');
})->middleware('auth')->name('Validacion');

Route::get('/Reportes', function () {
    return view('welcome');
})->middleware('auth')->name('Reportes');

Route::get('/Reportes/ReportView', function () {
    return view('welcome');
})->middleware('auth')->name('Reportes');

Route::post('/Validacion', function () {
    return view('welcome');
})->middleware('auth');

Route::resource('/Reports', ReportController::class);

Route::resource('/Clients', ClientController::class);








