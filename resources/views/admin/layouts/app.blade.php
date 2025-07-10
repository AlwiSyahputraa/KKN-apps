<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - KKN Ndokum Siroga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <style>
        :root {
            --sidebar-bg: #212529;
            --sidebar-width: 280px;
            --sidebar-width-collapsed: 90px;
        }
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        #admin-wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }
        .sidebar {
    display: flex;
    flex-direction: column;
    height: 100vh; /* <--- selalu penuh tinggi layar */
    overflow-y: auto; /* <--- bisa di-scroll kalau isinya banyak */
    background: var(--sidebar-bg);
    color: #fff;
    width: var(--sidebar-width);
    transition: all 0.3s;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1030;
}
        .main-content {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);
            transition: all 0.3s;
        }
        .main-content.collapsed-mode {
            margin-left: var(--sidebar-width-collapsed) !important;
            width: calc(100% - var(--sidebar-width-collapsed)) !important;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .nav-link .fa-fw {
            width: 1.5em;
        }

        /* Collapsed Sidebar */
        .sidebar.collapsed {
            width: var(--sidebar-width-collapsed);
        }
        .sidebar.collapsed + .main-content {
            width: calc(100% - var(--sidebar-width-collapsed));
            margin-left: var(--sidebar-width-collapsed);
        }
        .sidebar.collapsed .sidebar-heading,
        .sidebar.collapsed .menu-text,
        .sidebar.collapsed .user-info-text {
            display: none;
        }
        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding-left: 0;
            padding-right: 0;
        }
        .sidebar.collapsed .btn span {
            display: none;
        }
        .sidebar.collapsed .btn i {
            display: block;
            text-align: center;
        }

        .sidebar.collapsed .user-info {
            justify-content: center;
        }

        /* Mobile Mode */
        @media (max-width: 768px) {
            .sidebar {
                left: -100%;
                width: var(--sidebar-width);
                transition: left 0.3s ease-in-out;
            }
            .sidebar.active {
                left: 0;
            }
            .main-content {
                width: 100% !important;
                margin-left: 0 !important;
            }
            .sidebar-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0, 0, 0, 0.6);
                z-index: 1020;
            }
            .sidebar.active + .sidebar-overlay {
                display: block;
            }
        }
    </style>
