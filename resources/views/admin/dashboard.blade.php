<?php
// ======================================================================
// LANGKAH 2: Perbarui Tampilan Dashboard Utama
// FILE: resources/views/admin/dashboard.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Menambahkan bagian baru untuk menampilkan daftar tagihan.
// ======================================================================
?>
@extends('admin.layouts.app')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="alert alert-info">
        <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Anda login sebagai: <strong>{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</strong>.</p>
        <hr>
        <p class="mb-0">Silakan gunakan menu di sebelah kiri untuk mengelola konten yang sesuai dengan jabatan Anda.</p>
    </div>

    {{-- BAGIAN BARU: DAFTAR TAGIHAN PEMBAYARAN --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Tagihan Pembayaran Anda</h5>
        </div>
        <div class="list-group list-group-flush">
            @forelse ($tagihan as $item)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">{{ $item->judul }}</h6>
                        <small class="text-muted">Jumlah: Rp {{ number_format($item->jumlah, 0, ',', '.') }}</small>
                    </div>
                    <a href="{{ route('pembayaran.show', $item->kode_unik) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-check-circle me-1"></i> Bayar Sekarang
                    </a>
                </div>
            @empty
                <div class="list-group-item text-center text-muted">
                    Anda tidak memiliki tagihan saat ini. Terima kasih!
                </div>
            @endforelse
        </div>
    </div>
@endsection