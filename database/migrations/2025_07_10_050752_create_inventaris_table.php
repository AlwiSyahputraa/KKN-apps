<?php
// ======================================================================
// LANGKAH 1: Buat Model & Migrasi untuk Inventaris
// DESKRIPSI: Ini akan membuat tabel 'inventaris' untuk menyimpan data barang.
// Jalankan perintah ini di terminal Anda:
// php artisan make:model Inventari -m
// ======================================================================

// FILE: database/migrations/..._create_inventaris_table.php
// LOKASI: Buka file migrasi yang baru dibuat dan isi dengan kode ini.
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat']);
            $table->enum('status', ['Tersedia', 'Dipinjam'])->default('Tersedia');
            $table->string('peminjam')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};