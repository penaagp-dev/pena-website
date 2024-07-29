<?php

use App\Http\Controllers\CMS\CoreManagementController;
use App\Http\Controllers\CMS\RegisterCaController;
use Illuminate\Support\Facades\Route;

Route::get('/cms/admin/', function() {
    return view('pages.dashboard');
});

Route::get('/cms/admin/core-management', function() {
    return view('pages.coreManagement');
});

Route::get('/cms/admin/register-ca', function() {
    return view('pages.registerca');
});

Route::post('api/v1/register-ca/', [RegisterCaController::class, 'registerCaFe']);
Route::get('api/v1/register-ca/verify-email-exp/{token}', [RegisterCaController::class, 'verifyEmailExp'])->name('verify.email');

Route::prefix('v1')->group(function() {
    Route::prefix('core-management')->controller(CoreManagementController::class)->group(function() {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    Route::prefix('register-ca')->controller(RegisterCaController::class)->group(function() {
        Route::get('/', 'getAllData');
        Route::post('/create', 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });
});

Route::fallback(function () {
    return view('frontend');
});