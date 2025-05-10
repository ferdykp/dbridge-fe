<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Bcs;
use App\Models\wr;
use App\Models\Midlife;
use App\Models\Overhaul;
use App\Models\Periodic;
use App\Models\Lainnya;
use App\Models\StockCode; // Tambahkan model StockCode

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    View::composer('*', function ($view) {
        $role = Auth::check() ? Auth::user()->role : null;

        // Query untuk masing-masing tabel
        $bcsQuery = Bcs::query();
        $wrQuery = Wr::query();
        $midlifeQuery = Midlife::query();
        $overhaulQuery = Overhaul::query();
        $periodicQuery = Periodic::query();
        $lainnyaQuery = Lainnya::query();
        $stockCodeQuery = StockCode::query(); // Tambahkan query untuk StockCode

        // Jika role adalah 'supplier', tambahkan filter tertentu
        if ($role === 'supplier') {
            $bcsQuery->where('home_wh', 'UTVH');
            $wrQuery->where('home_wh', 'UTVH');
            $midlifeQuery->where('home_wh', 'UTVH');
            $overhaulQuery->where('home_wh', 'UTVH');
            $periodicQuery->where('home_wh', 'UTVH');
            $lainnyaQuery->where('home_wh', 'UTVH');
            $stockCodeQuery->where('home_wh', 'UTVH'); // Filter StockCode jika perlu
        }

        // Hitung total data untuk masing-masing kategori
        $dataCounts = [
            'bcsCount' => $bcsQuery->count(),
            'wrCount' => $wrQuery->count(),
            'midlifeCount' => $midlifeQuery->count(),
            'overhaulCount' => $overhaulQuery->count(),
            'periodicCount' => $periodicQuery->count(),
            'lainnyaCount' => $lainnyaQuery->count(),
            'stockCodeCount' => $stockCodeQuery->count(), // Hitung StockCode
        ];

        // Kirim semua data ke view
        $view->with($dataCounts);
    });
}

}