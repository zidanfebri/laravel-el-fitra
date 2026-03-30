@extends('layouts.app')
@section('content')
<div class="container py-5 text-center">
    <div class="card shadow p-4 mx-auto" style="max-width: 500px; border-radius: 15px;">
        <i class="bi bi-whatsapp text-success" style="font-size: 3rem;"></i>
        <h3 class="fw-bold mt-3">Aktivasi Akun</h3>
        <p>Halo {{ $nama_user }}, klik tombol di bawah untuk mengirim pesan aktivasi ke Admin.</p>
        
        @php
            $pesan = "AKTIVASI#" . $token;
            $waUrl = "https://wa.me/" . $admin_phone . "?text=" . urlencode($pesan);
        @endphp

        <a href="{{ $waUrl }}" target="_blank" class="btn btn-success btn-lg w-100 fw-bold">
            KIRIM PESAN AKTIVASI
        </a>
        <p class="mt-3 small text-muted">Sistem kami akan membalas otomatis pesan Anda dengan link aktivasi.</p>
    </div>
</div>
@endsection