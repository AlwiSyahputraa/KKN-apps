<?php
// ======================================================================
// LANGKAH 1: Perbarui RegisterController
// FILE: app/Http/Controllers/Auth/RegisterController.php
// LOKASI: Ganti seluruh isi file ini dengan kode di bawah.
// ======================================================================
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // Diperbaiki: Menambahkan 'peralatan' ke dalam daftar validasi
            'role' => ['required', 'string', 'in:pdd,sekretaris,bendahara,admin,ketua,wakil_ketua,humas,acara,peralatan, konsumsi'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
}
