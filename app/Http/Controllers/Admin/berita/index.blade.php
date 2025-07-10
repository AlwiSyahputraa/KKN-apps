<?php
// FILE: berita/index.blade.php
?>
@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Berita & Hero Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Berita Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($berita->url_gambar) }}" alt="{{ $berita->judul }}" width="100" class="img-thumbnail"></td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $beritas->links() }}
@endsection
