
<?php
// FILE: resources/views/admin/users/edit.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Edit Akun: {{ $user->name }}</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3"><label for="name" class="form-label">Nama Lengkap</label><input type="text" class="form-control" name="name" value="{{ $user->name }}" required></div>
        <div class="mb-3"><label for="email" class="form-label">Alamat Email</label><input type="email" class="form-control" name="email" value="{{ $user->email }}" required></div>
        <div class="mb-3">
            <label for="role" class="form-label">Jabatan/Peran</label>
            <select class="form-select" name="role" required>
                <option value="anggota" {{ $user->role == 'anggota' ? 'selected' : '' }}>Anggota</option>
                <option value="ketua" {{ $user->role == 'ketua' ? 'selected' : '' }}>Ketua KKN</option>
                <option value="wakil_ketua" {{ $user->role == 'wakil_ketua' ? 'selected' : '' }}>Wakil Ketua KKN</option>
                <option value="pdd" {{ $user->role == 'pdd' ? 'selected' : '' }}>Divisi PDD</option>
                <option value="acara" {{ $user->role == 'acara' ? 'selected' : '' }}>Divisi Acara</option>
                <option value="sekretaris" {{ $user->role == 'sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                <option value="bendahara" {{ $user->role == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
                <option value="humas" {{ $user->role == 'humas' ? 'selected' : '' }}>Divisi Humas</option>
                <option value="peralatan" {{ $user->role == 'peralatan' ? 'selected' : '' }}>Divisi Peralatan</option>
                <option value="konsumsi" {{ $user->role == 'konsumsi' ? 'selected' : '' }}>Divisi Konsumsi</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <hr>
        <p class="text-muted">Kosongkan password jika tidak ingin mengubahnya.</p>
        <div class="mb-3"><label for="password" class="form-label">Password Baru</label><input type="password" class="form-control" name="password"></div>
        <div class="mb-3"><label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label><input type="password" class="form-control" name="password_confirmation"></div>
        <button type="submit" class="btn btn-primary">Update Akun</button>
    </form>
@endsection