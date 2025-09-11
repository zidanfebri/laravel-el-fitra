@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Data Calon Siswa</h2>
        <form method="POST" action="{{ route('pendaftaran.step3') }}">
            @csrf
            <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
            <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
            <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
            <div class="mb-3">
                <label for="nama_siswa" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Next</button>
            <a href="{{ route('pendaftaran.step1') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection