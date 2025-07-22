<?php
// ======================================================================
// LANGKAH 5: Perbarui Partial Hero
// FILE: resources/views/partials/_hero.blade.php
// LOKASI: Ganti isi file ini.
// ======================================================================
?>
<style>
    .carousel-caption h1,
.carousel-caption p {
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
}
.hero-carousel-item {
    height: 100vh;
    min-height: 500px;
}
.hero-carousel-item .carousel-caption {
    transition: all 0.5s ease-in-out;
}

</style>

<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($items as $key => $item)
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @forelse($items as $key => $item)
            <div class="carousel-item hero-carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset($item->url_gambar) }}" class="hero-background" alt="{{ $item->judul }}">
                <div class="carousel-caption">
                    <h1 class="display-5 fw-bold text-white">{{ $item->judul }}</h1>
                    <p class="lead col-lg-8 mx-auto">{{ Str::limit($item->konten, 120) }}</p>
                    {{-- Diperbaiki: Link mengarah ke halaman detail berita --}}
                    <a href="{{ route('berita.show', $item) }}" class="btn btn-primary btn-lg mt-3 px-4">Baca Selengkapnya</a>
                </div>
            </div>
        @empty
            <div class="carousel-item hero-carousel-item active">
                <img src="https://placehold.co/1920x800/212529/495057?text=Foto+Kegiatan+KKN" class="hero-background" alt="Selamat Datang">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold text-white">KKN-UINSU DESA NDOKUM SIROGA 2025</h1>
                    <p class="lead">Website resmi Kelompok KKN Desa Sukamaju yang memuat informasi kegiatan, dokumentasi, dan program kerja.</p>
                </div>
            </div>
        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
</div>