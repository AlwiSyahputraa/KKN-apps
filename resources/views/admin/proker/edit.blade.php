<?php
// FILE: resources/views/admin/proker/edit.blade.php
// LOKASI: Ganti isi file ini.
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Program Kerja</h1>
    <form action="{{ route('admin.proker.update', $proker) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="judul" class="form-label">Judul</label><input type="text" class="form-control" id="judul" name="judul" value="{{ $proker->judul }}" required></div>
        <div class="mb-3"><label for="deskripsi" class="form-label">Deskripsi</label><textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $proker->deskripsi }}</textarea></div>
        <div class="mb-3"><label for="status" class="form-label">Status</label><select class="form-select" name="status" required><option value="direncanakan" {{ $proker->status == 'direncanakan' ? 'selected' : '' }}>Direncanakan</option><option value="berlangsung" {{ $proker->status == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option><option value="terlaksana" {{ $proker->status == 'terlaksana' ? 'selected' : '' }}>Terlaksana</option></select></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
