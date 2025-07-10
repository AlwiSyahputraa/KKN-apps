<?php
// ======================================================================
// LANGKAH 2: Perbarui Tampilan Detail Permintaan
// FILE: resources/views/admin/keuangan/permintaan/show.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Detail Pembayaran: {{ $permintaan->judul }}</h1>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Detail Rekening Tujuan</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Bank:</strong> {{ $permintaan->bank_name }}</li>
                        <li class="list-group-item"><strong>No. Rekening:</strong> {{ $permintaan->account_number }}</li>
                        <li class="list-group-item"><strong>Atas Nama:</strong> {{ $permintaan->account_holder_name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menunggu Verifikasi ({{ $permintaan->confirmations->where('status', 'pending')->count() }} Orang)</div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            @forelse($permintaan->confirmations->where('status', 'pending') as $confirmation)
                                <tr>
                                    <td>{{ $confirmation->user->name }}</td>
                                    <td><a href="{{ asset($confirmation->proof_of_payment_path) }}" class="btn btn-sm btn-info" target="_blank">Lihat Bukti</a></td>
                                    <td>
                                        <form action="{{ route('admin.permintaan.verify', $confirmation) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">Verifikasi</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td class="text-center text-muted p-3">Tidak ada pembayaran yang menunggu verifikasi.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Sudah Lunas ({{ $permintaan->confirmations->where('status', 'verified')->count() }} Orang)</div>
                <ul class="list-group list-group-flush">
                    @forelse($permintaan->confirmations->where('status', 'verified') as $confirmation)
                        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $confirmation->user->name }} <span class="badge bg-success">Terverifikasi</span></li>
                    @empty
                        <li class="list-group-item text-center text-muted">Belum ada pembayaran yang diverifikasi.</li>
                    @endforelse
                </ul>
            </div>
            <div class="card mt-4">
                <div class="card-header">Belum Konfirmasi ({{ $unconfirmedUsers->count() }} Orang)</div>
                <ul class="list-group list-group-flush">
                    @forelse($unconfirmedUsers as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">{{ $user->name }} <span class="badge bg-danger">Belum Bayar</span></li>
                    @empty
                         <li class="list-group-item text-center text-muted">Semua anggota sudah melakukan konfirmasi.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection