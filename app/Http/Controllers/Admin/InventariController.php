<?php
// ======================================================================
// LANGKAH 3: Buat Controller untuk Inventaris
// Jalankan perintah ini di terminal Anda:
// php artisan make:controller Admin/InventariController --resource --model=Inventari
// ======================================================================

// FILE: app/Http/Controllers/Admin/InventariController.php
// LOKASI: Buka file yang baru dibuat dan isi dengan kode ini.
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Inventari;
use Illuminate\Http\Request;
class InventariController extends Controller
{
    public function index()
    {
        $barangs = Inventari::latest()->paginate(15);
        return view('admin.inventaris.index', compact('barangs'));
    }
    public function create() { return view('admin.inventaris.create'); }
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);
        Inventari::create($request->all());
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil ditambahkan ke inventaris.');
    }
    public function edit(Inventari $inventari)
    {
        return view('admin.inventaris.edit', compact('inventari'));
    }
    public function update(Request $request, Inventari $inventari)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam',
            'peminjam' => 'nullable|string|max:255',
        ]);
        // Jika status diubah ke Tersedia, kosongkan nama peminjam
        if ($request->status == 'Tersedia') {
            $request->merge(['peminjam' => null]);
        }
        $inventari->update($request->all());
        return redirect()->route('admin.inventaris.index')->with('success', 'Data barang berhasil diperbarui.');
    }
    public function destroy(Inventari $inventari)
    {
        $inventari->delete();
        return redirect()->route('admin.inventaris.index')->with('success', 'Barang berhasil dihapus dari inventaris.');
    }
}
