<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }} | {{ __('messages.site_name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/jenjang.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    @extends('layouts.app')

    @section('content')
        <div class="container-fluid p-0">
            <div class="content-section py-5" id="article-detail">
                <div class="row justify-content-center animate__animated animate__fadeInUp">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="article-detail-card">
                            <h1 class="article-detail-title">
                                {{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}
                            </h1>
                            <p class="article-detail-date">
                                <i class="bi bi-calendar-date"></i> {{ $berita->tanggal_terbit }}
                            </p>
                            @if ($berita->gambar)
                                <img src="{{ Storage::url($berita->gambar) }}" alt="{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}" class="article-detail-image" loading="lazy">
                            @else
                                <img src="{{ asset('images/placeholder.jpg') }}" alt="{{ __('messages.no_image') }}" class="article-detail-image" loading="lazy">
                            @endif
                            <div class="article-detail-content">
                                {!! app()->getLocale() === 'en' && $berita->deskripsi_en ? nl2br(e($berita->deskripsi_en)) : nl2br(e($berita->deskripsi)) !!}
                            </div>
                            <a href="{{ route('home') }}" class="article-back-button mt-4">{{ __('messages.kembali') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Intersection Observer for smooth section reveal
                const sections = document.querySelectorAll('.content-section');
                const observerOptions = {
                    root: null,
                    threshold: 0.1,
                    rootMargin: '0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                sections.forEach(section => {
                    observer.observe(section);
                });
            });
        </script>
    @endsection
</body>
</html>