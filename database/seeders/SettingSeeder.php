<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(
            ['key' => 'deskripsi_desa'],
            ['value' => 'Ini adalah deskripsi singkat mengenai Desa Sukamaju. Anda bisa mengubah teks ini di halaman pengaturan admin.']
        );

        Setting::updateOrCreate(
            ['key' => 'lokasi_kkn_map'],
            ['value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.172039410198!2d110.3749346153059!3d-7.77158919439937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b2d4729183%3A0x2640505423631429!2sUniversitas%20Gadjah%20Mada!5e0!3m2!1sen!2sid!4v1672824000000!5m2!1sen!2sid']
        );
    }
}
