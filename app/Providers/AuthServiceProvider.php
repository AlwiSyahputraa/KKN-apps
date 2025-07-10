<?php
// ======================================================================
// LANGKAH 1: Perbarui AuthServiceProvider (Paling Penting)
// FILE: app/Providers/AuthServiceProvider.php
// LOKASI: Ganti seluruh isi fungsi boot() dengan kode di bawah.
// ======================================================================

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Admin bisa melakukan segalanya
        Gate::before(function (User $user, string $ability) {
            if ($user->role === 'admin') {
                return true;
            }
        });

        // Izin untuk mengelola konten (PDD)
        Gate::define('manage-konten', function (User $user) {
            return $user->role === 'pdd';
        });
        
        // Izin untuk mengelola keuangan (Bendahara)
        Gate::define('manage-keuangan', function(User $user) {
            return $user->role === 'bendahara';
        });

        // Diperbaiki: Admin sekarang bisa mengelola dokumen
        Gate::define('manage-dokumen', function(User $user) {
            return in_array($user->role, ['admin', 'sekretaris']);
        });

        Gate::define('manage-humas', function(User $user) {
            return $user->role === 'humas';
        });

        Gate::define('manage-acara', function (User $user) {
            return $user->role === 'acara';
        });

        Gate::define('manage-peralatan', function(User $user) {
            return $user->role === 'peralatan';
        });

        Gate::define('view-all', function(User $user) {
            return in_array($user->role, ['ketua', 'wakil_ketua']);
        });
    }
}