<?php
// ======================================================================
// LANGKAH 4: Perbarui Partial Galeri
// FILE: resources/views/partials/_galeri.blade.php
// LOKASI: Ganti isi file ini.
// DESKRIPSI: Mengubah tampilan menjadi card dengan tombol "Lihat Detail".
// ======================================================================
?>
<section id="galeri" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title d-inline-block">Galeri Kegiatan</h2>
            <p class="text-muted">Momen-Momen Tak Terlupakan Selama KKN</p>
        </div>
        <div class="row g-4">
             @forelse($galeris as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card shadow-sm h-100 border-0">
                        <img src="{{ asset($item->url_gambar) }}" class="rounded-top" alt="{{ $item->judul }}" style="height: 250px; width: 100%; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-bold">{{ $item->judul }}</h6>
                            <p class="card-text small text-muted flex-grow-1">{{ Str::limit($item->deskripsi, 70) }}</p>
                            <a href="{{ route('galeri.show', $item) }}" class="btn btn-sm btn-outline-primary mt-auto align-self-start">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center col-12">Belum ada foto di galeri.</p>
            @endforelse
        </div>

        @if($total > 9)
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary btn-lg">Lihat Semua Galeri</a>
            </div>
        @endif
    </div>
</section>