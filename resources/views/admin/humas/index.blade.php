<?php
// ======================================================================
// LANGKAH 4: Buat Tampilan (View) untuk Halaman Humas
// FILE: resources/views/admin/humas/index.blade.php
// LOKASI: Buat folder 'humas' di dalam 'admin' dan buat file baru ini.
// ======================================================================
?>
@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajemen Kontak & Sosial Media</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.humas.update') }}" method="POST">
                @csrf
                <h5 class="mb-3">Informasi Kontak</h5>
                <div class="mb-3">
                    <label for="kontak_email" class="form-label">Email Resmi</label>
                    <input type="email" name="kontak_email" id="kontak_email" class="form-control" value="{{ old('kontak_email', $settings['kontak_email'] ?? 'kkn@ugm.ac.id') }}" required>
                </div>
                <div class="mb-3">
                    <label for="kontak_telepon" class="form-label">No. Telepon/WhatsApp</label>
                    <input type="text" name="kontak_telepon" id="kontak_telepon" class="form-control" value="{{ old('kontak_telepon', $settings['kontak_telepon'] ?? '+62 123 4567 890') }}" required>
                </div>
                <div class="mb-3">
                    <label for="kontak_perangkat" class="form-label">Kontak Perangkat Desa</label>
                    <input type="text" name="kontak_perangkat" id="kontak_perangkat" class="form-control" value="{{ old('kontak_perangkat', $settings['kontak_perangkat'] ?? '') }}" required>
                </div>

                <hr class="my-4">

                <h5 class="mb-3">Link Sosial Media</h5>
                <div class="mb-3">
                    <label for="sosmed_instagram" class="form-label">Instagram</label>
                    <input type="url" name="sosmed_instagram" id="sosmed_instagram" class="form-control" value="{{ old('sosmed_instagram', $settings['sosmed_instagram'] ?? 'https://instagram.com') }}" required>
                </div>
                <div class="mb-3">
                    {{-- Diubah dari YouTube menjadi Link Website --}}
                    <label for="link_website" class="form-label">Link Website Ini</label>
                    <input type="url" name="link_website" id="link_website" class="form-control" value="{{ old('link_website', $settings['link_website'] ?? url('/')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="sosmed_tiktok" class="form-label">TikTok</label>
                    <input type="url" name="sosmed_tiktok" id="sosmed_tiktok" class="form-control" value="{{ old('sosmed_tiktok', $settings['sosmed_tiktok'] ?? 'https://tiktok.com') }}" required>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection
