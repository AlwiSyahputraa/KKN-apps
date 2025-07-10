<?php
// ======================================================================
// LANGKAH 1: Perbarui DashboardController
// FILE: app/Http/Controllers/Admin/DashboardController.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// DESKRIPSI: Menambahkan logika untuk mengambil daftar tagihan yang belum dibayar.
// ======================================================================
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentConfirmation;
use App\Models\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil ID semua permintaan pembayaran yang sudah dikonfirmasi oleh pengguna ini
        $confirmedRequestIds = PaymentConfirmation::where('user_id', $user->id)
                                                  ->pluck('payment_request_id');

        // Ambil semua permintaan pembayaran yang BELUM dikonfirmasi oleh pengguna ini
        $tagihan = PaymentRequest::whereNotIn('id', $confirmedRequestIds)
                                 ->latest()
                                 ->get();

        return view('admin.dashboard', compact('tagihan'));
    }
}

