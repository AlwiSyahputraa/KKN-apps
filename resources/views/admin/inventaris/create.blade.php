<?php
// FILE: resources/views/admin/inventaris/create.blade.php (DIPERBAIKI)
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Barang Baru</h1>
    <form action="{{ route('admin.inventaris.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label for="nama_barang" class="form-label">Nama Barang</label><input type="text" name="nama_barang" class="form-control" required></div>
        <div class="mb-3"><label for="jumlah" class="form-label">Jumlah</label><input type="number" name="jumlah" class="form-control" required min="1"></div>
        <div class="mb-3"><label for="kondisi" class="form-label">Kondisi</label><select class="form-select" name="kondisi" required><option value="Baik">Baik</option><option value="Rusak Ringan">Rusak Ringan</option><option value="Rusak Berat">Rusak Berat</option></select></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection