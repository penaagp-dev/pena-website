<?php

use App\Http\Controllers\API\PendaftaranController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/a31eae80-3df7-4676-84bf-8bec57a7ae0e/user/login', [AuthController::class, 'login']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/a31eae80-3df7-4676-84bf-8bec57a7ae0e/user/logout', [AuthController::class, 'logout']);
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/cms/setup', function () {
    return view('setup');
});

Route::get('/cms/pendaftaran', function () {
    return view('pendaftaran');
});
