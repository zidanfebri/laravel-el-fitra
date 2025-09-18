@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">{{ __('messages.step4_title') }}</h2>
            <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
                <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
                <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
                <input type="hidden" name="nama_siswa" value="{{ session('pendaftaran.nama_siswa') }}">
                <input type="hidden" name="tanggal_lahir" value="{{ session('pendaftaran.tanggal_lahir') }}">
                <input type="hidden" name="jenis_kelamin" value="{{ session('pendaftaran.jenis_kelamin') }}">
                <input type="hidden" name="alamat" value="{{ session('pendaftaran.alamat') }}">
                <input type="hidden" name="rt" value="{{ session('pendaftaran.rt') }}">
                <input type="hidden" name="rw" value="{{ session('pendaftaran.rw') }}">
                <input type="hidden" name="kelurahan" value="{{ session('pendaftaran.kelurahan') }}">
                <input type="hidden" name="kecamatan" value="{{ session('pendaftaran.kecamatan') }}">
                <input type="hidden" name="kota" value="{{ session('pendaftaran.kota') }}">
                <input type="hidden" name="provinsi" value="{{ session('pendaftaran.provinsi') }}">
                <input type="hidden" name="penyakit_bawaan" value="{{ session('pendaftaran.penyakit_bawaan') }}">
                <input type="hidden" name="tinggi" value="{{ session('pendaftaran.tinggi') }}">
                <input type="hidden" name="berat_badan" value="{{ session('pendaftaran.berat_badan') }}">
                <input type="hidden" name="anak_ke" value="{{ session('pendaftaran.anak_ke') }}">
                <input type="hidden" name="jumlah_saudara" value="{{ session('pendaftaran.jumlah_saudara') }}">
                <input type="hidden" name="nama_ayah" value="{{ session('pendaftaran.nama_ayah') }}">
                <input type="hidden" name="nama_ibu" value="{{ session('pendaftaran.nama_ibu') }}">
                <input type="hidden" name="pekerjaan_ayah" value="{{ session('pendaftaran.pekerjaan_ayah') }}">
                <input type="hidden" name="pekerjaan_ibu" value="{{ session('pendaftaran.pekerjaan_ibu') }}">
                <input type="hidden" name="pendidikan_ayah" value="{{ session('pendaftaran.pendidikan_ayah') }}">
                <input type="hidden" name="pendidikan_ibu" value="{{ session('pendaftaran.pendidikan_ibu') }}">
                <input type="hidden" name="no_hp" value="{{ session('pendaftaran.no_hp') }}">
                <input type="hidden" name="no_whatsapp" value="{{ session('pendaftaran.no_whatsapp') }}">
                <input type="hidden" name="alamat_email" value="{{ session('pendaftaran.alamat_email') }}">
                <input type="hidden" name="sumber_informasi" value="{{ session('pendaftaran.sumber_informasi') }}">
                <div class="mb-3">
                    <label for="akte" class="form-label">{{ __('messages.akte') }}</label>
                    <input type="file" class="form-control" id="akte" name="akte" accept="application/pdf" required>
                </div>
                <div class="mb-3">
                    <label for="kk" class="form-label">{{ __('messages.kk') }}</label>
                    <input type="file" class="form-control" id="kk" name="kk" accept="application/pdf" required>
                </div>
                @if(session('pendaftaran.jenis_pendaftaran') === 'pindahan')
                    <div class="mb-3">
                        <label for="mutasi" class="form-label">{{ __('messages.mutasi') }}</label>
                        <input type="file" class="form-control" id="mutasi" name="mutasi" accept="application/pdf" required>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="mutasi" class="form-label">{{ __('messages.mutasi_optional') }}</label>
                        <input type="file" class="form-control" id="mutasi" name="mutasi" accept="application/pdf">
                    </div>
                @endif
                <button type="submit" class="btn btn-success">{{ __('messages.simpan') }}</button>
                <a href="{{ route('pendaftaran.step3') }}" class="btn btn-secondary">{{ __('messages.kembali') }}</a>
            </form>
        </div>
    </div>
@endsection