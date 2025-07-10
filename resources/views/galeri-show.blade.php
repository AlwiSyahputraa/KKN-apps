<?php
// ======================================================================
// LANGKAH 3: Buat Tampilan untuk Halaman Detail Galeri
// FILE: resources/views/galeri-show.blade.php
// LOKASI: Buat file baru ini.
// ======================================================================
?>
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h1 class="fw-bold mb-3">{{ $galeri->judul }}</h1>
            <p class="text-muted">Dipublikasikan pada {{ $galeri->created_at->format('d F Y') }}</p>
            
            <img src="{{ asset($galeri->url_gambar) }}" class="img-fluid rounded shadow-sm my-4" alt="{{ $galeri->judul }}">

            @if($galeri->deskripsi)
            <div class="mt-4" style="text-align: justify; line-height: 1.8;">
                <p>{{ $galeri->deskripsi }}</p>
            </div>
            @endif

            <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-5">← Kembali</a>
        </div>
    </div>
</div>
@endsection
