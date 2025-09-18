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
        $ip = $request->ip();

        // Hash password input dengan MD5 untuk dibandingkan
        $credentials['password'] = md5($credentials['password']);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            auth()->login($user);

            if ($user->role === 'admin') {
                return redirect()->route('admin.data-siswa')->with('success', $ip . ' says: Login successful!');
            }
            auth()->logout();
            return redirect()->back()->withErrors(['username' => __(
                'messages.no_admin_access',
                ['ip' => $ip]
            )]);
        }

        return redirect()->back()->withErrors(['username' => __(
            'messages.invalid_credentials',
            ['ip' => $ip]
        )]);
    }

    public function logout(Request $request)
    {
        $ip = $request->ip();
        auth()->logout();
        return redirect()->route('login')->with('success', $ip . ' Anda berhasil keluar');
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
        $ip = $request->ip();

        if ($user) {
            $user->password = md5($request->new_password);
            $user->reset_password = Str::random(60);
            $user->save();

            return redirect()->route('login')->with('success', __(
                'messages.password_reset_success',
                ['ip' => $ip]
            ));
        }

        return redirect()->back()->withErrors(['username' => __(
            'messages.username_not_found',
            ['ip' => $ip]
        )]);
    }
}