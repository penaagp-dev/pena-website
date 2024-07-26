<?php

use App\Http\Controllers\CMS\CoreManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/cms/admin/', function() {
    return view('pages.dashboard');
});

Route::get('/cms/admin/core-management', function() {
    return view('pages.coreManagement');
});

Route::prefix('v1')->group(function() {
    Route::prefix('core-management')->controller(CoreManagementController::class)->group(function() {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::post('/update/{id}', 'updateData');
    });
});

Route::fallback(function () {
    return view('frontend');
});