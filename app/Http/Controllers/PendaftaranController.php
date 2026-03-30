<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\TahunAjaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session; // Import Session
use App\Mail\PaymentSubmitted;
use App\Mail\PaymentVerified;

class PendaftaranController extends Controller
{
    // Variabel statis/placeholder untuk user_id (karena permintaan sebelumnya menghapus Auth::id())
    private $userIdPlaceholder = 1;

    public function check()
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif.');
            return redirect()->route('pendaftaran.closed');
        }

        /* --- 1. Cek Kadaluarsa Waktu Pembayaran (Prioritas Tinggi) --- */
        $expiresAt = Session::get('payment_expires_at');
        if ($expiresAt && Carbon::now()->greaterThan(Carbon::parse($expiresAt))) {
             Session::forget(['pendaftaran', 'payment_expires_at']);
             Log::warning('Session pendaftaran kadaluarsa, redirect ke step1.');
             return redirect()->route('pendaftaran.step1')->with('error', __('messages.registration_expired'));
        }
        /* ----------------------------------------------------------- */

        // Cari pendaftaran terakhir di DB (status sudah sukses/menunggu verifikasi)
        $existingPendaftaran = Pendaftaran::where('tahun_ajaran_id', $activeTahunAjaran->id)
            ->latest('tanggal_pendaftaran')
            ->first();

        if ($existingPendaftaran) {
            // Jika ada record di DB, cek status terakhir
            if ($existingPendaftaran->status === 'verifikasi') {
                return redirect()->route('pendaftaran.step3'); // Lanjut ke Data Ortu (Step 3 Baru)
            } elseif ($existingPendaftaran->status === 'diinput') {
                return redirect()->route('pendaftaran.step4'); // Lanjut ke Dokumen (Step 4 Baru)
            } elseif ($existingPendaftaran->status === 'sukses' || $existingPendaftaran->status === 'siswa') {
                return redirect()->route('pendaftaran.status'); // Selesai
            } elseif ($existingPendaftaran->status === 'pembayaran') {
                return redirect()->route('pendaftaran.verification')->with('info', __('messages.verification_message')); // Menunggu verifikasi
            }
        }
        
        /* --- 2. Cek Progress di Session (Jika Tidak Ada Record di DB) --- */
        $sessionData = Session::get('pendaftaran');
        if ($sessionData) {
            Log::info('Session pendaftaran ditemukan, cek progres.');

            // 2.1 Check if the user completed Step 4 (Dokumen) (Siap ke Payment)
            // Cek file path sudah ada di session
            if (isset($sessionData['akte_path']) && isset($sessionData['kk_path'])) {
                Log::info('Progres terdeteksi di Dokumen (Step 4 Selesai). Melanjutkan ke Pembayaran.');
                return redirect()->route('pendaftaran.payment');
            } 
            
            // 2.2 Check if the user completed Step 3 (Data Ortu) 
            // Cek field yang diisi di step 3 (misalnya nama_ayah)
            if (isset($sessionData['nama_ayah'])) {
                Log::info('Progres terdeteksi di Data Ortu (Step 3 Selesai). Melanjutkan ke Dokumen.');
                return redirect()->route('pendaftaran.step4');
            }
            
            // 2.3 Check if the user completed Step 2 (Data Siswa) or Step 1 (Jenjang/Jenis)
            if (isset($sessionData['nama_siswa']) || isset($sessionData['jenjang'])) {
                // PERATURAN BARU: Jika progress masih di Step 1 atau Step 2, restart dari awal.
                Session::forget('pendaftaran');
                Log::info('Progres (Jenis/Siswa) belum cukup, session dihapus, redirect ke step1.');
                return redirect()->route('pendaftaran.step1')->with('info', __('messages.registration_restarted_info'));
            } 
        }

        // Default action: Tidak ada DB record dan tidak ada session
        Log::info('Tidak ada pendaftaran, mengarahkan ke step1');
        return redirect()->route('pendaftaran.step1');
    }

    public function mustLogin()
    {
        Log::info('Akses halaman must-login oleh pengguna belum login');
        return view('pendaftaran.must-login');
    }

    public function closed()
    {
        Log::info('Akses halaman pendaftaran tertutup');
        return view('pendaftaran.closed');
    }

    public function verification()
    {
        Log::info('Akses halaman verifikasi.');
        return view('pendaftaran.verification');
    }

    public function step1()
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk step1.');
            return redirect()->route('pendaftaran.closed');
        }

        // Jika user kembali ke step1, hapus session timer jika ada.
        Session::forget('payment_expires_at');
        Log::info('Akses halaman pendaftaran step 1.');
        return view('pendaftaran.step1', compact('activeTahunAjaran'));
    }

    public function step2(Request $request)
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk step2.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'jenis_pendaftaran' => 'required|in:baru,pindahan',
                'jenjang' => 'required|in:TK,SD,SMP,SMA',
                'tingkat' => 'required',
            ]);

            session(['pendaftaran' => array_merge($request->all(), ['tahun_ajaran_id' => $activeTahunAjaran->id])]);
            Log::info('Data step 2 (Jenis & Jenjang) disimpan ke session:', ['data' => $request->all()]);
        }
        
        // Cek data pendaftaran di session, jika kosong redirect ke step1
        if (!session('pendaftaran')) {
            return redirect()->route('pendaftaran.step1');
        }
        return view('pendaftaran.step2');
    }

    /**
     * Step 3: Data Calon Siswa (Pindahan dari step 3 lama)
     */
    public function step3(Request $request)
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk step3.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'nama_siswa' => 'required|string|max:255',
                'nisn' => 'nullable|string|max:20', // Tambahan
                'tempat_lahir' => 'required|string|max:255', // Tambahan
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'agama' => 'nullable|in:Islam,Kristen,Budha,Hindu', // Tambahan
                'asal_sekolah' => 'nullable|string|max:255', // Tambahan
                'alamat' => 'required|string|max:255',
                'rt' => 'required|string|max:10',
                'rw' => 'required|string|max:10',
                'kelurahan_select' => 'required_without:kelurahan|string',
                'kelurahan' => 'required_if:kelurahan_select,lainnya|string|max:255|nullable',
                'kecamatan_select' => 'required_without:kecamatan|string',
                'kecamatan' => 'required_if:kecamatan_select,lainnya|string|max:255|nullable',
                'kota_select' => 'required_without:kota|string',
                'kota' => 'required_if:kota_select,lainnya|string|max:255|nullable',
                'provinsi_select' => 'required_without:provinsi|string',
                'provinsi' => 'required_if:provinsi_select,lainnya|string|max:255|nullable',
                'kode_pos' => 'nullable|string|max:10', // Tambahan
                'penyakit_bawaan' => 'nullable|string|max:255',
                'tinggi' => 'nullable|numeric|min:3',
                'berat_badan' => 'nullable|numeric|min:3',
                'anak_ke' => 'nullable|integer|min:1',
                'jumlah_saudara' => 'nullable|integer|min:0',
                'golongan_darah' => 'nullable|string|max:5', // Tambahan
                'no_whatsapp' => 'required|string|max:15',
            ]);

            $pendaftaran = session('pendaftaran', []);

            $data = [
                'nama_siswa' => $request->nama_siswa,
                'nisn' => $request->nisn,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'asal_sekolah' => $request->asal_sekolah,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'provinsi' => $request->provinsi_select && $request->provinsi_select !== 'lainnya' ? $request->provinsi_select : ($request->provinsi ?? ''),
                'kota' => $request->kota_select && $request->kota_select !== 'lainnya' ? $request->kota_select : ($request->kota ?? ''),
                'kecamatan' => $request->kecamatan_select && $request->kecamatan_select !== 'lainnya' ? $request->kecamatan_select : ($request->kecamatan ?? ''),
                'kelurahan' => $request->kelurahan_select && $request->kelurahan_select !== 'lainnya' ? $request->kelurahan_select : ($request->kelurahan ?? ''),
                'kode_pos' => $request->kode_pos,
                'penyakit_bawaan' => $request->penyakit_bawaan,
                'tinggi' => $request->tinggi,
                'berat_badan' => $request->berat_badan,
                'anak_ke' => $request->anak_ke,
                'jumlah_saudara' => $request->jumlah_saudara,
                'golongan_darah' => $request->golongan_darah,
                'no_whatsapp' => $request->no_whatsapp,
            ];

            $pendaftaran = array_merge($pendaftaran, $data);
            session(['pendaftaran' => $pendaftaran]);
            Log::info('Data step 3 (Data Siswa) disimpan ke session:', ['data' => $data]);
            
            return redirect()->route('pendaftaran.step4');
        }

        // Cek data pendaftaran di session, jika kosong redirect ke step2
        if (!session('pendaftaran')) {
            return redirect()->route('pendaftaran.step2');
        }
        return view('pendaftaran.step2'); // Step 2.blade.php akan menjadi Step 3 (Data Siswa)
    }

    /**
     * Step 4: Data Orang Tua (Pindahan dari step 4 lama)
     */
    public function step4(Request $request)
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk step4.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }

        // Data diambil dari session karena belum ada record di DB sampai ke payment
        $pendaftaranData = session('pendaftaran', []);

        if ($request->isMethod('post')) {
            $request->validate([
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'pekerjaan_ayah' => 'required|string|max:255',
                'pekerjaan_ibu' => 'required|string|max:255',
                'pendidikan_ayah' => 'required|string|in:SD,SMP,SMA,D3,S1,S2,S3',
                'pendidikan_ibu' => 'required|string|in:SD,SMP,SMA,D3,S1,S2,S3',
                'no_hp' => 'required|string|max:15',
                'alamat_email' => 'required|email|max:255',
                'sumber_informasi' => 'required|string|in:Website,Media Sosial,Teman/Keluarga,Iklan,Lainnya',
            ]);

            $data = $request->only([
                'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu',
                'pendidikan_ayah', 'pendidikan_ibu', 'no_hp', 'alamat_email', 'sumber_informasi'
            ]);

            $pendaftaranData = array_merge($pendaftaranData, $data);
            session(['pendaftaran' => $pendaftaranData]);
            
            Log::info('Data step 4 (Data Ortu) disimpan ke session:', ['data' => $data]);

            // Redirect ke step 5 baru (Dokumen)
            return redirect()->route('pendaftaran.step5')->with('success', __('messages.step4_sukses'));
        }

        Log::info('Menampilkan halaman step4 (Data Ortu).');
        
        // Pass the session data to the view (nama_ayah etc.)
        $pendaftaran = (object) $pendaftaranData;

        return view('pendaftaran.step4', compact('pendaftaran'));
    }
    
    /**
     * Step 5: Dokumen Pendukung (Pindahan dari step 5 lama)
     */
    public function step5(Request $request)
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk step5.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }
        
        $pendaftaranData = session('pendaftaran', []);
        $jenjang = $pendaftaranData['jenjang'] ?? null;
        
        // Tentukan nominal untuk ditampilkan di step5 (sebelum form pembayaran)
        $paymentDetails = match ($jenjang) {
            'TK' => ['nominal' => 50000, 'nomor_rekening' => '111-222-333 (Bank ABC)', 'atas_nama' => 'Yayasan TK El-Fitra',],
            'SD' => ['nominal' => 100000, 'nomor_rekening' => '123-456-789 (Bank XYZ)', 'atas_nama' => 'Yayasan SD El-Fitra',],
            'SMP' => ['nominal' => 200000, 'nomor_rekening' => '222-333-444 (Bank DEF)', 'atas_nama' => 'Yayasan SMP El-Fitra',],
            'SMA' => ['nominal' => 300000, 'nomor_rekening' => '333-444-555 (Bank GHI)', 'atas_nama' => 'Yayasan SMA El-Fitra',],
            default => ['nominal' => 0, 'nomor_rekening' => 'Tidak tersedia', 'atas_nama' => 'Tidak tersedia',],
        };
        $paymentDetails['formatted_nominal'] = 'Rp ' . number_format($paymentDetails['nominal'], 0, ',', '.');


        if ($request->isMethod('post')) {
            $rules = [
                'akte' => 'required|file|mimes:pdf|max:2048',
                'kk' => 'required|file|mimes:pdf|max:2048',
                'transkip1' => 'required|file|mimes:pdf|max:2048',
                'transkip2' => 'required|file|mimes:pdf|max:2048',
                'transkip3' => 'required|file|mimes:pdf|max:2048',
                'transkip4' => 'required|file|mimes:pdf|max:2048',
                'transkip5' => 'required|file|mimes:pdf|max:2048',
            ];

            if (($pendaftaranData['jenis_pendaftaran'] ?? null) === 'pindahan') {
                $rules['mutasi'] = 'required|file|mimes:pdf|max:2048';
            } else {
                $rules['mutasi'] = 'nullable|file|mimes:pdf|max:2048';
            }

            $request->validate($rules);
            
            // Simpan dokumen ke storage dan path ke session
            $data = [
                'akte_path' => $request->file('akte')->store('akte', 'public'),
                'kk_path' => $request->file('kk')->store('kk', 'public'),
                'transkip1_path' => $request->file('transkip1')->store('transkip', 'public'),
                'transkip2_path' => $request->file('transkip2')->store('transkip', 'public'),
                'transkip3_path' => $request->file('transkip3')->store('transkip', 'public'),
                'transkip4_path' => $request->file('transkip4')->store('transkip', 'public'),
                'transkip5_path' => $request->file('transkip5')->store('transkip', 'public'),
                'mutasi_path' => $request->hasFile('mutasi') ? $request->file('mutasi')->store('mutasi', 'public') : null,
            ];

            $pendaftaranData = array_merge($pendaftaranData, $data);
            session(['pendaftaran' => $pendaftaranData]);
            
            Log::info('Data step 5 (Dokumen) disimpan ke session.');
            
            // Redirect ke payment (Step 5 baru)
            return redirect()->route('pendaftaran.payment')->with('success', __('messages.dokumen_completed'));
        }

        // Pass session data for conditional checks in view
        $pendaftaran = (object) $pendaftaranData;
        
        Log::info('Menampilkan halaman step5 (Dokumen).');
        return view('pendaftaran.step5', compact('pendaftaran', 'paymentDetails'));
    }

    /**
     * Payment (Pindahan dari payment lama, sekarang step 6/final)
     */
    public function payment(Request $request)
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk payment.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }

        // Logika Pemeriksaan Waktu Kadaluarsa
        $expiresAt = Session::get('payment_expires_at');
        $isExpired = $expiresAt && Carbon::now()->greaterThan(Carbon::parse($expiresAt));

        if ($request->isMethod('get')) {
            // Jika GET (pertama kali masuk ke halaman pembayaran)
            if (Session::has('pendaftaran')) {
                if (!$expiresAt || $isExpired) {
                    // Set waktu kadaluarsa baru: 2 jam dari sekarang
                    $expiryTime = Carbon::now()->addHours(2);
                    Session::put('payment_expires_at', $expiryTime->toDateTimeString());
                    Log::info('Waktu kadaluarsa pembayaran diatur: ' . $expiryTime->toDateTimeString());
                } else if ($isExpired) {
                    // Ini seharusnya sudah tertangkap di check(), tapi double-check
                    Session::forget(['pendaftaran', 'payment_expires_at']);
                    return redirect()->route('pendaftaran.step1')->with('error', __('messages.registration_expired'));
                }
            } else {
                 // Tidak ada data pendaftaran di session
                return redirect()->route('pendaftaran.step1')->with('error', __('messages.session_data_missing'));
            }
        }
        
        // Cek jika POST dan sudah kadaluarsa (walaupun ini harusnya dicegah di frontend)
        if ($request->isMethod('post') && $isExpired) {
            Session::forget(['pendaftaran', 'payment_expires_at']);
            return redirect()->route('pendaftaran.step1')->with('error', __('messages.registration_expired_on_submit'));
        }
        
        // Ambil data untuk tampilan dan pemrosesan
        $pendaftaranData = session('pendaftaran', []);
        $jenjang = $pendaftaranData['jenjang'] ?? null;
        
        // Tentukan detail pembayaran
        $paymentDetails = match ($jenjang) {
            'TK' => ['nominal' => 50000, 'nomor_rekening' => '111-222-333 (Bank ABC)', 'atas_nama' => 'Yayasan TK El-Fitra',],
            'SD' => ['nominal' => 100000, 'nomor_rekening' => '123-456-789 (Bank XYZ)', 'atas_nama' => 'Yayasan SD El-Fitra',],
            'SMP' => ['nominal' => 200000, 'nomor_rekening' => '222-333-444 (Bank DEF)', 'atas_nama' => 'Yayasan SMP El-Fitra',],
            'SMA' => ['nominal' => 300000, 'nomor_rekening' => '333-444-555 (Bank GHI)', 'atas_nama' => 'Yayasan SMA El-Fitra',],
            default => ['nominal' => 0, 'nomor_rekening' => 'Tidak tersedia', 'atas_nama' => 'Tidak tersedia',],
        };
        $paymentDetails['formatted_nominal'] = 'Rp ' . number_format($paymentDetails['nominal'], 0, ',', '.');


        if ($request->isMethod('post')) {
            $request->validate([
                'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ]);
            
            // Simpan bukti pembayaran ke storage
            $pendaftaranData['bukti_pembayaran_path'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            
            // Buat record Pendaftaran baru dari data session
            $pendaftaran = new Pendaftaran();
            $pendaftaran->user_id = $this->userIdPlaceholder; 
            $pendaftaran->fill($pendaftaranData);
            $pendaftaran->status = 'pembayaran';
            $pendaftaran->tanggal_pendaftaran = now();
            $pendaftaran->save();

            // Kirim email notifikasi ke Calon Siswa (User)
            try {
                $userEmail = $pendaftaranData['alamat_email'] ?? 'placeholder@example.com';
                Mail::to($userEmail)->send(new PaymentSubmitted($pendaftaran));
                Log::info('Email bukti pembayaran dikirim ke user: ' . $userEmail);
            } catch (\Exception $e) {
                Log::error('Gagal mengirim email bukti pembayaran ke user:', ['error' => $e->getMessage()]);
            }

            // Kirim notifikasi ke SEMUA ADMIN
            try {
                $admins = User::admin()->get();
                $adminEmails = $admins->pluck('email')->toArray();
                Mail::raw("Ada pendaftar baru yang telah melakukan pembayaran. \n\nNama Siswa: {$pendaftaran->nama_siswa}\nJenjang: {$pendaftaran->jenjang}\nTingkat: {$pendaftaran->tingkat}\n\nSilakan verifikasi pembayaran.", function ($message) use ($adminEmails) {
                    $message->to($adminEmails)
                            ->subject('PEMBERITAHUAN: Pendaftar Baru & Bukti Pembayaran Masuk');
                });
                
                Log::info('Notifikasi email pembayaran dikirim ke admin: ' . implode(', ', $adminEmails));
            } catch (\Exception $e) {
                Log::error('Gagal mengirim email notifikasi ke admin:', ['error' => $e->getMessage()]);
            }

            Log::info('Pendaftaran Selesai. Bukti pembayaran disimpan:', ['pendaftaran_id' => $pendaftaran->id]);
            Session::forget(['pendaftaran', 'payment_expires_at']); // Clear both session keys
            
            // Redirect ke home dengan notifikasi berhasil
            return redirect()->route('home')->with('success', __('messages.step5_completed')); 
        }

        // Untuk Tampilan GET: Pass waktu kadaluarsa ke view
        $pendaftaran = (object) $pendaftaranData;
        $expiryTimestamp = Carbon::parse(Session::get('payment_expires_at'))->timestamp * 1000;
        
        return view('pendaftaran.step3', compact('paymentDetails', 'expiryTimestamp'));
    }

    // Fungsi status() tetap sama
    public function status()
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'active')
            ->where('tanggal_mulai', '<=', Carbon::today())
            ->where('tanggal_akhir', '>=', Carbon::today())
            ->first();

        if (!$activeTahunAjaran) {
            Log::warning('Tidak ada tahun ajaran aktif untuk status.');
            return redirect()->route('pendaftaran.closed')->with('error', __('messages.registration_closed'));
        }

        $pendaftaran = Pendaftaran::where('tahun_ajaran_id', $activeTahunAjaran->id)
            ->whereIn('status', ['sukses', 'siswa'])
            ->latest('tanggal_pendaftaran')
            ->first();

        if (!$pendaftaran) {
            Log::error('Pendaftaran dengan status sukses atau siswa tidak ditemukan.');
            return redirect()->route('pendaftaran.check')->with('error', __('messages.no_registration'));
        }

        Log::info('Menampilkan halaman status.', [
            'pendaftaran_id' => $pendaftaran->id,
            'status' => $pendaftaran->status,
        ]);
        return view('pendaftaran.status', compact('pendaftaran'));
    }
}
