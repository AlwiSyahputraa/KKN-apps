<?php
// FILE: ProkerController.php
// PASTIKAN ANDA MEMBUKA FILE INI DAN MENGISINYA DENGAN KODE DI BAWAH
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProkerController extends Controller
{
    public function index()
    {
        $prokers = Proker::latest()->paginate(10);
        return view('admin.proker.index', compact('prokers'));
    }

    public function create()
    {
        return view('admin.proker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:terlaksana,berlangsung,direncanakan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('proker', 'public');
        }

        Proker::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $path ? Storage::url($path) : null,
        ]);

        return redirect()->route('admin.proker.index')->with('success', 'Program Kerja berhasil ditambahkan.');
    }

    public function edit(Proker $proker)
    {
        return view('admin.proker.edit', compact('proker'));
    }

    public function update(Request $request, Proker $proker)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:terlaksana,berlangsung,direncanakan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $proker->gambar;
        if ($request->hasFile('gambar')) {
            if ($proker->gambar) {
                Storage::delete(str_replace('/storage', 'public', $proker->gambar));
            }
            $newPath = $request->file('gambar')->store('proker', 'public');
            $path = Storage::url($newPath);
        }

        $proker->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.proker.index')->with('success', 'Program Kerja berhasil diperbarui.');
    }

    public function destroy(Proker $proker)
    {
        if ($proker->gambar) {
            Storage::delete(str_replace('/storage', 'public', $proker->gambar));
        }
        $proker->delete();
        return redirect()->route('admin.proker.index')->with('success', 'Program Kerja berhasil dihapus.');
    }
}
