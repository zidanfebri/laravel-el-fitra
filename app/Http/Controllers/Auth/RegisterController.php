<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'numeric', 'min:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'activation_method' => ['required', 'in:email,whatsapp'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $token = Str::random(64);
        
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'is_active' => false,
            'activation_token' => $token,
        ]);

        // URL Aktivasi (Ganti domain.com dengan URL asli jika sudah hosting)
        // Jika masih localhost, user harus klik dari perangkat yang sama dengan server
        $activationLink = route('activate', ['token' => $token]);

        if ($request->activation_method == 'email') {
            try {
                Mail::send([], [], function ($message) use ($user, $activationLink) {
                    $message->to($user->email)
                        ->cc('zidanfebrian982@gmail.com')
                        ->subject('Aktivasi Akun - El-Fitra School')
                        ->html("Halo <b>{$user->nama}</b>,<br><br>Aktifkan akun Anda di sini: <a href='{$activationLink}'>{$activationLink}</a>");
                });
                return redirect()->route('login')->with('success', "Link aktivasi dikirim ke email.");
            } catch (\Exception $e) {
                return redirect()->route('login')->with('success', "Registrasi berhasil, email gagal terkirim.");
            }
        } else {
            // KIRIM OTOMATIS VIA API WABLAS (Server-to-Server)
            $pesan = "Halo *{$user->nama}*,\n\nTerima kasih telah mendaftar di El-Fitra School.\n\nSilakan klik link berikut untuk mengaktifkan akun Anda:\n\n" . $activationLink;
            
            $response = $this->sendWhatsAppWablas($user->username, $pesan);

            if ($response && isset($response['status']) && $response['status'] == true) {
                // Berhasil kirim, arahkan ke halaman login
                return redirect()->route('login')->with('success', "Link aktivasi telah dikirim ke WhatsApp Anda.");
            } else {
                // Jika gagal, arahkan user untuk kirim manual via wa.me (Fallback)
                return view('auth.activate_whatsapp', [
                    'token' => $token,
                    'admin_phone' => '6285793526478',
                    'nama_user' => $user->nama
                ]);
            }
        }
    }

    private function sendWhatsAppWablas($target, $pesan)
    {
        // Normalisasi nomor: ubah 08 ke 62
        if (str_starts_with($target, '0')) {
            $target = '62' . substr($target, 1);
        }

        $token = env('WABLAS_TOKEN');
        $baseUrl = env('WABLAS_URL'); 

        try {
            $response = Http::withHeaders([
                'Authorization' => $token
            ])
            ->withoutVerifying() 
            ->asForm() 
            ->post($baseUrl, [
                'phone' => $target,
                'message' => $pesan,
            ]);

            return $response->json();
        } catch (\Exception $e) {
            return ['status' => false, 'reason' => $e->getMessage()];
        }
    }

    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) return redirect()->route('login')->withErrors(['username' => 'Token tidak valid.']);

        $user->update(['is_active' => true, 'activation_token' => null]);
        return redirect()->route('login')->with('success', 'Akun berhasil diaktifkan! Silakan login.');
    }
}