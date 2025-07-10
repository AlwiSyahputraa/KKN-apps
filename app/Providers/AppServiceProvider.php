<?php
// ======================================================================
// FILE: app/Providers/AppServiceProvider.php
// LOKASI: Buka file ini dan ganti seluruh isinya dengan kode di bawah.
// ======================================================================

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; 

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
        // Bagikan data pengaturan ke semua view
        if (Schema::hasTable('settings')) {
            $settings = Setting::pluck('value', 'key');
            View::share('appSettings', $settings);
        } else {
            View::share('appSettings', []);
        }

        // Baris ini akan memperbaiki tampilan paginasi di semua halaman admin
        Paginator::useBootstrapFive();
    }
}