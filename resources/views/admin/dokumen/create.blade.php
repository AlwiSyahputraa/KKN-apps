<?php
// FILE: resources/views/admin/dokumen/create.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Unggah Dokumen Baru</h1>
    <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label for="judul" class="form-label">Judul Dokumen</label><input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>@error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi (Opsional)</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea></div>
        <div class="mb-3"><label for="file" class="form-label">Pilih File (PDF, Word, Excel, PPT)</label><input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" required>@error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        <button type="submit" class="btn btn-primary">Unggah dan Simpan</button>
    </form>
@endsection
