<?php
// ======================================================================
// LANGKAH 2: Desain Ulang Halaman Pengaturan Akun
// FILE: resources/views/profile/edit.blade.php
// LOKASI: Ganti seluruh isi file ini.
// DESKRIPSI: Menambahkan form untuk mengedit detail profil anggota.
// ======================================================================
?>
@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengaturan Profil & Akun</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <h5 class="mb-3">Informasi Profil Publik</h5>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan / Divisi</label>
                            <input id="jabatan" name="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" value="{{ old('jabatan', $anggota->jabatan ?? '') }}" required>
                            @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="foto_profil" class="form-label">Foto Profil</label>
                            <input class="form-control @error('foto_profil') is-invalid @enderror" type="file" id="foto_profil" name="foto_profil">
                            @error('foto_profil')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            @if($anggota && $anggota->foto_profil)
                                <img src="{{ asset($anggota->foto_profil) }}" class="img-thumbnail mt-2" width="100" alt="Foto Profil">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="instagram_url" class="form-label">URL Instagram (Opsional)</label>
                    <input id="instagram_url" name="instagram_url" type="url" class="form-control" value="{{ old('instagram_url', $anggota->instagram_url ?? '') }}">
                </div>
                <hr class="my-4">

                <h5 class="mb-3">Informasi Akun (Login)</h5>
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <p class="text-muted">Kosongkan password jika tidak ingin mengubahnya.</p>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                </div>

                <div class="d-flex align-items-center gap-4 mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection