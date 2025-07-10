<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validasi untuk logo
        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'required|image|mimes:png,jpg,jpeg,svg|max:1024']);
            $setting = Setting::firstOrNew(['key' => 'logo_path']);
            if ($setting->value && Storage::exists(str_replace('/storage', 'public', $setting->value))) {
                Storage::delete(str_replace('/storage', 'public', $setting->value));
            }
            $path = $request->file('logo')->store('logos', 'public');
            $setting->value = Storage::url($path);
            $setting->save();
        }

        // Validasi dan simpan informasi desa
        if ($request->has('deskripsi_desa') || $request->has('lokasi_kkn_map')) {
            $request->validate([
                'deskripsi_desa' => 'required|string',
                'lokasi_kkn_map' => 'required|url'
            ]);
            Setting::updateOrCreate(['key' => 'deskripsi_desa'], ['value' => $request->deskripsi_desa]);
            Setting::updateOrCreate(['key' => 'lokasi_kkn_map'], ['value' => $request->lokasi_kkn_map]);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

}
