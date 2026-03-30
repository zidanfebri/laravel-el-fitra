<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran</title>
</head>
<body>
    <h2>Bukti Pembayaran Berhasil Dikirim</h2>
    <p>Untuk {{ $nama_siswa }},</p>
    <p>Bukti pembayaran anda untuk pendaftaran di {{ $jenjang }} El Fitra Berhasil dilakukan</p>
    <p>Harap tunggu hingga 24 jam hingga tim kami memverifikasi pembayaran Anda. Anda dapat memeriksa status pembayaran secara berkala di halaman pendaftaran.</p>
    <p>Untuk pertanyaan lebih lanjut, silakan hubungi admin kami melalui WhatsApp di +6285793526478.</p>
    <p>Terima Kasih<br>Tim El-Fitra</p>
    <p style="text-align: center;">
        <a href="{{ url('/') }}" style="display: inline-block; padding: 10px 20px; background-color: #005555; color: #fff; text-decoration: none; border-radius: 5px;">
                {{ __('messages.visit_website') }}
        </a>
    </p>
</body>
</html>