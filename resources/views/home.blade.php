@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <!-- Image Slider -->
        <div id="imageSlider" class="carousel slide carousel-fade slider-container" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/coba.jpg') }}" class="d-block w-100" alt="{{ __('messages.slider_1') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">{{ __('messages.site_name') }}</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/coba1.jpg') }}" class="d-block w-100" alt="{{ __('messages.slider_2') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">{{ __('messages.site_name') }}</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/coba2.jpg') }}" class="d-block w-100" alt="{{ __('messages.slider_3') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">{{ __('messages.site_name') }}</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('messages.previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('messages.next') }}</span>
            </button>
        </div>

        <!-- Tentang Kami -->
        <div class="content-section" id="tentang-kami">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="tentang-kami-container">
                        <div class="col-12 col-md-5">
                            <img src="{{ asset('images/el.jpeg') }}" alt="{{ __('messages.about_us') }}" class="img-fluid rounded tentang-kami-image" loading="lazy">
                        </div>
                        <div class="col-12 col-md-7">
                            <h1 class="tentang-kami-title">{{ __('messages.about_us_title') }}</h1>
                            <p class="tentang-kami-text">{{ __('messages.about_us_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <h2 class="text-center mb-4">{{ __('messages.education_levels') }}</h2>
                    <div class="row mt-2 text-center">
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('jenjang.tk') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card tk">
                                    <i class="bi bi-person-circle"></i>
                                    <h4 class="stat-jenjang">{{ __('messages.tk') }}</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('jenjang.sd') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card sd">
                                    <i class="bi bi-book"></i>
                                    <h4 class="stat-jenjang">{{ __('messages.sd') }}</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('jenjang.smp') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card smp">
                                    <i class="bi bi-mortarboard"></i>
                                    <h4 class="stat-jenjang">{{ __('messages.smp') }}</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <a href="{{ route('jenjang.sma') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card sma">
                                    <i class="bi bi-award"></i>
                                    <h4 class="stat-jenjang">{{ __('messages.sma') }}</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="fasilitas-card">
                        <div class="col-md-12">
                            <h2 class="text-center">{{ __('messages.facilities') }}</h2>
                            <div class="row text-center mt-4">
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-building"></i>
                                    <p class="card-text">{{ __('messages.facility_building') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-shop"></i>
                                    <p class="card-text">{{ __('messages.facility_canteen') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-basket3"></i>
                                    <p class="card-text">{{ __('messages.facility_field') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-cup-straw"></i>
                                    <p class="card-text">{{ __('messages.facility_lunch') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-book-half"></i>
                                    <p class="card-text">{{ __('messages.facility_library') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-hourglass-split"></i>
                                    <p class="card-text">{{ __('messages.facility_lab') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-person-video2"></i>
                                    <p class="card-text">{{ __('messages.facility_hall') }}</p>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <i class="bi bi-door-open"></i>
                                    <p class="card-text">{{ __('messages.facility_prayer_room') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Berita -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <h2 class="text-center mb-4" style="margin-top: 30px;">{{ __('messages.news_title') }}</h2>
                    <div class="news-container">
                        <div class="news-wrapper">
                            @php
                                $beritas = \App\Models\Berita::all()->chunk(3);
                            @endphp
                            @foreach ($beritas as $index => $group)
                                <div class="row news-group {{ $index === 0 ? 'active' : '' }}">
                                    @foreach ($group as $berita)
                                        <div class="col-12 col-md-4 mb-3">
                                            <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none">
                                                <div class="news-item">
                                                    <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}" class="img-fluid rounded" loading="lazy">
                                                    <h5 class="mt-2">{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}</h5>
                                                    <p>{{ app()->getLocale() === 'en' && $berita->deskripsi_en ? Str::limit($berita->deskripsi_en, 50) : Str::limit($berita->deskripsi, 50) }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    @for ($i = count($group); $i < 3; $i++)
                                        <div class="col-12 col-md-4 mb-3"></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>
                        @if (count($beritas) > 1)
                            <button class="news-prev btn btn-success" type="button">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="news-next btn btn-success" type="button">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                            <div class="news-pagination text-center mt-3">
                                @for ($i = 0; $i < count($beritas); $i++)
                                    <span class="page-number {{ $i === 0 ? 'active' : '' }}" role="button" tabindex="0">{{ $i + 1 }}</span>
                                @endfor
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendaftaran -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="registration-image">
                        <div class="registration-text text-center">
                            <h2 class="text-black">{{ __('messages.registration_title') }}</h2>
                            <a href="{{ route('pendaftaran.step1') }}" class="btn btn-dark text-white mt-2">{{ __('messages.register_now') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <h2 class="text-center mb-4" style="margin-top: 30px;">{{ __('messages.statistics_title') }}</h2>
                    <div class="row text-center mt-2">
                        <div class="col-6 col-md-3 mb-3">
                            <div class="statistik-box tk">
                                <h4 class="stat-title">{{ __('messages.tk') }}</h4>
                                <p class="stat-number" data-target="1000">0</p>
                                <p class="stat-label">{{ __('messages.students') }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="statistik-box sd">
                                <h4 class="stat-title">{{ __('messages.sd') }}</h4>
                                <p class="stat-number" data-target="3600">0</p>
                                <p class="stat-label">{{ __('messages.students') }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="statistik-box smp">
                                <h4 class="stat-title">{{ __('messages.smp') }}</h4>
                                <p class="stat-number" data-target="4000">0</p>
                                <p class="stat-label">{{ __('messages.students') }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="statistik-box sma">
                                <h4 class="stat-title">{{ __('messages.sma') }}</h4>
                                <p class="stat-number" data-target="3200">0</p>
                                <p class="stat-label">{{ __('messages.students') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Prevent browser scroll restoration
            if ('scrollRestoration' in history) {
                history.scrollRestoration = 'manual';
                console.log('Scroll restoration set to manual');
            }

            // Prevent auto-focus
            if (document.activeElement !== document.body) {
                document.activeElement.blur();
                console.log('Blurred active element to prevent auto-scroll');
            }

            // Log scroll events for debugging
            window.addEventListener('scroll', function() {
                console.log('Scroll event triggered, scrollY:', window.scrollY, 'Source:', document.activeElement);
            });

            // Intersection Observer for smooth section reveal
            const sections = document.querySelectorAll('.content-section');
            const observerOptions = {
                root: null,
                threshold: 0.1,
                rootMargin: '0px' // Adjusted to prevent premature triggering
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        console.log('Section visible:', entry.target.id || 'no-id');
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });

            // News Pagination
            const newsPrevButton = document.querySelector('.news-prev');
            const newsNextButton = document.querySelector('.news-next');
            const newsGroups = document.querySelectorAll('.news-group');
            const newsPageNumbers = document.querySelectorAll('.news-pagination .page-number');
            let newsCurrentGroup = 0;

            if (newsGroups.length > 1 && newsPrevButton && newsNextButton && newsPageNumbers.length > 0) {
                newsPrevButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('News prev clicked');
                    newsGroups[newsCurrentGroup].classList.remove('active');
                    newsPageNumbers[newsCurrentGroup].classList.remove('active');
                    newsCurrentGroup = (newsCurrentGroup - 1 + newsGroups.length) % newsGroups.length;
                    newsGroups[newsCurrentGroup].classList.add('active');
                    newsPageNumbers[newsCurrentGroup].classList.add('active');
                });

                newsNextButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('News next clicked');
                    newsGroups[newsCurrentGroup].classList.remove('active');
                    newsPageNumbers[newsCurrentGroup].classList.remove('active');
                    newsCurrentGroup = (newsCurrentGroup + 1) % newsGroups.length;
                    newsGroups[newsCurrentGroup].classList.add('active');
                    newsPageNumbers[newsCurrentGroup].classList.add('active');
                });

                newsPageNumbers.forEach((page, index) => {
                    page.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('News page clicked:', index + 1);
                        newsGroups[newsCurrentGroup].classList.remove('active');
                        newsPageNumbers[newsCurrentGroup].classList.remove('active');
                        newsCurrentGroup = index;
                        newsGroups[newsCurrentGroup].classList.add('active');
                        newsPageNumbers[newsCurrentGroup].classList.add('active');
                    });
                });
            }

            // Statistik Animation
            const statNumbers = document.querySelectorAll('.stat-number');
            if (statNumbers) {
                statNumbers.forEach(number => {
                    const target = parseInt(number.getAttribute('data-target'));
                    let current = 0;
                    const increment = target / 50;
                    const updateNumber = () => {
                        if (current < target) {
                            current += increment;
                            number.textContent = Math.round(current);
                            requestAnimationFrame(updateNumber);
                        } else {
                            number.textContent = target;
                            number.classList.add('animated');
                        }
                    };
                    const statObserver = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting) {
                            console.log('Stat number visible, starting animation');
                            updateNumber();
                            statObserver.unobserve(number);
                        }
                    }, { threshold: 0.5 });
                    statObserver.observe(number);
                });
            }

            // Prevent empty anchor clicks
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                        console.log('Prevented empty anchor scroll');
                    }
                });
            });
        });
    </script>
@endsection