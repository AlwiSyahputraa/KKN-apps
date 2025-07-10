<?php
// ======================================================================
// LANGKAH 1: Perbarui Migrasi Proker
// FILE: database/migrations/..._create_prokers_table.php
// LOKASI: Ganti isi file migrasi proker Anda dengan kode ini.
// DESKRIPSI: Menghapus kolom 'gambar'.
// ======================================================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prokers', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('status', ['terlaksana', 'berlangsung', 'direncanakan']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prokers');
    }
};