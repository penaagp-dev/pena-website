<?php

use App\Http\Controllers\API\PendaftaranController;
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



Route::get('/', function () {
    return view('dashboard');
});

Route::get('/News', function () {
    return view('News');
});

Route::get('/Admin', function () {
    return view('Admin');
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
