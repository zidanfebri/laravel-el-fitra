<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.password_reset_subject') }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <div style="text-align: center;">
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" style="width: 80px; height: 80px; border-radius: 50%;">
            <h2 style="color: #28a745;">{{ __('messages.password_reset_subject') }}</h2>
        </div>
        <p>{{ __('messages.dear') }} {{ $user->nama }},</p>
        <p>{{ __('messages.password_reset_request') }}</p>
        <p>{{ __('messages.password_reset_instructions') }}</p>
        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ $resetUrl }}" style="background-color: #28a745; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                {{ __('messages.reset_password') }}
            </a>
        </div>
        <p>{{ __('messages.reset_link_expires') }}</p>
        <p>{{ __('messages.ignore_if_not_requested') }}</p>
        <p style="margin-top: 20px;">© 2025 El-Fitra. {{ __('messages.all_rights_reserved') }}</p>
    </div>
</body>
</html>