<?php

use Illuminate\Support\Facades\Route;

Route::get('/cms/admin/', function() {
    return view('pages.dashboard');
});

Route::fallback(function () {
    return view('frontend');
});