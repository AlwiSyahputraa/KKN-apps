<?php
// ======================================================================
// FILE: app/Models/Proker.php
// LOKASI: Buka file ini dan tambahkan properti $fillable di dalamnya.
// ======================================================================

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
    ];
}
