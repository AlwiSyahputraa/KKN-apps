<?php
// ======================================================================
// LANGKAH 4: Modifikasi LoginController
// FILE: app/Http/Controllers/Auth/LoginController.php
// LOKASI: Ganti seluruh isi file ini.
// DESKRIPSI: Menambahkan pengecekan status saat login.
// ======================================================================
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    protected function attemptLogin(Request $request)
    {
        $user = User::where($this->username(), $request->email)->first();

        // Jika user adalah admin, lewati pengecekan status
        if ($user && $user->role === 'admin') {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        }

        // Untuk user lain, cek status 'approved'
        return $this->guard()->attempt(
            array_merge($this->credentials($request), ['status' => 'approved']), 
            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where($this->username(), $request->email)->first();

        // Cek apakah user ada tapi statusnya pending (dan bukan admin)
        if ($user && $user->status === 'pending' && $user->role !== 'admin') {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => 'Akun Anda masih menunggu persetujuan dari Admin.',
                ]);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }
}
