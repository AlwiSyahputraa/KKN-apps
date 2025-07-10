<?php
// ======================================================================
// FILE: resources/views/admin/dokumen/index.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Menambahkan kondisi untuk menampilkan/menyembunyikan tombol
//            "Unggah Dokumen" sesuai dengan peran pengguna.
// ======================================================================
?>
@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Arsip Dokumen</h1>
        @if(in_array(Auth::user()->role, ['admin', 'sekretaris']))
            <a href="{{ route('admin.dokumen.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Unggah Dokumen</a>
        @endif
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
                    <th>#</th>
                    <th>Judul Dokumen</th>
                    <th>Tanggal Unggah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokumens as $dokumen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dokumen->judul }}</td>
                        <td>{{ $dokumen->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ asset($dokumen->file_path) }}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-download"></i> Unduh</a>
                            
                            {{-- Tombol Edit & Hapus hanya muncul untuk peran yang diizinkan --}}
                            @if(in_array(Auth::user()->role, ['admin', 'sekretaris']))
                                <a href="{{ route('admin.dokumen.edit', $dokumen) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                <form action="{{ route('admin.dokumen.destroy', $dokumen) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus dokumen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada dokumen yang diarsipkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $dokumens->links() }}
@endsection