<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
{
    Log::info('🚀 Mulai proses registrasi', $request->all());

    // Validasi data input
    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'in:admin,pelanggan'],
    ];

    $validated = $request->validate($rules);

    Log::info('✅ Validasi berhasil');

    // Buat user baru
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => $validated['role'],
    ]);

    // Setelah user dibuat, tambahkan data ke tabel 'penggunas'
    Pengguna::create([
        'user_id' => $user->id,  // ID user yang baru saja dibuat
        'nama_pengguna' => $user->name, // Nama pengguna sesuai dengan field 'name'
    ]);

    Log::info('User berhasil disimpan', ['user' => $user]);

    event(new Registered($user));
    Auth::login($user);

    if ($user->role === 'admin') {
        return redirect()->route('produk.index');
    }

    if ($user->role === 'pelanggan') {
        return redirect()->route('pelanggan.index');
    }

    return redirect('/'); // fallback
}


}
