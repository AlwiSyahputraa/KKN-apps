<?php
// ======================================================================
// KODE CONTROLLER
// Lokasi: app/Http/Controllers/Admin/
// ======================================================================

// FILE: BeritaController.php
// PASTIKAN ANDA MEMBUKA FILE INI DAN MENGISINYA DENGAN KODE DI BAWAH
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'url_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('url_gambar')) {
            $path = $request->file('url_gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'url_gambar' => $path ? Storage::url($path) : null,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'url_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $berita->url_gambar;
        if ($request->hasFile('url_gambar')) {
            if ($berita->url_gambar) {
                Storage::delete(str_replace('/storage', 'public', $berita->url_gambar));
            }
            $newPath = $request->file('url_gambar')->store('berita', 'public');
            $path = Storage::url($newPath);
        }

        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'url_gambar' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->url_gambar) {
            Storage::delete(str_replace('/storage', 'public', $berita->url_gambar));
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
