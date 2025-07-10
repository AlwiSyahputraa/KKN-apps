<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Menerapkan middleware hak akses.
     */

    public function index()
    {
        $transaksis = LaporanKeuangan::orderBy('tanggal', 'desc')->paginate(15);
        $pemasukan = LaporanKeuangan::where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = LaporanKeuangan::where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;
        return view('admin.keuangan.index', compact('transaksis', 'pemasukan', 'pengeluaran', 'saldo'));
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'pemasukan');
        return view('admin.keuangan.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
        ]);
        LaporanKeuangan::create($request->all());
        return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(LaporanKeuangan $keuangan)
    {
        return view('admin.keuangan.edit', compact('keuangan'));
    }

    public function update(Request $request, LaporanKeuangan $keuangan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'jumlah' => 'required|numeric|min:0',
        ]);
        $keuangan->update($request->all());
        return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(LaporanKeuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('admin.keuangan.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}