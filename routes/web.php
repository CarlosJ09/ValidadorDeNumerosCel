<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Resources\RoleResource;
use Inertia\Inertia;

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
    return Inertia::render('Login', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

/* Pages */
Route::get('/dashboard', function () {
    return Inertia::render('Home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/validacion', function () {
    return Inertia::render('Validacion');
})->middleware(['auth', 'verified'])->name('validacion');

Route::get('/reportes', function () {
    return Inertia::render('Reportes');
})->middleware(['auth', 'verified'])->name('reportes');

Route::get('/reportes/individual', function () {
    return Inertia::render('ReportView');
})->middleware(['auth', 'verified'])->name('individual');

Route::get('/administrador', function () {
    return Inertia::render('Admin');
})->middleware(['auth', 'verified'])->name('administrador');

require __DIR__ . '/auth.php';

/* Group */
Route::group(
    [
        'namespace' => 'App\Http\Controllers\Admin',
        'prefix' => 'admin',
        'middleware' => ['auth'],
    ],

    function () {
        Route::resource('user', 'UserController');
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');
    }
);

Route::resource('/Reports', ReportController::class);
Route::resource('/Clients', ClientController::class);
