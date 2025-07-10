<?php
// ======================================================================
// LANGKAH 4: Buat Tampilan untuk Halaman Detail Proker
// FILE: resources/views/proker-show.blade.php
// LOKASI: Buat file baru ini.
// ======================================================================
?>
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <span class="badge rounded-pill bg-primary mb-2 fs-6">{{ ucfirst($proker->status) }}</span>
            <h1 class="fw-bold mb-3">{{ $proker->judul }}</h1>
            
            <div class="mt-4" style="text-align: justify; line-height: 1.8;">
                {!! nl2br(e($proker->deskripsi)) !!}
            </div>

            <a href="{{ route('home') }}#proker" class="btn btn-outline-primary mt-5">← Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection