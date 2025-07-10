<?php
// ======================================================================
// LANGKAH 7: Buat Tampilan (View) untuk Inventaris
// ======================================================================

// FILE: resources/views/admin/inventaris/index.blade.php
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Inventaris Barang</h1>
        <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</a>
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead><tr><th>Nama Barang</th><th>Jumlah</th><th>Kondisi</th><th>Status</th><th>Peminjam</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>{{ $barang->kondisi }}</td>
                        <td><span class="badge {{ $barang->status == 'Tersedia' ? 'bg-success' : 'bg-warning text-dark' }}">{{ $barang->status }}</span></td>
                        <td>{{ $barang->peminjam ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.inventaris.edit', $barang) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('admin.inventaris.destroy', $barang) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus barang ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>Hapus</button></form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Belum ada barang di inventaris.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $barangs->links() }}
@endsection