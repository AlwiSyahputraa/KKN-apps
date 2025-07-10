<?php
// ======================================================================
// LANGKAH 1: Buat Layout Khusus untuk Otentikasi
// FILE: resources/views/layouts/auth.blade.php
// LOKASI: Buat folder 'layouts' (jika belum ada) dan file baru ini di dalamnya.
// ======================================================================
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Website KKN</title>

    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0B2447;
            --light-color: #F8F9FA;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-color);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            padding: 2rem;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,.1);
        }
        .auth-card .form-floating:focus-within {
            z-index: 2;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <main class="w-100">
        @yield('content')
    </main>
</body>
</html>