<?php
// ======================================================================
// LANGKAH 2: Perbarui Model Inventari
// FILE: app/Models/Inventari.php
// LOKASI: Buka file ini dan tambahkan properti $fillable.
// ======================================================================
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Inventari extends Model
{
    use HasFactory;
    protected $table = 'inventaris'; // Menentukan nama tabel secara eksplisit
    protected $fillable = ['nama_barang', 'jumlah', 'kondisi', 'status', 'peminjam'];
}