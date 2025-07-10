<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\User; // Pastikan User model di-import
use App\Models\PaymentConfirmation; // Pastikan ini di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PaymentRequestController extends Controller
{

    public function index() {
        $requests = PaymentRequest::withCount('confirmations')->latest()->paginate(10);
        return view('admin.keuangan.permintaan.index', compact('requests'));
    }

    public function create() { return view('admin.keuangan.permintaan.create'); }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
        ]);
        
        $paymentRequest = PaymentRequest::create([
            'judul' => $request->judul,
            'jumlah' => $request->jumlah,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_holder_name' => $request->account_holder_name,
            'kode_unik' => Str::random(10),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.permintaan.show', $paymentRequest)->with('success', 'Permintaan pembayaran berhasil dibuat.');
    }

    public function show(PaymentRequest $permintaan) {
        $permintaan->load('confirmations.user');
        $confirmedUserIds = $permintaan->confirmations->pluck('user_id');
        // Ambil semua pengguna yang bukan admin dan belum konfirmasi
        $unconfirmedUsers = User::whereNotIn('id', $confirmedUserIds)->where('role', '!=', 'admin')->get();
        // Kirim semua data yang dibutuhkan ke view
        return view('admin.keuangan.permintaan.show', compact('permintaan', 'unconfirmedUsers'));
        // Kirim semua data yang dibutuhkan ke view
        return view('admin.keuangan.permintaan.show', compact('permintaan', 'unconfirmedUsers'));
    }

    public function verify(PaymentConfirmation $confirmation)
    {
    // Ubah status konfirmasi
    $confirmation->update([
        'status' => 'verified',
        'verified_at' => now(),
    ]);

    // Ambil data yang dibutuhkan
    $paymentRequest = $confirmation->paymentRequest;
    $user = $confirmation->user;

    // Catat sebagai pemasukan di laporan keuangan
    \App\Models\LaporanKeuangan::create([
        'tanggal' => now(),
        'keterangan' => 'Pembayaran Terverifikasi: ' . $paymentRequest->judul . ' oleh ' . $user->name,
        'jenis' => 'pemasukan',
        'jumlah' => $paymentRequest->jumlah,
    ]);

    return back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function destroy(PaymentRequest $permintaan)
    {
        if ($permintaan->qr_code_image_path) {
            Storage::delete(str_replace('/storage', 'public', $permintaan->qr_code_image_path));
        }
        $permintaan->delete();
        return redirect()->route('admin.permintaan.index')->with('success', 'Permintaan pembayaran berhasil dihapus.');
    }
}
