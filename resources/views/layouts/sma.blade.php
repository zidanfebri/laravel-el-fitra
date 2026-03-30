<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>{{ __('messages.site_name') }}</title>
    
    <link href="{{ asset('css/app.css') }}?v=17" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flag-icons@7.2.3/css/flag-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg py-1 sticky-top">
        <div class="container-fluid px-lg-5 px-3"> 
            <a class="navbar-brand d-flex align-items-center sitename-orange" href="{{ route('home') }}">
                <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name_menu') }}" width="40" class="me-2 rounded-circle">
                {{ __('messages.site_name_menu') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ __('messages.profil_sma') }} <i class="bi bi-chevron-down ms-1"></i></a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}#tentang-kami">{{ __('messages.about_us') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}#jenjang">{{ __('messages.vision_mission') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}#fasilitas">{{ __('messages.facilities') }}</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ __('messages.program') }} <i class="bi bi-chevron-down ms-1"></i></a>
                        <ul class="dropdown-menu border-0 shadow">
                            <li><a class="dropdown-item" href="{{ route('jenjang.tk') }}">{{ __('messages.tk') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sd') }}">{{ __('messages.sd') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.smp') }}">{{ __('messages.smp') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}">{{ __('messages.sma') }}</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('admission.alur') }}">{{ __('messages.admission') }}</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle p-0 d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                            <span class="fi fi-{{ app()->getLocale() == 'id' ? 'id' : 'gb' }}"></span>
                            <i class="bi bi-chevron-down ms-1 icon-small"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'en') }}"><span class="fi fi-gb me-2"></span>EN</a></li>
                            <li><a class="dropdown-item" href="{{ route('language.switch', 'id') }}"><span class="fi fi-id me-2"></span>ID</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link sound-toggle p-0" href="#" id="soundToggle"><i class="bi bi-volume-up-fill"></i></a></li>

                    <li class="nav-item"><a class="nav-link btn-orange-nav" href="{{ route('pendaftaran.check') }}">{{ __('messages.registration') }}</a></li>
                    <li class="nav-item">@auth <form action="{{ route('logout') }}" method="POST" class="d-inline">@csrf<button type="submit" class="nav-link btn-orange-nav btn-logout-dark">{{ __('messages.logout') }}</button></form> @else <a class="nav-link btn-orange-nav" href="{{ route('login') }}">{{ __('messages.login') }}</a> @endauth</li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer py-4">
        <div class="container-fluid px-lg-5 px-3"> 
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="d-flex align-items-center"><img src="{{ asset('images/elfitra.jpeg') }}" width="40" class="me-2 rounded-circle">{{ __('messages.site_name_menu') }}</h5>
                    <p>{{ __('messages.footer_about_us') }}</p>
                    <div class="footer-social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.instagram.com/smaelfitra_official/"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>{{ __('messages.footer_links') }}</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li><a href="{{ route('pendaftaran.check') }}">{{ __('messages.registration') }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>{{ __('messages.footer_contact') }}</h5>
                    <p class="small mb-2"><i class="bi bi-geo-alt-fill text-orange me-2"></i>{{ __('messages.address_sma') }}</p>
                    <p class="small mb-1"><i class="bi bi-envelope-fill text-orange me-2"></i> info@elfitra.sch.id</p>
                    <div class="mt-3"><button type="button" class="btn btn-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#waModal"><i class="bi bi-whatsapp me-1"></i> {{ __('messages.whatsapp_contact') }}</button></div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>{{ __('messages.our_location') }}</h5>
                    <div class="map-responsive">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.750377488959!2d107.66579627410528!3d-6.920409893079234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7e171b3e1f3%3A0x8929e061730076f8!2sSMA%20El%20Fitra!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            width="100%" 
                            height="150" 
                            style="border:0; border-radius:10px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p class="mb-0">{{ __('messages.footer_copyright') }}</p>
                <p class="mb-0 mt-2">{{ __('messages.total_visits') }}: <span class="visit-count">{{ \App\Models\Visit::first()->sma_count ?? 0 }}</span></p>
            </div>
        </div>
    </footer>

    <button class="scroll-top-btn"><i class="bi bi-arrow-up"></i></button>
    <a href="#" class="whatsapp-button" data-bs-toggle="modal" data-bs-target="#waModal"><i class="bi bi-whatsapp"></i></a>

    <div class="modal fade" id="waModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-success text-white">
                    <h6 class="modal-title"><i class="bi bi-whatsapp me-2"></i>Contact Unit</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/628123456789" target="_blank" class="btn btn-outline-success text-start">TK El Fitra</a>
                        <a href="https://wa.me/628123456789" target="_blank" class="btn btn-outline-success text-start">SD El Fitra</a>
                        <a href="https://wa.me/628123456789" target="_blank" class="btn btn-outline-success text-start">SMP El Fitra</a>
                        <a href="https://wa.me/6285793526478" target="_blank" class="btn btn-outline-success text-start">SMA El Fitra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>