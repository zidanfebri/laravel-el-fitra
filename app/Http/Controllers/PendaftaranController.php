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
            ]);

            $pendaftaran = session('pendaftaran', []);
            $pendaftaran = array_merge($pendaftaran, $request->all());
            session(['pendaftaran' => $pendaftaran]);
        }
        return view('pendaftaran.step3');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'akte' => 'required|file',
            'kk' => 'required|file',
            'mutasi' => 'file|nullable',
        ]);

        $data = array_merge(session('pendaftaran', []), $request->all());
        $pendaftaran = new Pendaftaran();
        $pendaftaran->jenis_pendaftaran = $data['jenis_pendaftaran'];
        $pendaftaran->jenjang = $data['jenjang'];
        $pendaftaran->tingkat = $data['tingkat'];
        $pendaftaran->nama_siswa = $data['nama_siswa'];
        $pendaftaran->tanggal_lahir = $data['tanggal_lahir'];
        $pendaftaran->jenis_kelamin = $data['jenis_kelamin'];
        $pendaftaran->nama_ayah = $data['nama_ayah'];
        $pendaftaran->nama_ibu = $data['nama_ibu'];
        $pendaftaran->nomor_telepon = $data['nomor_telepon'];
        $pendaftaran->akte_path = $request->file('akte')->store('akte', 'public');
        $pendaftaran->kk_path = $request->file('kk')->store('kk', 'public');
        if ($request->hasFile('mutasi')) {
            $pendaftaran->mutasi_path = $request->file('mutasi')->store('mutasi', 'public');
        }
        $pendaftaran->save();

        session()->forget('pendaftaran');
        return redirect()->route('home')->with('success', 'Pendaftaran berhasil disimpan!');
    }
}