<?php
// ======================================================================
// LANGKAH 4: Perbarui Form Tambah Transaksi
// FILE: resources/views/admin/keuangan/create.blade.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
?>
@extends('admin.layouts.app')
@section('content')
    <h1 class="h2 pt-3 pb-2 mb-3 border-bottom">Tambah Transaksi Keuangan</h1>
    <form action="{{ route('admin.keuangan.store') }}" method="POST">
        @csrf
        <div class="mb-3"><label for="tanggal" class="form-label">Tanggal</label><input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>@error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        <div class="mb-3"><label for="keterangan" class="form-label">Keterangan</label><input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" required>@error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis Transaksi</label>
            {{-- Diperbaiki: Dropdown akan otomatis terpilih sesuai tombol yang diklik --}}
            <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" required>
                <option value="pemasukan" {{ $type == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $type == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
            @error('jenis')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3"><label for="jumlah" class="form-label">Jumlah (Rp)</label><input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>@error('jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
@endsection