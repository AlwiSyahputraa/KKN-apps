<?php
// ======================================================================
// LANGKAH 1: Perbarui Migrasi Anggota (SUDAH DIPERBAIKI)
// FILE: ..._create_anggotas_table.php
// LOKASI: database/migrations/
// DESKRIPSI: Ganti seluruh isi file migrasi anggota Anda dengan kode ini.
// ======================================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('jabatan'); // Anda bisa mengganti ini menjadi 'divisi' jika lebih sesuai
            $table->string('foto_profil')->nullable();
            $table->string('instagram_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};