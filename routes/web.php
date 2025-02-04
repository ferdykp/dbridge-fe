<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\StockCodeController;
use App\Http\Controllers\SesiController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WrController;
use App\Http\Controllers\BcsController;
use App\Http\Controllers\MidlifeController;
use App\Http\Controllers\OverhaulController;
use App\Http\Controllers\PeriodicController;

// use App\Http\Controllers\RolePermissionController;
// use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Guest Routes (Login)
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login']);
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // WR Management
    Route::resource('wr', WrController::class);
    Route::get('wr-export', [WrController::class, 'export'])->name('wr.export');
    Route::post('wr/import', [WrController::class, 'import'])->name('wr.import');

    Route::get('/stockCode/autocomplete', [StockCodeController::class, 'autocomplete'])->name('stockCode.autocomplete');
    Route::get('/autocomplete', [StockCodeController::class, 'autocomplete'])->name('autocomplete');

    Route::get('/stockcode', [StockCodeController::class, 'search']);
    Route::resource('stockCode', StockCodeController::class);


    Route::get('/import-stockcode', [StockCodeController::class, 'showImportForm'])->name('import.form');
    Route::post('/import-stockcode', [StockCodeController::class, 'importExcel'])->name('import.excel');

    Route::get('/stock-code/search', [StockCodeController::class, 'search'])->name('stockCode.search');

    // Dashboard
    Route::get('/dashboard', function () {
        // $role = Auth::check() && Auth::user()->role == 'sm';
        $role = Auth::check() ? Auth::user()->role : null;
        if ($role === 'sm') {
            return redirect()->route('adminDashboard');
        } elseif ($role === 'supplier') {
            return redirect()->route('supplierDashboard');
        } else {
            return redirect()->route('userDashboard');
        }
    })->name('dashboard');

    Route::get('/bcs', [BcsController::class, 'index'])->name('bcs');
    Route::get('/midlife', [MidlifeController::class, 'index'])->name('midlife');
    Route::get('/overhaul', [OverhaulController::class, 'index'])->name('overhaul');
    Route::get('/periodic', [PeriodicController::class, 'index'])->name('periodic');

    Route::prefix('dashboard')->group(function () {
        Route::get('admin', [WrController::class, 'index'])->name('adminDashboard');
        Route::get('supplier', [WrController::class, 'index'])->name('supplierDashboard');
        Route::get('user', [WrController::class, 'index'])->name('userDashboard');
    });

    // Users Management (Admin Only)
    Route::middleware([AdminMiddleware::class . ':sm'])->group(function () {
        Route::resource('users', UserController::class);
        // Route::get('userlist', [UserController::class, 'index'])->name('users.list');
    });

    // Stock Code
    Route::get('/get-stock/{stock_code}', [StockCodeController::class, 'getStockData'])->name('stock.get');

    // Role & Permission Management
    // Route::prefix('role')->middleware(['admin'])->name('roles.')->group(function () {
    //     Route::get('/permissions', [RolePermissionController::class, 'index'])->name('permissions.index');
    //     Route::post('/permissions', [RolePermissionController::class, 'store'])->name('permissions.store');
    // });

    // Logout
    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');
});

// Test Route
Route::get('/test', function () {
    return view('test');
});
