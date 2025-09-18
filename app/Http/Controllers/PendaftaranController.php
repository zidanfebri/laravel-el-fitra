<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function step1()
    {
        return view('pendaftaran.step1');
    }

    public function step2(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'jenis_pendaftaran' => 'required|in:baru,pindahan',
                'jenjang' => 'required|in:TK,SD,SMP,SMA',
                'tingkat' => 'required',
            ]);

            session(['pendaftaran' => $request->all()]);
        }
        return view('pendaftaran.step2');
    }

    public function step3(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'nama_siswa' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'alamat' => 'required|string|max:255',
                'rt' => 'required|string|max:10',
                'rw' => 'required|string|max:10',
                'kelurahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'penyakit_bawaan' => 'nullable|string|max:255',
                'tinggi' => 'nullable|numeric|min:3',
                'berat_badan' => 'nullable|numeric|min:3',
                'anak_ke' => 'nullable|integer|min:1',
                'jumlah_saudara' => 'nullable|integer|min:0',
            ]);

            $pendaftaran = session('pendaftaran', []);
            $pendaftaran = array_merge($pendaftaran, $request->all());
            session(['pendaftaran' => $pendaftaran]);
        }
        return view('pendaftaran.step3');
    }

    public function step4(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'pekerjaan_ayah' => 'required|string|max:255',
                'pekerjaan_ibu' => 'required|string|max:255',
                'pendidikan_ayah' => 'required|string|max:255',
                'pendidikan_ibu' => 'required|string|max:255',
                'no_hp' => 'required|string|max:15',
                'no_whatsapp' => 'required|string|max:15',
                'alamat_email' => 'required|email|max:255',
                'sumber_informasi' => 'required|string|max:255',
            ]);

            $pendaftaran = session('pendaftaran', []);
            $pendaftaran = array_merge($pendaftaran, $request->all());
            session(['pendaftaran' => $pendaftaran]);
        }
        return view('pendaftaran.step4');
    }

    public function store(Request $request)
    {
        $request->validate([
            'akte' => 'required|file|mimes:pdf|max:2048',
            'kk' => 'required|file|mimes:pdf|max:2048',
            'mutasi' => session('pendaftaran.jenis_pendaftaran') === 'pindahan' ? 'required|file|mimes:pdf|max:2048' : 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = session('pendaftaran', []);
        $pendaftaran = new Pendaftaran();
        $pendaftaran->jenis_pendaftaran = $data['jenis_pendaftaran'];
        $pendaftaran->jenjang = $data['jenjang'];
        $pendaftaran->tingkat = $data['tingkat'];
        $pendaftaran->nama_siswa = $data['nama_siswa'];
        $pendaftaran->tanggal_lahir = $data['tanggal_lahir'];
        $pendaftaran->jenis_kelamin = $data['jenis_kelamin'];
        $pendaftaran->alamat = $data['alamat'];
        $pendaftaran->rt = $data['rt'];
        $pendaftaran->rw = $data['rw'];
        $pendaftaran->kelurahan = $data['kelurahan'];
        $pendaftaran->kecamatan = $data['kecamatan'];
        $pendaftaran->kota = $data['kota'];
        $pendaftaran->provinsi = $data['provinsi'];
        $pendaftaran->penyakit_bawaan = $data['penyakit_bawaan'] ?? null;
        $pendaftaran->tinggi = $data['tinggi'];
        $pendaftaran->berat_badan = $data['berat_badan'];
        $pendaftaran->anak_ke = $data['anak_ke'];
        $pendaftaran->jumlah_saudara = $data['jumlah_saudara'];
        $pendaftaran->nama_ayah = $data['nama_ayah'];
        $pendaftaran->nama_ibu = $data['nama_ibu'];
        $pendaftaran->pekerjaan_ayah = $data['pekerjaan_ayah'];
        $pendaftaran->pekerjaan_ibu = $data['pekerjaan_ibu'];
        $pendaftaran->pendidikan_ayah = $data['pendidikan_ayah'];
        $pendaftaran->pendidikan_ibu = $data['pendidikan_ibu'];
        $pendaftaran->no_hp = $data['no_hp'];
        $pendaftaran->no_whatsapp = $data['no_whatsapp'];
        $pendaftaran->alamat_email = $data['alamat_email'];
        $pendaftaran->sumber_informasi = $data['sumber_informasi'];
        $pendaftaran->akte_path = $request->file('akte')->store('akte', 'public');
        $pendaftaran->kk_path = $request->file('kk')->store('kk', 'public');
        if ($request->hasFile('mutasi')) {
            $pendaftaran->mutasi_path = $request->file('mutasi')->store('mutasi', 'public');
        }
        $pendaftaran->tanggal_pendaftaran = now(); // Set current timestamp
        $pendaftaran->save();

        $jenjang = __('messages.' . strtolower($data['jenjang']));
        $successMessage = __('messages.registration_success', ['jenjang' => $jenjang]);
        session()->forget('pendaftaran');
        return redirect()->route('home')->with('success', $successMessage);
    }
}