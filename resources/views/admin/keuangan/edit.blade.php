<?php
// ======================================================================
// LANGKAH 4: Buat Tampilan Edit Keuangan
// FILE: resources/views/admin/keuangan/edit.blade.php
// LOKASI: Buat file baru ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Transaksi Keuangan</h1>
    <form action="{{ route('admin.keuangan.update', $keuangan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="tanggal" class="form-label">Tanggal</label><input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $keuangan->tanggal) }}" required></div>
        <div class="mb-3"><label for="keterangan" class="form-label">Keterangan</label><input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $keuangan->keterangan) }}" required></div>
        <div class="mb-3"><label for="jenis" class="form-label">Jenis Transaksi</label><select class="form-select" name="jenis" required><option value="pemasukan" {{ $keuangan->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option><option value="pengeluaran" {{ $keuangan->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option></select></div>
        <div class="mb-3"><label for="jumlah" class="form-label">Jumlah (Rp)</label><input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $keuangan->jumlah) }}" required></div>
        <button type="submit" class="btn btn-primary">Update Transaksi</button>
    </form>
@endsection