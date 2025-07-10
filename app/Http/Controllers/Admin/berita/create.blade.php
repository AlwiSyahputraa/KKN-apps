<?php
// FILE: berita/create.blade.php
?>
@extends('admin.layouts.app')

@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Berita Baru</h1>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten</label>
            <textarea class="form-control @error('konten') is-invalid @enderror" id="konten" name="konten" rows="5" required>{{ old('konten') }}</textarea>
            @error('konten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="url_gambar" class="form-label">Gambar (Untuk Hero & Berita)</label>
            <input class="form-control @error('url_gambar') is-invalid @enderror" type="file" id="url_gambar" name="url_gambar">
            @error('url_gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection