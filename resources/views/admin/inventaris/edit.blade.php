<?php
// FILE: resources/views/admin/inventaris/edit.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Inventaris: {{ $inventari->nama_barang }}</h1>
    <form action="{{ route('admin.inventaris.update', $inventari) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="nama_barang" class="form-label">Nama Barang</label><input type="text" name="nama_barang" class="form-control" value="{{ $inventari->nama_barang }}" required></div>
        <div class="mb-3"><label for="jumlah" class="form-label">Jumlah</label><input type="number" name="jumlah" class="form-control" value="{{ $inventari->jumlah }}" required min="1"></div>
        <div class="mb-3"><label for="kondisi" class="form-label">Kondisi</label><select class="form-select" name="kondisi" required><option value="Baik" {{ $inventari->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option><option value="Rusak Ringan" {{ $inventari->kondisi == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option><option value="Rusak Berat" {{ $inventari->kondisi == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option></select></div>
        <div class="mb-3"><label for="status" class="form-label">Status Peminjaman</label><select class="form-select" name="status" required><option value="Tersedia" {{ $inventari->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option><option value="Dipinjam" {{ $inventari->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option></select></div>
        <div class="mb-3"><label for="peminjam" class="form-label">Nama Peminjam (Jika Dipinjam)</label><input type="text" name="peminjam" class="form-control" value="{{ $inventari->peminjam }}"></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
