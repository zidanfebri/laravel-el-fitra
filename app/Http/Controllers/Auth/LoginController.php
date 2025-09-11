<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Hash password input dengan MD5 untuk dibandingkan
        $credentials['password'] = md5($credentials['password']);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            auth()->login($user);

            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            }
            auth()->logout();
            return redirect()->back()->withErrors(['username' => 'Anda tidak memiliki akses admin.']);
        }

        return redirect()->back()->withErrors(['username' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }

    public function showResetForm()
    {
        return view('auth.reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'username' => 'required|string|exists:users',
            'new_password' => 'required|string|min:6',
        ]);

        $user = User::where('username', $request->username)->first();
        if ($user) {
            $user->password = md5($request->new_password);
            $user->reset_password = Str::random(60);
            $user->save();

            return redirect()->route('login')->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
        }

        return redirect()->back()->withErrors(['username' => 'Username tidak ditemukan.']);
    }
}