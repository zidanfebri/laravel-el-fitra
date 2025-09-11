@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Orang Tua & Dokumen</h2>
        <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
            <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
            <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
            <input type="hidden" name="nama_siswa" value="{{ session('pendaftaran.nama_siswa') }}">
            <input type="hidden" name="tanggal_lahir" value="{{ session('pendaftaran.tanggal_lahir') }}">
            <input type="hidden" name="jenis_kelamin" value="{{ session('pendaftaran.jenis_kelamin') }}">
            <div class="mb-3">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required value="{{ old('nama_ayah') }}">
            </div>
            <div class="mb-3">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required value="{{ old('nama_ibu') }}">
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required value="{{ old('nomor_telepon') }}">
            </div>
            @if(session('pendaftaran.jenis_pendaftaran') === 'pindahan')
                <div class="mb-3">
                    <label for="mutasi" class="form-label">Dokumen Mutasi</label>
                    <input type="file" class="form-control" id="mutasi" name="mutasi">
                </div>
            @endif
            <div class="mb-3">
                <label for="akte" class="form-label">Dokumen Akte</label>
                <input type="file" class="form-control" id="akte" name="akte" required>
            </div>
            <div class="mb-3">
                <label for="kk" class="form-label">Dokumen Kartu Keluarga</label>
                <input type="file" class="form-control" id="kk" name="kk" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('pendaftaran.step3') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection