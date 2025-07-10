<?php
// ======================================================================
// FILE: resources/views/partials/_navbar.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Memperbaiki logika untuk menampilkan logo.
// ======================================================================
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top py-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="d-flex align-items-center">
                {{-- Diperbaiki: Logika untuk menampilkan logo cadangan --}}
                <img src="{{ asset($appSettings['logo_path'] ?? '') ?: 'https://placehold.co/100x60/0B2447/FFFFFF?text=Logo' }}" alt="Logo KKN" style="height: 50px;" class="me-2">
                <div>
                    <h6 class="mb-0 fw-bold" style="color: #0B2447; font-size: 1rem;">KKN DESA NDOKUM SIROGA</h6>
                    <small class="text-muted" style="font-size: 0.7rem;">UNIVERSITAS ISLAM NEGERI SUMATERA UTARA</small>
                </div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}" href="{{ route('profil') }}">Profil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDocs" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dokumentasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownDocs">
                        <li><a class="dropdown-item" href="/#proker">Program Kerja</a></li>
                        <li><a class="dropdown-item" href="/#galeri">Galeri</a></li>
                        <li><a class="dropdown-item" href="/#berita">Berita</a></li>
                    </ul>
                </li>

                @guest
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    Dashboard {{ ucwords(str_replace('_', ' ', Auth::user()->role)) }}
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>