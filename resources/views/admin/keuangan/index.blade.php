<?php
// ======================================================================
// LANGKAH 2: Perbarui Tampilan Daftar Keuangan
// FILE: resources/views/admin/keuangan/index.blade.php
// LOKASI: Ganti seluruh isi file ini.
// DESKRIPSI: Menyembunyikan tombol aksi untuk anggota biasa.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Laporan Keuangan</h1>
        {{-- Tombol ini hanya muncul untuk Bendahara & Admin --}}
        @if (Auth::user()->role == 'bendahara' || Auth::user()->role == 'admin')
            <a href="{{ route('admin.keuangan.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Transaksi</a>
        @endif
    </div>
    <div class="row mb-4">
        <div class="col-md-4"><div class="card text-white bg-success"><div class="card-body"><h5 class="card-title">Total Pemasukan</h5><p class="card-text fs-4">Rp {{ number_format($pemasukan, 0, ',', '.') }}</p></div></div></div>
        <div class="col-md-4"><div class="card text-white bg-danger"><div class="card-body"><h5 class="card-title">Total Pengeluaran</h5><p class="card-text fs-4">Rp {{ number_format($pengeluaran, 0, ',', '.') }}</p></div></div></div>
        <div class="col-md-4"><div class="card text-white bg-primary"><div class="card-body"><h5 class="card-title">Saldo Akhir</h5><p class="card-text fs-4">Rp {{ number_format($saldo, 0, ',', '.') }}</p></div></div></div>
    </div>
    @if(session('success'))<div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>@endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    @can('manage-keuangan')<th>Aksi</th>@endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $transaksi)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y') }}</td>
                        <td>{{ $transaksi->keterangan }}</td>
                        <td>@if($transaksi->jenis == 'pemasukan')<span class="badge bg-success">Pemasukan</span>@else<span class="badge bg-danger">Pengeluaran</span>@endif</td>
                        <td>Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</td>
                        {{-- Tombol ini hanya muncul untuk Bendahara & Admin --}}
                        @can('manage-keuangan')
                        <td>
                            <a href="{{ route('admin.keuangan.edit', $transaksi) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('admin.keuangan.destroy', $transaksi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?');">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></form>
                        </td>
                        @endcan
                    </tr>
                @empty
                    <tr class="text-center"><td colspan="{{ Auth::user()->can('manage-keuangan') ? 5 : 4 }}">Belum ada transaksi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $transaksis->links() }}
@endsection