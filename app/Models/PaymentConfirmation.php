<?php
// ======================================================================
// LANGKAH 2: Perbarui Model 'PaymentConfirmation'
// FILE: app/Models/PaymentConfirmation.php
// LOKASI: Ganti seluruh isi file ini.
// ======================================================================
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PaymentConfirmation extends Model
{
    use HasFactory;
    protected $fillable = ['payment_request_id', 'user_id', 'proof_of_payment_path', 'status', 'verified_at'];
    
    public function user() { 
        return $this->belongsTo(User::class); 
    }

    // RELASI BARU YANG DITAMBAHKAN
    public function paymentRequest() {
        return $this->belongsTo(PaymentRequest::class);
    }
}