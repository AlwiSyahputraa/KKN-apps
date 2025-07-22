@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    {{-- Bagian Deskripsi & Peta --}}
    <div class="row g-5 mb-5">
        <div class="col-lg-7">
            <h2 class="fw-bold section-title d-inline-block">Profil Desa Ndokum Siroga</h2>
            <p class="text-muted" style="text-align: justify;">
                {{ $appSettings['deskripsi_desa'] ?? 'Deskripsi desa belum diatur.' }}
            </p>
        </div>
        <div class="col-lg-5">
            <h2 class="fw-bold section-title d-inline-block">Lokasi KKN</h2>
            <div class="ratio ratio-16x9">
                <iframe 
                    src="{{ $appSettings['lokasi_kkn_map'] ?? '' }}" 
                    style="border:0; border-radius: 8px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>

    <hr class="my-5">

    {{-- Bagian Anggota --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold section-title d-inline-block">Tim KKN Desa Ndokum Siroga</h2>
        <p class="text-muted">Anggota Kelompok di Balik Pengabdian</p>
    </div>

    <div class="row">
        @forelse($anggotas as $anggota)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow-sm h-100 text-center border-0">
                    <div class="card-body p-4">
                        <img src="{{ asset($anggota->foto_profil) ?: 'https://placehold.co/400x400/0d6efd/ffffff?text=' . substr($anggota->name, 0, 1) }}" alt="{{ $anggota->name }}" class="rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;" />
                        <h5 class="card-title fw-bold mb-0">{{ $anggota->name }}</h5>
                        <p class="text-primary">{{ $anggota->jabatan }}</p>
                        
                        <div class="pt-2">
                            @if($anggota->instagram_url)
                                <a href="{{ $anggota->instagram_url }}" target="_blank" class="btn btn-outline-secondary btn-sm mx-1"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($anggota->linkedin_url)
                                <a href="{{ $anggota->linkedin_url }}" target="_blank" class="btn btn-outline-secondary btn-sm mx-1"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center">Data anggota belum tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection