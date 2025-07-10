<?php
// FILE: galeri/edit.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Foto Galeri</h1>
    <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi (Opsional)</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $galeri->deskripsi) }}</textarea></div>
        <div class="mb-3"><label for="url_gambar" class="form-label">Ganti Gambar</label><input class="form-control" type="file" id="url_gambar" name="url_gambar">
            @if($galeri->url_gambar)<div class="mt-2"><small>Gambar saat ini:</small><br><img src="{{ asset($galeri->url_gambar) }}" alt="{{ $galeri->judul }}" width="150" class="img-thumbnail"></div>@endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection