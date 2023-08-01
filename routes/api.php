<?php

use App\Http\Controllers\API\PendaftaranController;
use App\Http\Controllers\Api\SetupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API pendaftaran
Route::prefix('v1')->controller(PendaftaranController::class)->group(function () {
    Route::get('/febba411-89e8-4fb3-9f55-85c56dcff41d/pendaftaran', 'getAllData');
    Route::post('/febba411-89e8-4fb3-9f55-85c56dcff41d/pendaftaran', 'createData');
    Route::get('/9d97457b-1922-4f4a-b3fa-fcba980633a2/pendaftaran/get/{uuid}', 'getDataByUuid');
    Route::post('/4a3f479a-eb2e-498f-aa7b-e7d6e3f0c5f3/pendaftaran/update/{uuid}', 'updateData');
    Route::delete('/83df59b0-7c1a-4944-8fbb-2c06670dfa01/pendaftaran/delete/{uuid}', 'deleteData');
    Route::get('/febba411-89e8-4fb3-9f55-85c56dcff41d/wa/{email}', 'toLinksWa');
});
//API setup
Route::prefix('v2')->controller(SetupController::class)->group(function () {
    Route::get('/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup', 'getAllData');
    Route::post('/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/create', 'createData');
    Route::get('/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/get/{uuid}', 'getDataByUuid');
    Route::post('/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/update/{uuid}', 'updateDataByUuid');
    Route::delete('/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/delete/{uuid}', 'deleteData');
});
