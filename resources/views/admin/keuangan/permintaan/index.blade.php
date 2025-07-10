<?php
// ======================================================================
// LANGKAH 4: Perbarui Tampilan Daftar Permintaan Pembayaran
// FILE: resources/views/admin/keuangan/permintaan/index.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Permintaan Pembayaran</h1>
        <a href="{{ route('admin.permintaan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Buat Permintaan Baru</a>
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead><tr><th>Judul</th><th>Jumlah</th><th>Terkumpul</th><th>Aksi</th></tr></thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td>{{ $request->judul }}</td>
                        <td>Rp {{ number_format($request->jumlah, 0, ',', '.') }}</td>
                        <td>{{ $request->confirmations_count }} orang</td>
                        <td>
                            <a href="{{ route('admin.permintaan.show', $request) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Detail & QR</a>
                            {{-- TOMBOL HAPUS BARU --}}
                            <form action="{{ route('admin.permintaan.destroy', $request) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permintaan ini? Semua data konfirmasi terkait juga akan dihapus.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">Belum ada permintaan pembayaran.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection