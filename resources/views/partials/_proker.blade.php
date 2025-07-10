<?php
// ======================================================================
// LANGKAH 7: Perbarui Partial Proker
// FILE: resources/views/partials/_proker.blade.php
// LOKASI: Ganti isi file ini.
// ======================================================================
?>
<section id="proker" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title d-inline-block">Program Kerja</h2>
            <p class="text-muted">Inisiatif Kami untuk Kemajuan Desa</p>
        </div>
        <div class="row">
            @forelse($prokers as $proker)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $proker->judul }}</h5>
                            <p class="card-text flex-grow-1">
                                {{ Str::limit($proker->deskripsi, 150) }}
                                {{-- Diperbaiki: Tampilkan tombol jika deskripsi panjang --}}
                                @if(strlen($proker->deskripsi) > 150)
                                    <a href="{{ route('proker.show', $proker) }}" class="text-primary text-decoration-none">...lihat selengkapnya</a>
                                @endif
                            </p>
                            <div class="mt-auto">
                                <span class="badge rounded-pill 
                                    @if($proker->status == 'terlaksana') bg-success 
                                    @elseif($proker->status == 'berlangsung') bg-warning text-dark
                                    @else bg-secondary @endif">
                                    {{ ucfirst($proker->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center col-12">Program kerja belum tersedia.</p>
            @endforelse
        </div>

        @if($total > 9)
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary btn-lg">Lihat Semua Program Kerja</a>
            </div>
        @endif
    </div>
</section>