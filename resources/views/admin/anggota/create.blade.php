<?php
// FILE: anggota/create.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Anggota</h1>
    <form action="{{ route('admin.anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" class="form-control" id="name" name="name" required></div>
        <div class="mb-3"><label for="jabatan" class="form-label">Jabatan/Divisi</label><input type="text" class="form-control" id="jabatan" name="jabatan" required></div>
        <div class="mb-3"><label for="instagram_url" class="form-label">URL Instagram (Opsional)</label><input type="url" class="form-control" id="instagram_url" name="instagram_url"></div>
        <div class="mb-3"><label for="foto_profil" class="form-label">Foto Profil</label><input class="form-control" type="file" id="foto_profil" name="foto_profil"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection