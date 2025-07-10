<?php
// FILE: AnggotaController.php
// PASTIKAN ANDA MEMBUKA FILE INI DAN MENGISINYA DENGAN KODE DI BAWAH
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::orderBy('name')->paginate(10);
        return view('admin.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        $path = null;
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('anggota', 'public');
        }

        Anggota::create([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'foto_profil' => $path ? Storage::url($path) : null,
            'instagram_url' => $request->instagram_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        $path = $anggota->foto_profil;
        if ($request->hasFile('foto_profil')) {
            if ($anggota->foto_profil) {
                Storage::delete(str_replace('/storage', 'public', $anggota->foto_profil));
            }
            $newPath = $request->file('foto_profil')->store('anggota', 'public');
            $path = Storage::url($newPath);
        }

        $anggota->update([
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'foto_profil' => $path,
            'instagram_url' => $request->instagram_url,
            'linkedin_url' => $request->linkedin_url,
        ]);

        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        if ($anggota->foto_profil) {
            Storage::delete(str_replace('/storage', 'public', $anggota->foto_profil));
        }
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}