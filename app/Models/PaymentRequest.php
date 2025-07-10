<?php
// ======================================================================
// LANGKAH 2: Perbarui Model 'PaymentRequest'
// FILE: app/Models/PaymentRequest.php
// LOKASI: Tambahkan 'qr_code_image_path' ke dalam properti $fillable.
// ======================================================================
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PaymentRequest extends Model
{
    use HasFactory;
    // Diperbarui: Menambahkan kolom bank dan menghapus kolom gambar
    protected $fillable = [
        'judul', 
        'jumlah', 
        'kode_unik', 
        'user_id', 
        'bank_name', 
        'account_number', 
        'account_holder_name'
    ];
    public function confirmations() { return $this->hasMany(PaymentConfirmation::class); }
}