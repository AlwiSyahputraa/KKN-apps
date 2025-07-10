<?php
// ======================================================================
// LANGKAH 3: Buat Tampilan untuk Halaman Detail Berita
// FILE: resources/views/berita-show.blade.php
// LOKASI: Buat file baru ini.
// ======================================================================
?>
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h1 class="fw-bold mb-3">{{ $berita->judul }}</h1>
            <p class="text-muted">Dipublikasikan pada {{ $berita->created_at->format('d F Y') }}</p>
            
            @if($berita->url_gambar)
                <img src="{{ asset($berita->url_gambar) }}" class="img-fluid rounded shadow-sm my-4" alt="{{ $berita->judul }}">
            @endif

            <div class="mt-4" style="text-align: justify; line-height: 1.8;">
                {!! nl2br(e($berita->konten)) !!}
            </div>

            <a href="{{ route('home') }}" class="btn btn-outline-primary mt-5">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection