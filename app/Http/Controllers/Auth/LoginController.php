<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginInput = $request->username;
        $field = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where($field, $loginInput)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->is_active) {
                return redirect()->back()
                    ->withErrors(['username' => 'Akun belum aktif. Silakan cek Email/WhatsApp untuk aktivasi.'])
                    ->onlyInput('username');
            }

            Auth::login($user);
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect()->route('admin.data-siswa')->with('success', 'Login Berhasil!');
            }
            return redirect()->route('home')->with('success', 'Selamat datang, ' . $user->nama);
        }

        return redirect()->back()
            ->withErrors(['username' => __('messages.invalid_credentials', ['ip' => $request->ip()])])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil keluar.');
    }

    // --- FITUR RESET PASSWORD ---

    // Menampilkan halaman minta reset (Email Input)
    public function showResetRequestForm()
    {
        return view('auth.request-reset');
    }

    // Mengirim link reset ke email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(64);

        // Simpan token ke database (tabel password_reset_tokens)
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token, // Simpan plain atau hashed sesuai kebutuhan
                'created_at' => Carbon::now()
            ]
        );

        // Update token di tabel users juga untuk verifikasi ganda
        User::where('email', $request->email)->update([
            'reset_password_token' => $token,
            'reset_password_expires_at' => Carbon::now()->addHours(2)
        ]);

        $resetLink = route('password.reset', ['token' => $token]);

        // Kirim Email (Pastikan .env SMTP sudah benar)
        try {
            Mail::send([], [], function ($message) use ($request, $resetLink) {
                $message->to($request->email)
                    ->subject('Reset Password - El-Fitra School')
                    ->html("Klik link berikut untuk reset password Anda: <a href='{$resetLink}'>{$resetLink}</a>");
            });
            return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email. Periksa koneksi SMTP Anda.']);
        }
    }

    // Menampilkan halaman form input password baru
    public function showResetForm($token)
    {
        // Validasi token ada di database
        $user = User::where('reset_password_token', $token)
                    ->where('reset_password_expires_at', '>', Carbon::now())
                    ->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'Token reset tidak valid atau sudah kedaluwarsa.']);
        }

        return view('auth.reset', ['token' => $token]);
    }

    // Memproses update password baru
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('reset_password_token', $request->token)
                    ->where('reset_password_expires_at', '>', Carbon::now())
                    ->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'Gagal mereset password. Token tidak valid.']);
        }

        // Update Password
        $user->update([
            'password' => Hash::make($request->new_password),
            'reset_password_token' => null,
            'reset_password_expires_at' => null,
        ]);

        // Hapus token dari tabel password_reset_tokens
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan login.');
    }
}