<?php
// ======================================================================
// LANGKAH 4: Perbarui Tampilan Form Pembuatan Permintaan
// FILE: resources/views/admin/keuangan/permintaan/create.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Buat Permintaan Pembayaran</h1>
    <form action="{{ route('admin.permintaan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Pembayaran</label>
            <input type="text" name="judul" class="form-control" required placeholder="Contoh: Kas Minggu ke-1">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" required placeholder="Contoh: 10000">
        </div>
        <hr>
        <h5 class="mb-3">Detail Rekening Tujuan</h5>
        <div class="mb-3">
            <label for="bank_name" class="form-label">Nama Bank</label>
            <input type="text" name="bank_name" class="form-control" required placeholder="Contoh: BCA, BNI, Mandiri">
        </div>
        <div class="mb-3">
            <label for="account_number" class="form-label">Nomor Rekening</label>
            <input type="text" name="account_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="account_holder_name" class="form-label">Nama Pemilik Rekening</label>
            <input type="text" name="account_holder_name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buat Permintaan</button>
    </form>
@endsection
