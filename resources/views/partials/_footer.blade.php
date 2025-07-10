<footer class="footer text-white pt-5 pb-4">
    <div class="container text-start">
        <div class="row gy-5">

            <div class="col-lg-4 col-md-10">
                <h5 class="text-uppercase mb-4 fw-bold footer-heading">KKN Desa Sukamaju</h5>
                <p class="text-white-50">
                    Website resmi Kelompok KKN Desa Sukamaju yang memuat informasi kegiatan, dokumentasi, dan program kerja.
                </p>
            </div>

            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase mb-4 fw-bold footer-heading">Navigasi</h5>
                <p class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Beranda</a></p>
                <p class="mb-2"><a href="{{ route('profil') }}" class="text-white-50 text-decoration-none">Profil</a></p>
                <p class="mb-2"><a href="/#proker" class="text-white-50 text-decoration-none">Program Kerja</a></p>
                <p class="mb-2"><a href="/#galeri" class="text-white-50 text-decoration-none">Galeri</a></p>
            </div>

            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase mb-4 fw-bold footer-heading">Kontak</h5>
                <p class="mb-2 d-flex"><i class="fas fa-home me-3 pt-1"></i><span class="text-white-50">Desa Ndokum Siroga</span></p>
                <p class="mb-2 d-flex"><i class="fas fa-envelope me-3 pt-1"></i><span class="text-white-50">{{ $appSettings['kontak_email'] ?? '' }}</span></p>
                <p class="mb-3 d-flex"><i class="fas fa-phone me-3 pt-1"></i><span class="text-white-50">{{ $appSettings['kontak_telepon'] ?? '' }}</span></p>
                <p class="mb-3 d-flex"><i class="fas fa-user-friends me-3 pt-1"></i><span class="text-white-50">{{ $appSettings['kontak_perangkat'] ?? '' }}</span>
                </p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase mb-4 fw-bold footer-heading">Ikuti Kami</h5>
                <div>
                    <a href="{{ $appSettings['sosmed_instagram'] ?? '#' }}" target="_blank" class="d-inline-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; border-radius: 50%; background-color: rgba(255,255,255,0.1); color: white;"><i class="fab fa-instagram"></i></a>
                    {{-- Diubah dari YouTube menjadi Website --}}
                    <a href="{{ $appSettings['link_website'] ?? '#' }}" target="_blank" class="d-inline-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px; border-radius: 50%; background-color: rgba(255,255,255,0.1); color: white;"><i class="fas fa-globe"></i></a>
                    <a href="{{ $appSettings['sosmed_tiktok'] ?? '#' }}" target="_blank" class="d-inline-flex align-items-center justify-content-center" style="width: 35px; height: 35px; border-radius: 50%; background-color: rgba(255,255,255,0.1); color: white;"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>

            

        </div>
    </div>
    <div class="text-center text-white-50 p-3 mt-5" style="background-color: rgba(0, 0, 0, 0.2);">
        © {{ date('Y') }} KKN UINSU Desa Ndokum Siroga
    </div>
</footer>