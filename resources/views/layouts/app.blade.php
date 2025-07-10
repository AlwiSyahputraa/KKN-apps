<?php
// ======================================================================
// FILE: resources/views/layouts/app.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Menerapkan palet warna baru (Hijau & Pink) di seluruh website.
// ======================================================================
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website KKN Desa Sukamaju</title>

    <!-- Bootstrap CSS dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (untuk ikon sosial media) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Lora:wght@700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Palet Warna Baru: Hijau & Pink */
            --primary-color: #2E7D32; /* Hijau Tua yang Elegan */
            --secondary-color: #E8A0BF; /* Pink Lembut sebagai Aksen */
            --background-color: #FDF8F5; /* Putih Gading yang Hangat */
            --text-color: #333333; /* Abu-abu Tua untuk Teks */
            --footer-bg: #1B4332; /* Hijau Sangat Tua untuk Footer */
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Lora', serif;
            font-weight: 700;
            color: var(--primary-color);
        }
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 1rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            display: block;
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            border-radius: 2px;
            bottom: 0;
            left: 0; /* Rata kiri */
        }
        .text-start .section-title::after {
            left: 0;
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #1B5E20; /* Hijau lebih gelap saat hover */
            border-color: #1B5E20;
        }
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        .badge.bg-primary {
            background-color: var(--accent-color) !important;
        }
        .text-primary {
            color: var(--primary-color) !important;
        }

        /* Hero Section */
        .hero-carousel-item {
            height: 75vh; 
            min-height: 500px;
        }
        .hero-carousel-item .hero-background {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }
        .hero-carousel-item .carousel-caption {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        /* Footer */
        .footer {
            background-color: var(--footer-bg);
            color: rgba(255, 255, 255, 0.7);
        }
        .footer h5.footer-heading {
            color: white !important;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="bg-light">
    
    @include('partials._navbar')

    <main>
        @yield('content')
    </main>

    @include('partials._footer')

    <!-- Bootstrap JS dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
