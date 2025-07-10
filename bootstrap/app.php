<?php
// ======================================================================
// LANGKAH 1: Ubah File bootstrap/app.php
// LOKASI: Buka file ini di folder utama proyek Anda.
// DESKRIPSI: Ini adalah cara baru untuk mengatur redirect setelah login di Laravel.
// ======================================================================

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // TAMBAHKAN BARIS INI:
        // Ini akan mengarahkan pengguna ke '/admin' setelah login berhasil.
        // $middleware->redirectUsersTo('/admin');
        //
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();