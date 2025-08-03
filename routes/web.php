<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\BorrowController;
use App\Http\Controllers\CMS\CategoryController;
use App\Http\Controllers\CMS\CoreManagementController;
use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\InventarisController;
use App\Http\Controllers\CMS\RegisterCaController;
use App\Http\Controllers\CMS\UserManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('v1/login', [AuthController::class, 'login']);

Route::get('/cms/admin/login', function () {
    return view('auth.login');
})->name('login');


Route::post('api/v1/register-ca/', [RegisterCaController::class, 'registerCaFe']);
Route::get('api/v1/register-ca/verify-email-exp/{token}', [RegisterCaController::class, 'verifyEmailExp'])->name('verify.email');
Route::get('api/v1/core-management', [CoreManagementController::class, 'getAllData']);

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/cms/admin/', function () {
        return view('pages.dashboard');
    });

    Route::get('/cms/admin/core-management', function () {
        return view('pages.coreManagement');
    })->middleware('role:superadmin');

    Route::get('/cms/admin/register-ca', function () {
        return view('pages.registerca');
    })->middleware('role:superadmin');

    Route::get('/cms/admin/inventaris', function () {
        return view('pages.inventaris');
    })->middleware('role:inventaris,superadmin');

    Route::get('/cms/admin/borrow', function () {
        return view('pages.borrow');
    })->middleware('role:inventaris,superadmin');

    Route::get('/cms/admin/category', function () {
        return view('pages.category');
    })->middleware('role:inventaris,superadmin');

    Route::get('/cms/admin/user-management', function () {
        return view('pages.userManagement');
    })->middleware('role:superadmin');

    Route::get('/cms/admin/change-password', function () {
        return view('pages.changePassword');
    });

    Route::prefix('v1')->group(function () {
        Route::prefix('dashboard')->controller(DashboardController::class)->group(function () {
            Route::get('/line-chart', 'dasboardChart');
            Route::get('/count-gender', 'countRegisterByGeder');
            Route::get('/total-register', 'totalRegister');
        });

        Route::prefix('core-management')->controller(CoreManagementController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('register-ca')->controller(RegisterCaController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
            Route::get('/export', 'export');
        });

        Route::prefix('category')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('item-inventaris')->controller(InventarisController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
            Route::post('/returnborrow/{id}', 'returnBorrow');
        });

        Route::prefix('borrow')->controller(BorrowController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/Create', 'CreateData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('user-management')->controller(UserManagementController::class)->group(function () {
            Route::get('/', 'getAllData');
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
            Route::post('/changePassword', 'changePassword');
        });

        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::fallback(function () {
    if (Request::is('uploads/*')) {
        abort(404);
    }

    return view('frontend');
});
