<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payment_requests', function (Blueprint $table) {
            // Hapus kolom gambar QR jika ada
            if (Schema::hasColumn('payment_requests', 'qr_code_image_path')) {
                $table->dropColumn('qr_code_image_path');
            }
            // Tambahkan kolom baru untuk detail bank
            $table->string('bank_name')->nullable()->after('jumlah');
            $table->string('account_number')->nullable()->after('bank_name');
            $table->string('account_holder_name')->nullable()->after('account_number');
        });
    }

    public function down(): void
    {
        Schema::table('payment_requests', function (Blueprint $table) {
            $table->string('qr_code_image_path')->nullable();
            $table->dropColumn(['bank_name', 'account_number', 'account_holder_name']);
        });
    }
};