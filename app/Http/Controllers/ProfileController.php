<?php
// ======================================================================
// LANGKAH 3: Perbarui ProfileController (Paling Penting)
// FILE: app/Http/Controllers/ProfileController.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Menambahkan logika untuk membuat atau memperbarui profil publik.
// ======================================================================
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\Anggota;

class ProfileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function edit()
    {
        $user = Auth::user();
        // Ambil data anggota yang terhubung dengan user ini
        $anggota = $user->anggota;

        return view('profile.edit', compact('user', 'anggota'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'jabatan' => ['required', 'string', 'max:255'],
            'foto_profil' => ['nullable', 'image', 'max:2048'],
            'instagram_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
        ]);

        // Update data di tabel 'users'
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Siapkan data untuk tabel 'anggotas'
        $anggotaData = [
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'instagram_url' => $request->instagram_url,
            'linkedin_url' => $request->linkedin_url,
        ];

        // Proses upload foto jika ada
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($user->anggota && $user->anggota->foto_profil) {
                Storage::delete(str_replace('/storage', 'public', $user->anggota->foto_profil));
            }
            $path = $request->file('foto_profil')->store('anggota', 'public');
            $anggotaData['foto_profil'] = Storage::url($path);
        }

        // Buat atau perbarui data di tabel 'anggotas'
        Anggota::updateOrCreate(
            ['user_id' => $user->id], // Cari berdasarkan user_id
            $anggotaData // Data yang akan diupdate atau dibuat
        );

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}