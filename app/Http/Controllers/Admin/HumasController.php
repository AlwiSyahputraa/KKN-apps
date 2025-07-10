<?php
// ======================================================================
// LANGKAH 2: Buat Controller Baru untuk Humas
// Jalankan perintah ini di terminal Anda:
// php artisan make:controller Admin/HumasController
// ======================================================================

// FILE: app/Http/Controllers/Admin/HumasController.php
// LOKASI: Buka file yang baru dibuat dan isi dengan kode ini.
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HumasController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.humas.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kontak_email' => 'required|email',
            'kontak_telepon' => 'required|string',
            'kontak_perangkat' => 'required|string',
            'sosmed_instagram' => 'required|url',
            'link_website' => 'required|url', // Diubah dari youtube
            'sosmed_tiktok' => 'required|url',
        ]);

        Setting::updateOrCreate(['key' => 'kontak_email'], ['value' => $request->kontak_email]);
        Setting::updateOrCreate(['key' => 'kontak_telepon'], ['value' => $request->kontak_telepon]);
        Setting::updateOrCreate(['key' => 'kontak_perangkat'], ['value' => $request->kontak_perangkat]);
        Setting::updateOrCreate(['key' => 'sosmed_instagram'], ['value' => $request->sosmed_instagram]);
        Setting::updateOrCreate(['key' => 'link_website'], ['value' => $request->link_website]); // Diubah dari youtube
        Setting::updateOrCreate(['key' => 'sosmed_tiktok'], ['value' => $request->sosmed_tiktok]);

        return back()->with('success', 'Informasi kontak & sosial media berhasil diperbarui.');
    }
}