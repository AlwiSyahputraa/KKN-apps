<?php
// FILE: berita/index.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Berita</h1>
        @if(in_array(Auth::user()->role, ['admin', 'pdd']))
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Berita Baru</a>
        @endif
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    @if(in_array(Auth::user()->role, ['admin', 'pdd']))
                    <th>Aksi</th>
                    @endif
                 </tr>
            </thead>
            <tbody>
                @forelse ($beritas as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset($berita->url_gambar) }}" alt="{{ $berita->judul }}" width="100" class="img-thumbnail"></td>
                        <td>{{ $berita->judul }}</td>
                        <td>{{ $berita->created_at->format('d M Y') }}</td>
                        @if(in_array(Auth::user()->role, ['admin', 'pdd']))
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button></form>
                        </td>
                        @endif
                    </tr>
                @empty
                <tr><td colspan="{{ in_array(Auth::user()->role, ['admin', 'pdd']) ? 5 : 4 }}" class="text-center">Tidak ada data berita.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $beritas->links() }}
@endsection