<?php
// ======================================================================
// LANGKAH 4: Perbarui Tampilan Edit Dokumen
// FILE: resources/views/admin/dokumen/edit.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Dokumen</h1>
    <form action="{{ route('admin.dokumen.update', $dokumen) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="judul" class="form-label">Judul Dokumen</label><input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $dokumen->judul) }}" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi (Opsional)</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $dokumen->deskripsi) }}</textarea></div>
        <div class="mb-3"><label for="file" class="form-label">Ganti File (Opsional)</label><input class="form-control" type="file" id="file" name="file">
            @if($dokumen->file_path)<p class="mt-2 small text-muted">File saat ini: <a href="{{ asset($dokumen->file_path) }}" target="_blank">Lihat File</a></p>@endif
        </div>
        <button type="submit" class="btn btn-primary">Update Dokumen</button>
    </form>
@endsection