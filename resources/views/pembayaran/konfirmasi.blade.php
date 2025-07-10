<?php
// ======================================================================
// LANGKAH 5: Perbarui Halaman Konfirmasi Pembayaran (Untuk Anggota)
// FILE: resources/views/pembayaran/konfirmasi.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center"><h4 class="mb-0">Konfirmasi Pembayaran</h4></div>
                    <div class="card-body p-4">
                        <h5 class="card-title text-center">{{ $request->judul }}</h5>
                        <p class="display-6 fw-bold text-center">Rp {{ number_format($request->jumlah, 0, ',', '.') }}</p>
                        <hr>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @elseif($confirmation && $confirmation->status == 'pending')
                            <div class="alert alert-warning">Bukti pembayaran Anda sedang menunggu verifikasi oleh Bendahara.</div>
                        @elseif($confirmation && $confirmation->status == 'verified')
                             <div class="alert alert-success">Pembayaran Anda sudah lunas. Terima kasih!</div>
                        @else
                            {{-- Menampilkan Detail Rekening --}}
                            <div class="text-center mb-4">
                                <p class="fw-bold">Silakan transfer ke rekening berikut:</p>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Bank:</strong> {{ $request->bank_name }}</li>
                                    <li class="list-group-item"><strong>No. Rekening:</strong> {{ $request->account_number }}</li>
                                    <li class="list-group-item"><strong>Atas Nama:</strong> {{ $request->account_holder_name }}</li>
                                </ul>
                            </div>

                            <form action="{{ route('pembayaran.store', $request->kode_unik) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="bukti_pembayaran" class="form-label fw-bold">Unggah Bukti Pembayaran (Screenshot)</label>
                                    <input class="form-control @error('bukti_pembayaran') is-invalid @enderror" type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                                    @error('bukti_pembayaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <button type="submit" class="btn btn-success btn-lg w-100">Saya Sudah Bayar, Kirim Bukti</button>
                            </form>
                        @endif
                        <a href="/" class="btn btn-link mt-3">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection