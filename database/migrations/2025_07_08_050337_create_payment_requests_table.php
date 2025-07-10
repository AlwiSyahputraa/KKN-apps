<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->decimal('jumlah', 15, 2);
            $table->string('kode_unik')->unique();
            $table->string('qr_code_image_path')->nullable();
            $table->foreignId('user_id')->constrained(); // Bendahara yang membuat
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('payment_requests'); }
};
