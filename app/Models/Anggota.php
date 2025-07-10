<?php
// ======================================================================
// FILE: app/Models/Anggota.php
// LOKASI: Buka file ini dan tambahkan properti $fillable di dalamnya.
// ======================================================================

// ======================================================================
// LANGKAH 2: Perbarui Model Anggota
// FILE: app/Models/Anggota.php
// LOKASI: Hapus 'linkedin_url' dari properti $fillable.
// ======================================================================
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Anggota extends Model
{
    use HasFactory;
    // Diperbarui: Menghapus 'linkedin_url'
    protected $fillable = ['user_id', 'name', 'jabatan', 'foto_profil', 'instagram_url'];
}