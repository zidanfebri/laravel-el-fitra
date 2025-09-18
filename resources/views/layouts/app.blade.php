<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.site_name') }}</title>
    <link href="{{ asset('css/app.css') }}?v=7" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/jenjang.css') }}" rel="stylesheet">
    <style>
        .toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1055;
        }
        .toast {
            min-width: 300px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .toast-header {
            background-color: #f8f9fa;
            color: #333;
        }
        .toast-body {
            color: #333;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                    <li class="nav-item dropdown language-dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fi fi-{{ app()->getLocale() == 'id' ? 'id' : 'gb' }} me-2"></span>
                            {{ app()->getLocale() == 'id' ? __('messages.language_id') : __('messages.language_en') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('language.switch', 'id') }}">
                                    <span class="fi fi-id me-2"></span>{{ __('messages.language_id') }}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('language.switch', 'en') }}">
                                    <span class="fi fi-gb me-2"></span>{{ __('messages.language_en') }}
                                </a>
                            </li>
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
                    <h5 class="d-flex align-items-center">
                        <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" width="40" class="me-2">
                        {{ __('messages.about_us') }}
                    </h5>
                    <p>{{ __('messages.footer_about_us') }}</p>
                </div>
                <div class="col-md-4">
                    <h5>{{ __('messages.footer_links') }}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-dark">{{ __('messages.home') }}</a></li>
                        <li><a href="{{ route('home') }}#tentang-kami" class="text-dark tentang-kami-footer">{{ __('messages.about_us') }}</a></li>
                        <li><a href="{{ route('pendaftaran.step1') }}" class="text-dark">{{ __('messages.registration') }}</a></li>
                        <li><a href="{{ route('berita') }}" class="text-dark">{{ __('messages.news') }}</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>{{ __('messages.footer_contact') }}</h5>
                    <p>{{ __('messages.footer_email') }}</p>
                    <p>{{ __('messages.footer_phone') }}</p>
                    <div>
                        <a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-dark me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <p class="mb-0 text-dark">{{ __('messages.footer_copyright') }}</p>
            </div>
        </div>
    </footer>

    <button class="scroll-top-btn" title="{{ __('messages.scroll_to_top') }}">
        <i class="bi bi-arrow-up-circle"></i>
    </button>

    <div class="whatsapp-button">
        <a href="https://wa.me/6285793526478" target="_blank" class="d-flex align-items-center text-decoration-none">
            <i class="bi bi-whatsapp me-2"></i>
            <span>{{ __('messages.whatsapp_contact') }}</span>
        </a>
    </div>

    <!-- Toast Notification -->
    @if (session('success'))
        <div class="toast-container">
            <div class="toast animate__animated animate__fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" width="20" class="me-2">
                    <strong class="me-auto">{{ __('messages.site_name') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                    <div class="mt-2 text-end">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">{{ __('messages.ok') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize toast
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                // Handle Enter key to dismiss toast
                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        toast.hide();
                    }
                });
            }

            // Existing scroll-related scripts
            function scrollToSection(hash) {
                console.log('Attempting to scroll to:', hash);
                const targetElement = document.getElementById(hash);
                if (targetElement) {
                    console.log('Found target element:', targetElement);
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                } else {
                    console.log('Target element not found:', hash);
                }
            }

            const anchors = document.querySelectorAll('a[href*="#"]');
            const homePath = '{{ route('home') }}';
            console.log('Home path:', homePath, 'Current path:', window.location.pathname);

            if (anchors) {
                anchors.forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        let path, hash;
                        try {
                            const url = new URL(href, window.location.origin);
                            path = url.pathname;
                            hash = url.hash.replace('#', '');
                        } catch (error) {
                            console.error('Error parsing href:', href, error);
                            return;
                        }
                        const isHomePath = window.location.pathname === homePath;
                        const isSamePage = !path || path === window.location.pathname || path === homePath;

                        console.log('Anchor clicked:', {
                            href,
                            path: path || 'empty',
                            hash,
                            isSamePage,
                            isHomePath,
                            currentPath: window.location.pathname,
                            homePath
                        });

                        if (hash && href.includes('#tentang-kami') && !isHomePath) {
                            e.preventDefault();
                            console.log('Redirecting to:', homePath + '#tentang-kami');
                            window.location.assign(homePath + '#tentang-kami');
                        } else if (hash && isSamePage) {
                            e.preventDefault();
                            scrollToSection(hash);
                        } else if (hash) {
                            e.preventDefault();
                            sessionStorage.setItem('scrollTo', hash);
                            console.log('Redirecting with sessionStorage:', href);
                            window.location.assign(href);
                        }
                    });
                });
            }

            const hash = window.location.hash.substring(1) || sessionStorage.getItem('scrollTo');
            if (hash) {
                console.log('Processing hash:', hash);
                let attempts = 0;
                const maxAttempts = 20; // Retry up to 2 seconds
                const checkDOM = () => {
                    if (attempts >= maxAttempts) {
                        console.log('Max scroll attempts reached for hash:', hash);
                        sessionStorage.removeItem('scrollTo');
                        return;
                    }
                    if (document.readyState === 'complete' && document.getElementById(hash)) {
                        scrollToSection(hash);
                        sessionStorage.removeItem('scrollTo');
                    } else {
                        console.log('DOM not ready or element not found, retrying:', { hash, attempt: attempts + 1 });
                        attempts++;
                        setTimeout(checkDOM, 100);
                    }
                };
                setTimeout(checkDOM, 500);
            } else {
                console.log('No hash found, scrolling to top');
                window.scrollTo(0, 0);
                sessionStorage.removeItem('scrollTo');
            }

            const scrollTopBtn = document.querySelector('.scroll-top-btn');
            if (scrollTopBtn) {
                scrollTopBtn.style.display = 'none';
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        scrollTopBtn.style.display = 'flex';
                    } else {
                        scrollTopBtn.style.display = 'none';
                    }
                });

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