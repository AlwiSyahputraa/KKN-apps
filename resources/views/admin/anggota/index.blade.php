<?php
// FILE: anggota/index.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Anggota</h1>
        <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anggota</a>
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead><tr><th>#</th><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($anggotas as $anggota)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($anggota->foto_profil) }}" alt="{{ $anggota->name }}" width="50" class="img-thumbnail rounded-circle"></td>
                        <td>{{ $anggota->name }}</td>
                        <td>{{ $anggota->jabatan }}</td>
                        <td>
                            <a href="{{ route('admin.anggota.edit', $anggota) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.anggota.destroy', $anggota) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button></form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $anggotas->links() }}
@endsection