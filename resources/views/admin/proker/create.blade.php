<?php
// FILE: resources/views/admin/proker/create.blade.php
// LOKASI: Ganti isi file ini.
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Program Kerja</h1>
    <form action="{{ route('admin.proker.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea></div>
        <div class="mb-3"><label for="status" class="form-label">Status</label><select class="form-select" name="status" required><option value="direncanakan">Direncanakan</option><option value="berlangsung">Berlangsung</option><option value="terlaksana">Terlaksana</option></select></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection