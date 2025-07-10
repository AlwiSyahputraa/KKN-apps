<?php
// ======================================================================
// FILE: app/Http/Controllers/PaymentController.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// ======================================================================

namespace App\Http\Controllers;
use App\Models\PaymentRequest;
use App\Models\PaymentConfirmation;
use App\Models\LaporanKeuangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PaymentController extends Controller
{
    public function show($kode_unik) {
        $request = PaymentRequest::where('kode_unik', $kode_unik)->firstOrFail();
        $confirmation = PaymentConfirmation::where('payment_request_id', $request->id)->where('user_id', auth()->id())->first();
        return view('pembayaran.konfirmasi', compact('request', 'confirmation'));
    }
    public function store(Request $request, $kode_unik) {
        $paymentRequest = PaymentRequest::where('kode_unik', $kode_unik)->firstOrFail();
        $user = auth()->user();
        if (PaymentConfirmation::where('payment_request_id', $paymentRequest->id)->where('user_id', $user->id)->exists()) {
            return redirect()->route('pembayaran.show', $kode_unik)->with('error', 'Anda sudah pernah mengirim bukti untuk pembayaran ini.');
        }
        $request->validate(['bukti_pembayaran' => 'required|image|max:2048']);
        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        PaymentConfirmation::create([
            'payment_request_id' => $paymentRequest->id,
            'user_id' => $user->id,
            'proof_of_payment_path' => Storage::url($path),
        ]);
        return redirect()->route('pembayaran.show', $kode_unik)->with('success', 'Terima kasih! Bukti pembayaran Anda telah terkirim dan sedang menunggu verifikasi.');
    }
}