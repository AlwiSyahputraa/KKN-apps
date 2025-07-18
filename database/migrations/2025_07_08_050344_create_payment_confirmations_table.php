<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_confirmations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_request_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Anggota yang membayar
            $table->string('proof_of_payment_path'); // Path bukti bayar
            $table->enum('status', ['pending', 'verified'])->default('pending'); // Status
            $table->timestamp('verified_at')->nullable(); // Waktu verifikasi
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('payment_confirmations'); }
};