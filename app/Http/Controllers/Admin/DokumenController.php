<?php
// ======================================================================
// LANGKAH 2: Pastikan DokumenController Sudah Benar
// FILE: app/Http/Controllers/Admin/DokumenController.php
// LOKASI: Tidak ada perubahan di sini, tetapi pastikan isinya sudah seperti ini.
// ======================================================================
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArsipDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = ArsipDokumen::latest()->paginate(10);
        return view('admin.dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        return view('admin.dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120',
        ]);
        $path = $request->file('file')->store('dokumen', 'public');
        ArsipDokumen::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => Storage::url($path),
        ]);
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function edit(ArsipDokumen $dokumen)
    {
        return view('admin.dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, ArsipDokumen $dokumen)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120',
        ]);

        $path = $dokumen->file_path;
        if ($request->hasFile('file')) {
            if ($dokumen->file_path) {
                Storage::delete(str_replace('/storage', 'public', $dokumen->file_path));
            }
            $newPath = $request->file('file')->store('dokumen', 'public');
            $path = Storage::url($newPath);
        }

        $dokumen->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(ArsipDokumen $dokumen)
    {
        if ($dokumen->file_path) {
            Storage::delete(str_replace('/storage', 'public', $dokumen->file_path));
        }
        $dokumen->delete();
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}