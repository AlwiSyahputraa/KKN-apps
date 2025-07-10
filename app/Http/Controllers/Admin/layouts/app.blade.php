<?php
// ======================================================================
// KODE VIEW
// Lokasi: resources/views/admin/
// ======================================================================

// FILE: layouts/app.blade.php (Layout Admin)
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Website KKN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 100vh;">
            <a href="{{ route('admin.berita.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.berita.index') }}" class="nav-link text-white {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <i class="fa fa-newspaper me-2"></i> Berita & Hero
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.proker.index') }}" class="nav-link text-white {{ request()->routeIs('admin.proker.*') ? 'active' : '' }}">
                        <i class="fa fa-tasks me-2"></i> Program Kerja
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.galeri.index') }}" class="nav-link text-white {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                        <i class="fa fa-images me-2"></i> Galeri
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.anggota.index') }}" class="nav-link text-white {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i> Anggota
                    </a>
                </li>
            </ul>
            <hr>
            <div>
                <a href="/" class="btn btn-outline-light w-100 mb-2" target="_blank">Lihat Website</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger w-100">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-100 p-4" style="background-color: #f8f9fa;">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>