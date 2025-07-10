<?php
// FILE: galeri/create.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Foto Galeri</h1>
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi (Opsional)</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea></div>
        <div class="mb-3"><label for="url_gambar" class="form-label">File Gambar</label><input class="form-control" type="file" id="url_gambar" name="url_gambar" required></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection