<?php
// ======================================================================
// FILE: resources/views/partials/_berita.blade.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Mengubah layout gambar agar lebih rapi dan konsisten.
// ======================================================================
?>
<section id="berita" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title d-inline-block">Berita Terkini</h2>
            <p class="text-muted">Ikuti Perkembangan Kegiatan Kami</p>
        </div>
        <div id="beritaCarousel" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                @forelse($beritas as $key => $berita)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="card mb-3 border-0 bg-transparent">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-6">
                                    {{-- Diperbaiki: Menggunakan 'ratio' untuk aspek rasio yang konsisten --}}
                                    <div class="ratio ratio-4x3">
                                        <img src="{{ asset($berita->url_gambar) ?: 'https://placehold.co/800x600/34495e/ffffff?text=Berita' }}" 
                                             class="img-fluid rounded-3" 
                                             alt="{{ $berita->judul }}" 
                                             style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body ps-md-4">
                                        <small class="text-muted">{{ $berita->created_at->format('d M Y') }}</small>
                                        <h3 class="card-title fw-bold mt-1">{{ $berita->judul }}</h3>
                                        <p class="card-text">{{ Str::limit($berita->konten, 200) }}</p>
                                        <a href="{{ route('berita.show', $berita) }}" class="btn btn-outline-primary">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-12">
                        <p class="text-muted">Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