</head>
<body>
<div id="admin-wrapper">
    <!-- Sidebar -->
    <aside id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 sidebar">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center text-white text-decoration-none">
                <span class="fs-4 sidebar-heading">Dashboard</span>
            </a>
            <i class="fa fa-bars fs-5 sidebar-toggle d-none d-lg-block" id="sidebarToggleDesktop"></i>
        </div>
        <hr>
        <a href="{{ route('profile.edit') }}" class="d-flex align-items-center user-info mb-3 text-white text-decoration-none">
                <i class="fa fa-user-circle fa-fw fs-2 me-2"></i>
                <div class="user-info-text">
                    <span class="d-block">{{ Auth::user()->name }}</span>
                    <small class="text-white-50">{{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}</small>
                </div>
            </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item"><a href="{{ route('admin.berita.index') }}" class="nav-link text-white {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"><i class="fa fa-newspaper me-2"></i> <span class="menu-text">Berita & Hero</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.proker.index') }}" class="nav-link text-white {{ request()->routeIs('admin.proker.*') ? 'active' : '' }}"><i class="fa fa-tasks me-2"></i> <span class="menu-text">Program Kerja</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.galeri.index') }}" class="nav-link text-white {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"><i class="fa fa-images me-2"></i> <span class="menu-text">Galeri</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white {{ request()->routeIs('admin.keuangan.*') ? 'active' : '' }}"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.dokumen.index') }}" class="nav-link text-white {{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}"><i class="fa fa-file-alt me-2"></i> <span class="menu-text">Arsip Dokumen</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.inventaris.index') }}" class="nav-link text-white {{ request()->routeIs('admin.inventaris.*') ? 'active' : '' }}"><i class="fa fa-box me-2"></i><span class="menu-text">Inventaris Barang</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.anggota.index') }}" class="nav-link text-white {{ request()->routeIs('admin.anggota.*') ? 'active' : '' }}"><i class="fa fa-users me-2"></i> <span class="menu-text">Tim KKN</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.settings.index') }}" class="nav-link text-white {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="fa fa-cog me-2"></i> <span class="menu-text">Pengaturan Web</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.users.index') }}" class="nav-link text-white {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><i class="fa fa-user-shield me-2"></i> <span class="menu-text">Manajemen Akun</span></a></li>
                <li class="nav-item">
                    <a href="{{ route('admin.humas.index') }}" class="nav-link text-white {{ request()->routeIs('admin.humas.*') ? 'active' : '' }}">
                        <i class="fa fa-bullhorn me-2"></i> <span class="menu-text">Kontak & Sosmed</span>
                    </a>
                </li>

            @elseif (in_array(Auth::user()->role, ['ketua', 'wakil_ketua']))
                <li class="nav-item"><a href="{{ route('admin.berita.index') }}" class="nav-link text-white"><i class="fa fa-newspaper me-2"></i> <span class="menu-text">Berita</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.proker.index') }}" class="nav-link text-white"><i class="fa fa-tasks me-2"></i> <span class="menu-text">Program Kerja</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.galeri.index') }}" class="nav-link text-white"><i class="fa fa-images me-2"></i> <span class="menu-text">Galeri</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.dokumen.index') }}" class="nav-link text-white"><i class="fa fa-file-alt me-2"></i> <span class="menu-text">Arsip Dokumen</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.anggota.index') }}" class="nav-link text-white"><i class="fa fa-users me-2"></i> <span class="menu-text">Tim KKN</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.inventaris.index') }}" class="nav-link text-white {{ request()->routeIs('admin.inventaris.*') ? 'active' : '' }}"><i class="fa fa-box me-2"></i><span class="menu-text">Inventaris Barang</span></a></li>
                <li class="nav-item">
                    <a href="{{ route('admin.humas.index') }}" class="nav-link text-white {{ request()->routeIs('admin.humas.*') ? 'active' : '' }}">
                        <i class="fa fa-bullhorn me-2"></i> Kontak & Sosmed
                    </a>
                </li>

            @elseif (Auth::user()->role == 'pdd')
                <li class="nav-item"><a href="{{ route('admin.berita.index') }}" class="nav-link text-white"><i class="fa fa-newspaper me-2"></i> <span class="menu-text">Berita</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.galeri.index') }}" class="nav-link text-white"><i class="fa fa-images me-2"></i> <span class="menu-text">Galeri</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>

            @elseif (Auth::user()->role == 'bendahara')
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.permintaan.index') }}" class="nav-link text-white"><i class="fa fa-qrcode me-2"></i> <span class="menu-text">Permintaan Bayar</span></a></li>

            @elseif (Auth::user()->role == 'sekretaris')
                <li class="nav-item"><a href="{{ route('admin.dokumen.index') }}" class="nav-link text-white"><i class="fa fa-file-alt me-2"></i> <span class="menu-text">Arsip Dokumen</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.proker.index') }}" class="nav-link text-white"><i class="fa fa-tasks me-2"></i> <span class="menu-text">Program Kerja</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>
            
            @elseif (Auth::user()->role == 'humas')
                <li class="nav-item">
                    <a href="{{ route('admin.humas.index') }}" class="nav-link text-white {{ request()->routeIs('admin.humas.*') ? 'active' : '' }}">
                        <i class="fa fa-bullhorn me-2"></i> Kontak & Sosmed
                    </a>
                </li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>

            @elseif (Auth::user()->role == 'acara')
                <li class="nav-item">
                    <a href="{{ route('admin.proker.index') }}" class="nav-link text-white {{ request()->routeIs('admin.proker.*') ? 'active' : '' }}">
                        <i class="fa fa-tasks me-2"></i> <span class="menu-text">Program Kerja</span>
                    </a>
                </li
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>

            @elseif (Auth::user()->role == 'peralatan')
                <li class="nav-item"><a href="{{ route('admin.inventaris.index') }}" class="nav-link text-white {{ request()->routeIs('admin.inventaris.*') ? 'active' : '' }}"><i class="fa fa-box me-2"></i><span class="menu-text">Inventaris Barang</span></a></li>
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet me-2"></i> <span class="menu-text">Laporan Keuangan</span></a></li>
            @elseif (Auth::user()->role == 'konsumsi')
                <li class="nav-item"><a href="{{ route('admin.keuangan.index') }}" class="nav-link text-white"><i class="fa fa-wallet fa-fw me-2"></i><span class="menu-text">Laporan Keuangan</span></a></li>
                    <li class="nav-item"><a href="{{ route('admin.dokumen.index') }}" class="nav-link text-white"><i class="fa fa-file-alt fa-fw me-2"></i><span class="menu-text">Arsip Dokumen</span></a></li>
            @endif
            
            <li class="nav-item mt-3 border-top pt-3"><a href="{{ route('profile.edit') }}" class="nav-link text-white {{ request()->routeIs('profile.edit') ? 'active' : '' }}"><i class="fa fa-user-cog me-2"></i> <span class="menu-text">Pengaturan Akun Saya</span></a></li>
        </ul>
        <hr>
        <div>
            <a href="/" class="btn btn-outline-light w-100 mb-2"><i class="fa fa-globe"></i> <span>Lihat Website</span></a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger w-100"><i class="fa fa-sign-out-alt"></i> <span>Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="main-content w-100">
        <nav class="navbar navbar-light bg-light d-md-none sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" id="sidebarToggleMobile">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
        </nav>
        <div class="p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        const mobileToggle = document.getElementById('sidebarToggleMobile');
        if (mobileToggle) {
            mobileToggle.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                overlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
            });
        }

        if (overlay) {
            overlay.addEventListener('click', function () {
                sidebar.classList.remove('active');
                overlay.style.display = 'none';
            });
        }

        const desktopToggle = document.getElementById('sidebarToggleDesktop');
        if (desktopToggle) {
            desktopToggle.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                const mainContent = document.querySelector('.main-content');
                if (sidebar.classList.contains('collapsed')) {
                    mainContent.classList.add('collapsed-mode');
                } else {
                    mainContent.classList.remove('collapsed-mode');
                }
            });
        }
    });
</script>
</body>
</html>
