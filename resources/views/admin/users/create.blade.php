<?php
// ======================================================================
// LANGKAH 3: Pastikan Form Tambah Akun Admin Sudah Benar
// FILE: resources/views/admin/users/create.blade.php
// LOKASI: Pastikan isi file ini sudah benar.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Akun Baru</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="email" class="form-label">Alamat Email</label><input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3">
                    <label for="role" class="form-label">Jabatan/Peran</label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <option value="anggota">Anggota</option>
                        <option value="ketua">Ketua KKN</option>
                        <option value="wakil_ketua">Wakil Ketua KKN</option>
                        <option value="pdd">Divisi PDD</option>
                        <option value="acara">Divisi Acara</option>
                        <option value="sekretaris">Sekretaris</option>
                        <option value="bendahara">Bendahara</option>
                        <option value="humas">Divisi Humas</option>
                        <option value="peralatan">Divisi Peralatan</option>
                        <option value="konsumsi">Divisi Konsumsi</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3"><label for="password" class="form-label">Password</label><input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="password_confirmation" class="form-label">Konfirmasi Password</label><input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required></div>
                <button type="submit" class="btn btn-primary">Simpan Akun</button>
            </form>
        </div>
    </div>
@endsection