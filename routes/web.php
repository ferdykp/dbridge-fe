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
use App\Models\Midlife;
use App\Models\Overhaul;
// use App\Models\Midlife;
// use App\Http\Controllers\RolePermissionController;
// use App\Http\Middleware\UserAkses;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

// Guest Routes (Login)
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index']);
    Route::post('/', [SesiController::class, 'login']);
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // Route::get('/wr/search', [WrController::class, 'search'])->name('wr.search');

    Route::get('/stockCode/search', [StockCodeController::class, 'search'])->name('stockCode.search');
    // Route::get('/stockcode', [StockCodeController::class, 'search']);
    Route::resource('stockCode', StockCodeController::class);
    Route::post('/stockCode/bulk-delete', [StockCodeController::class, 'bulkDelete'])->name('stockCode.bulkDelete');


    Route::get('/{type}/search', function ($type) {
        if ($type == 'wr') {
            // Membuat instance WrController dan memanggil search
            $controller = app(WrController::class);
            return $controller->search(request());
        } elseif ($type == 'bcs') {
            // Membuat instance BcsController dan memanggil search
            $controller = app(BcsController::class);
            return $controller->search(request());
        } elseif ($type == 'midlife') {
            // Membuat instance BcsController dan memanggil search
            $controller = app(MidlifeController::class);
            return $controller->search(request());
        } elseif ($type == 'overhaul') {
            // Membuat instance BcsController dan memanggil search
            $controller = app(OverhaulController::class);
            return $controller->search(request());
        } elseif ($type == 'periodic') {
            // Membuat instance BcsController dan memanggil search
            $controller = app(PeriodicController::class);
            return $controller->search(request());
        }
    })->name('dynamic.search');


    Route::resource('wr', WrController::class);
    Route::get('wr-export', [WrController::class, 'export'])->name('wr.export');
    Route::post('wr/import', [WrController::class, 'import'])->name('wr.import');
    Route::post('/wr/bulk-delete', [WrController::class, 'bulkDelete'])->name('wr.bulkDelete');


    Route::resource('bcs', BcsController::class);
    Route::get('bcs-export', [BcsController::class, 'export'])->name('bcs.export');
    Route::post('bcs/import', [BcsController::class, 'import'])->name('bcs.import');
    Route::post('/bcs/bulk-delete', [BcsController::class, 'bulkDelete'])->name('bcs.bulkDelete');


    Route::resource('midlife', MidlifeController::class);
    Route::get('midlife-export', [MidlifeController::class, 'export'])->name('midlife.export');
    Route::post('midlife/import', [MidlifeController::class, 'import'])->name('midlife.import');
    Route::post('/midlife/bulk-delete', [MidlifeController::class, 'bulkDelete'])->name('midlife.bulkDelete');


    Route::resource('overhaul', OverhaulController::class);
    Route::get('overhaul-export', [OverhaulController::class, 'export'])->name('overhaul.export');
    Route::post('overhaul/import', [OverhaulController::class, 'import'])->name('overhaul.import');
    Route::post('/overhaul/bulk-delete', [OverhaulController::class, 'bulkDelete'])->name('overhaul.bulkDelete');


    Route::resource('periodic', PeriodicController::class);
    Route::get('periodic-export', [PeriodicController::class, 'export'])->name('periodic.export');
    Route::post('periodic/import', [PeriodicController::class, 'import'])->name('periodic.import');
    Route::post('/periodic/bulk-delete', [PeriodicController::class, 'bulkDelete'])->name('periodic.bulkDelete');

    Route::post('/{type}/store', function ($type) {
        if ($type == 'wr') {
            // Membuat instance WrController dan memanggil store
            $controller = app(WrController::class);
            return $controller->store(request());
        } elseif ($type == 'bcs') {
            // Membuat instance BcsController dan memanggil store
            $controller = app(BcsController::class);
            return $controller->store(request());
        } elseif ($type == 'midlife') {
            // Membuat instance BcsController dan memanggil store
            $controller = app(MidlifeController::class);
            return $controller->store(request());
        } elseif ($type == 'overhaul') {
            // Membuat instance BcsController dan memanggil store
            $controller = app(OverhaulController::class);
            return $controller->store(request());
        } elseif ($type == 'periodic') {
            // Membuat instance BcsController dan memanggil store
            $controller = app(PeriodicController::class);
            return $controller->store(request());
        }
    })->name('dynamic.store');

    Route::get('/{type}/edit/{id}', function ($type, $id) {
        $controller = match ($type) {
            'wr' => app(WrController::class),
            'bcs' => app(BcsController::class),
            'midlife' => app(MidlifeController::class),
            'overhaul' => app(OverhaulController::class),
            'periodic' => app(PeriodicController::class),
            default => abort(404),
        };

        return $controller->edit($id);
    })->name('dynamic.edit');

    Route::post('/{type}/update/{id}', function (Illuminate\Http\Request $request, $type, $id) {
        $controller = match ($type) {
            'wr' => app(WrController::class),
            'bcs' => app(BcsController::class),
            'midlife' => app(MidlifeController::class),
            'overhaul' => app(OverhaulController::class),
            'periodic' => app(PeriodicController::class),
            default => abort(404),
        };

        return $controller->update($request, $id);
    })->name('dynamic.update');


    // WR Management
    // Route::get('wr-export', [WrController::class, 'export'])->name('wr.export');
    // Route::post('wr/import', [WrController::class, 'import'])->name('wr.import');

    Route::get('stockcode-export', [StockCodeController::class, 'export'])->name('stockCode.export');
    Route::post('stockcode/import', [StockCodeController::class, 'import'])->name('stockCode.import');
    // Route::get('/stockCode/autocomplete', [StockCodeController::class, 'autocomplete'])->name('stockCode.autocomplete');
    // Route::get('/autocomplete', [StockCodeController::class, 'autocomplete'])->name('autocomplete');



    // Route::get('/import-stockcode', [StockCodeController::class, 'showImportForm'])->name('import.form');
    // Route::post('/import-stockcode', [StockCodeController::class, 'importExcel'])->name('import.excel');


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
