<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.site_name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/jenjang.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="{{ route('home') }}">
                <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" width="40" class="me-2"> {{ __('messages.site_name') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}#tentang-kami" id="tentangKamiLink">{{ __('messages.about_us') }}</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="programDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.program') }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('jenjang.tk') }}">{{ __('messages.tk') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sd') }}">{{ __('messages.sd') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.smp') }}">{{ __('messages.smp') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}">{{ __('messages.sma') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('pendaftaran.step1') }}">{{ __('messages.registration') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('berita') }}">{{ __('messages.news') }}</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                    <li class="nav-item dropdown language-dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ app()->getLocale() == 'id' ? __('messages.language_id') : __('messages.language_en') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'id') }}">{{ __('messages.language_id') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'en') }}">{{ __('messages.language_en') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h5>{{ __('messages.about_us') }}</h5>
                    <p>{{ __('messages.footer_about_us') }}</p>
                </div>
                <div class="col-md-4">
                    <h5>{{ __('messages.footer_links') }}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-dark">{{ __('messages.home') }}</a></li>
                        <li><a href="{{ route('home') }}#tentang-kami" class="text-dark">{{ __('messages.about_us') }}</a></li>
                        <li><a href="{{ route('pendaftaran.step1') }}" class="text-dark">{{ __('messages.registration') }}</a></li>
                        <li><a href="{{ route('berita') }}" class="text-dark">{{ __('messages.news') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4 position-relative">
                    <h5>{{ __('messages.footer_contact') }}</h5>
                    <p>{{ __('messages.footer_email') }}</p>
                    <p>{{ __('messages.footer_phone') }}</p>
                    <div>
                        <a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-dark me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                    </div>
                    <button class="scroll-top-btn" title="{{ __('messages.scroll_to_top') }}">
                        <i class="bi bi-arrow-up-circle"></i>
                    </button>
                </div>
            </div>
            <div class="text-center mt-3">
                <p class="mb-0 text-dark">{{ __('messages.footer_copyright') }}</p>
            </div>
        </div>
    </footer>

    <div class="whatsapp-button">
        <a href="https://wa.me/6285793526478" target="_blank" class="d-flex align-items-center text-decoration-none">
            <i class="bi bi-whatsapp me-2"></i>
            <span>{{ __('messages.whatsapp_contact') }}</span>
        </a>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function scrollToSection(hash) {
                const targetElement = document.getElementById(hash);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            }

            const anchors = document.querySelectorAll('a[href*="#"]');
            if (anchors) {
                anchors.forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        const [path, hash] = href.split('#');
                        const isSamePage = !path || path === window.location.pathname || path === '{{ route('home') }}';

                        if (hash) {
                            e.preventDefault();
                            if (isSamePage) {
                                scrollToSection(hash);
                            } else {
                                sessionStorage.setItem('scrollTo', hash);
                                window.location.href = href;
                            }
                        }
                    });
                });
            }

            const hash = sessionStorage.getItem('scrollTo') || window.location.hash.substring(1);
            if (hash) {
                setTimeout(() => {
                    scrollToSection(hash);
                    sessionStorage.removeItem('scrollTo');
                }, 100);
            }

            const scrollTopBtn = document.querySelector('.scroll-top-btn');
            if (scrollTopBtn) {
                scrollTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
</body>
</html>