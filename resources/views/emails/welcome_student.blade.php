<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.welcome_email_subject') }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;">
        <!-- Gambar menggunakan CID -->
        <img src="cid:elfitra.jpeg" alt="{{ __('messages.site_name') }}" style="max-width: 100px; display: block; margin: 0 auto;">
        
        <h2 style="text-align: center; color: #005555;">{{ __('messages.welcome_email_subject') }}</h2>
        <p>{{ __('messages.dear') }} {{ $nama_siswa }},</p>
        <p>{{ __('messages.welcome_student', ['jenjang' => $jenjang, 'tahun_ajaran' => $tahun_ajaran]) }}</p>
        <p>{{ __('messages.welcome_email_body') }}</p>

        <p style="text-align: center;">
            <a href="{{ url('/') }}" style="display: inline-block; padding: 10px 20px; background-color: #005555; color: #fff; text-decoration: none; border-radius: 5px;">
                {{ __('messages.visit_website') }}
            </a>
        </p>

        <p>{{ __('messages.regards') }},<br>{{ __('messages.site_name') }} Team</p>
    </div>
</body>
</html>
