<?php
// ======================================================================
// LANGKAH 2: Hapus Link Registrasi dari Halaman Login
// FILE: resources/views/auth/login.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// ======================================================================
?>
@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card auth-card mx-auto">
    <div class="card-body">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
            <img src="{{ asset($appSettings['logo_path'] ?? '') ?: 'https://placehold.co/100x60/0B2447/FFFFFF?text=Logo' }}" alt="Logo KKN" style="height: 50px;" class="me-2">
            </a>
            <h1 class="h3 mb-3 fw-bold">Admin Login</h1>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                <label for="email">Alamat Email</label>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Ingat Saya
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            
            {{-- Link ke halaman registrasi dihapus dari sini --}}
            
            <hr class="my-3">

            <p class="mt-3 text-center">
                <a href="{{ url('/') }}" class="text-decoration-none">← Kembali ke Website</a>
            </p>
        </form>
    </div>
</div>
@endsection