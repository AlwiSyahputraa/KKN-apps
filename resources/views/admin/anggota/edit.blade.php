<?php
// FILE: anggota/edit.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Anggota</h1>
    <form action="{{ route('admin.anggota.update', $anggota) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" class="form-control" id="name" name="name" value="{{ $anggota->name }}" required></div>
        <div class="mb-3"><label for="jabatan" class="form-label">Jabatan/Divisi</label><input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $anggota->jabatan }}" required></div>
        <div class="mb-3"><label for="instagram_url" class="form-label">URL Instagram (Opsional)</label><input type="url" class="form-control" id="instagram_url" name="instagram_url" value="{{ $anggota->instagram_url }}"></div>
        <div class="mb-3"><label for="foto_profil" class="form-label">Ganti Foto Profil</label><input class="form-control" type="file" id="foto_profil" name="foto_profil">@if($anggota->foto_profil)<img src="{{ asset($anggota->foto_profil) }}" width="100" class="mt-2 img-thumbnail">@endif</div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection