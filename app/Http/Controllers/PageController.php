<?php
// ======================================================================
// LANGKAH 2: Perbarui PageController
// FILE: app/Http/Controllers/PageController.php
// LOKASI: Ganti isi file ini dengan kode di bawah.
// DESKRIPSI: Menambahkan logika untuk mengambil semua data anggota untuk halaman profil.
// ======================================================================

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Proker;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $beritas = Berita::latest()->take(5)->get();
        $prokers = Proker::latest()->take(9)->get();
        $totalProker = Proker::count();
        $galeris = Galeri::latest()->take(9)->get();
        $totalGaleri = Galeri::count();
        return view('welcome', compact('beritas', 'prokers', 'totalProker', 'galeris', 'totalGaleri'));
    }

    public function profil()
    {
        $anggotas = Anggota::orderBy('name', 'asc')->get();
        // Variabel $settings tidak perlu dikirim lagi dari sini
        return view('profil', compact('anggotas')); 
    }

    public function showBerita(Berita $berita)
    {
        return view('berita-show', compact('berita'));
    }

    public function showProker(Proker $proker)
    {
        return view('proker-show', compact('proker'));
    }

    public function showGaleri(Galeri $galeri)
    {
        return view('galeri-show', compact('galeri'));
    }
}
