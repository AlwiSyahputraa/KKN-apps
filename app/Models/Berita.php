<?php
// ======================================================================
// FILE: app/Models/Berita.php
// LOKASI: Buka file ini dan tambahkan properti $fillable di dalamnya.
// ======================================================================

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'konten',
        'url_gambar',
    ];
}
