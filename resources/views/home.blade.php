@extends('layouts.app')

@section('content')
    <!-- Home Hero -->
    <section id="home" class="hero-area">
        <div class="video-container">
            <video id="heroVideo" class="d-block w-100" loop playsinline preload="auto">
                <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="position-absolute top-50 start-50 translate-middle text-center">
                <h1 class="slider-text-fixed">{{ __('messages.site_name') }}</h1>
            </div>
            <button id="videoControl" class="video-control-btn" type="button" title="{{ __('messages.play_pause') }}">
                <i class="bi bi-play-fill"></i>
            </button>
        </div>
    </section>

    @if (session('success'))
        <div class="container mt-4">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Tentang Kami -->
    <section id="tentang-kami" class="section">
        <div class="container">
            <div class="tentang-kami-container">
                <div class="tentang-kami-image">
                    <img src="{{ asset('images/el.jpeg') }}" alt="{{ __('messages.about_us') }}" class="img-fluid">
                </div>
                <div class="tentang-kami-content">
                    <div class="section-header">
                        <h2>{{ __('messages.about_us_title') }}</h2>
                        <p class="lead">{{ __('messages.about_us_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jenjang Pendidikan -->
    <section id="jenjang" class="jenjang-section">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.education_levels') }}</h2>
                <p class="lead text-center mb-5">{{ __('messages.education_levels_description') }}</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.tk') }}">
                            <img src="{{ asset('images/get.jpeg') }}" alt="{{ __('messages.tk') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.tk') }}" class="course-title">{{ __('messages.tk') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.tk_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.sd') }}">
                            <img src="{{ asset('images/get.jpeg') }}" alt="{{ __('messages.sd') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.sd') }}" class="course-title">{{ __('messages.sd') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.sd_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.smp') }}">
                            <img src="{{ asset('images/get.jpeg') }}" alt="{{ __('messages.smp') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.smp') }}" class="course-title">{{ __('messages.smp') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.smp_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.sma') }}">
                            <img src="{{ asset('images/get.jpeg') }}" alt="{{ __('messages.sma') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.sma') }}" class="course-title">{{ __('messages.sma') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.sma_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section id="fasilitas" class="fasilitas-section">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.facilities') }}</h2>
                <p class="lead text-center mb-3">{{ __('messages.facilities_description') }}</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp">
                        <i class="bi bi-building"></i>
                        <p>{{ __('messages.facility_building') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-1s">
                        <i class="bi bi-shop"></i>
                        <p>{{ __('messages.facility_canteen') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="bi bi-basket3"></i>
                        <p>{{ __('messages.facility_field') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-3s">
                        <i class="bi bi-cup-straw"></i>
                        <p>{{ __('messages.facility_lunch') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-4s">
                        <i class="bi bi-book-half"></i>
                        <p>{{ __('messages.facility_library') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-5s">
                        <i class="bi bi-hourglass-split"></i>
                        <p>{{ __('messages.facility_lab') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-6s">
                        <i class="bi bi-person-video2"></i>
                        <p>{{ __('messages.facility_hall') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="fasilitas-item animate__animated animate__fadeInUp animate__delay-7s">
                        <i class="bi bi-door-open"></i>
                        <p>{{ __('messages.facility_prayer_room') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita -->
    <section id="berita" class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.news_title') }}</h2>
                <p class="lead text-center mb-5">{{ __('messages.news_description') }}</p>
            </div>
            <div class="news-container" data-section="berita">
                <div class="news-wrapper">
                    @php
                        $beritas = \App\Models\Berita::all()->chunk(3);
                    @endphp
                    @foreach ($beritas as $index => $group)
                        <div class="row news-group {{ $index === 0 ? 'active' : '' }}" style="display: {{ $index === 0 ? 'flex' : 'none' }};">
                            @foreach ($group as $berita)
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="news-item">
                                        <a href="{{ route('berita.detail', $berita->id) }}">
                                            <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}" class="img-fluid">
                                        </a>
                                        <h5><a href="{{ route('berita.detail', $berita->id) }}">{{ app()->getLocale() === 'en' && $berita->judul_en ? $berita->judul_en : $berita->judul }}</a></h5>
                                        <p>{{ app()->getLocale() === 'en' && $berita->deskripsi_en ? Str::limit($berita->deskripsi_en, 50) : Str::limit($berita->deskripsi, 50) }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @for ($i = count($group); $i < 3; $i++)
                                <div class="col-lg-4 col-md-6 mb-3"></div>
                            @endfor
                        </div>
                    @endforeach
                </div>
                @if (count($beritas) > 1)
                    <button class="news-prev btn btn-success" type="button" data-section="berita">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="news-next btn btn-success" type="button" data-section="berita">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                    <div class="news-pagination text-center mt-10">
                        @for ($i = 0; $i < count($beritas); $i++)
                            <span class="page-number {{ $i === 0 ? 'active' : '' }}" role="button" tabindex="0" data-index="{{ $i }}">{{ $i + 1 }}</span>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section id="pendaftaran" class="pendaftaran-section">
        <div class="bg-parallax"></div>
        <div class="pendaftaran-content">
            <h2>{{ __('messages.registration_title') }}</h2>
            <p class="lead">{{ __('messages.registration_description') }}</p>
            <a href="{{ route('pendaftaran.step1') }}" class="main-button" style="background: #ffffff; color: #ff5722; border: 2px solid #ff5722;">
                {{ __('messages.register_now') }}
            </a>
        </div>
    </section>

    <!-- Statistik -->
    <section id="statistik" class="statistik-section">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.statistics_title') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="statistik-box">
                        <h4 class="stat-title">{{ __('messages.tk') }}</h4>
                        <p class="stat-number" data-target="1000">0</p>
                        <p class="stat-label">{{ __('messages.students') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="statistik-box">
                        <h4 class="stat-title">{{ __('messages.sd') }}</h4>
                        <p class="stat-number" data-target="3600">0</p>
                        <p class="stat-label">{{ __('messages.students') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="statistik-box">
                        <h4 class="stat-title">{{ __('messages.smp') }}</h4>
                        <p class="stat-number" data-target="4000">0</p>
                        <p class="stat-label">{{ __('messages.students') }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="statistik-box">
                        <h4 class="stat-title">{{ __('messages.sma') }}</h4>
                        <p class="stat-number" data-target="3200">0</p>
                        <p class="stat-label">{{ __('messages.students') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="edu-partner" class="section bg-white">
        <div class="container">
            <div class="section-header text-center">
                <h2>{{ __('messages.edu') }}</h2>
                <p class="lead mb-5">{{ __('messages.text_edu') }}</p>
            </div>
            
            <div class="row align-items-center justify-content-center gap-4">
                <div class="col-6 col-md-2">
                    <img src="{{ asset('images/kumon.jfif') }}" class="img-fluid grayscale" alt="Partner">
                </div>
                <div class="col-6 col-md-2">
                    <img src="{{ asset('images/nazar.png') }}" class="img-fluid grayscale" alt="Partner">
                </div>
                <div class="col-6 col-md-2">
                    <img src="{{ asset('images/im3.png') }}" class="img-fluid grayscale" alt="Partner">
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Video Control
            const video = document.getElementById('heroVideo');
            const videoControlBtn = document.getElementById('videoControl');
            const soundToggleBtn = document.getElementById('soundToggle');

            if (video && videoControlBtn && soundToggleBtn) {
                console.log('Video element found:', video);
                console.log('Video source:', video.currentSrc);

                // Update sound toggle icon
                const updateSoundIcon = () => {
                    soundToggleBtn.innerHTML = video.muted ? 
                        '<i class="bi bi-volume-mute-fill"></i>' : 
                        '<i class="bi bi-volume-up-fill"></i>';
                    soundToggleBtn.setAttribute('title', video.muted ? 
                        '{{ __('messages.toggle_sound') }}: Unmute' : 
                        '{{ __('messages.toggle_sound') }}: Mute');
                    console.log('Sound state:', video.muted ? 'muted' : 'unmuted');
                };

                // Update play/pause icon
                const updatePlayIcon = () => {
                    videoControlBtn.innerHTML = video.paused ? 
                        '<i class="bi bi-play-fill"></i>' : 
                        '<i class="bi bi-pause-fill"></i>';
                    videoControlBtn.setAttribute('title', video.paused ? 
                        '{{ __('messages.play_pause') }}: Play' : 
                        '{{ __('messages.play_pause') }}: Pause');
                };

                // Attempt to play video with sound
                video.muted = true;
                const playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        console.log('Video started playing with sound');
                        updatePlayIcon();
                        updateSoundIcon();
                    }).catch(error => {
                        console.warn('Autoplay with sound failed:', error.message);
                        video.muted = true; // Fallback to muted
                        updateSoundIcon();
                        video.play().then(() => {
                            console.log('Video started playing muted');
                            updatePlayIcon();
                        }).catch(err => {
                            console.error('Muted playback failed:', err);
                            updatePlayIcon();
                            updateSoundIcon();
                            alert('Video playback failed. Please check the video file or click the play button.');
                        });
                    });
                }

                // Video control button: single click for play/pause, double-click for mute/unmute
                videoControlBtn.addEventListener('click', () => {
                    if (video.paused) {
                        video.play().then(() => {
                            console.log('Video played manually');
                            updatePlayIcon();
                        }).catch(err => {
                            console.error('Manual play failed:', err);
                            alert('Failed to play video. Please check the video file or browser settings.');
                        });
                    } else {
                        video.pause();
                        console.log('Video paused');
                        updatePlayIcon();
                    }
                });

                videoControlBtn.addEventListener('dblclick', () => {
                    video.muted = !video.muted;
                    console.log('Double-click: Sound toggled to', video.muted ? 'muted' : 'unmuted');
                    updateSoundIcon();
                });

                // Navbar sound toggle button
                soundToggleBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    video.muted = !video.muted;
                    console.log('Navbar sound toggle:', video.muted ? 'muted' : 'unmuted');
                    updateSoundIcon();
                    // Attempt to play if paused after unmute
                    if (!video.muted && video.paused) {
                        video.play().then(() => {
                            console.log('Video played after unmute');
                            updatePlayIcon();
                        }).catch(err => console.error('Play after unmute failed:', err));
                    }
                });

                // Handle video errors
                video.addEventListener('error', (e) => {
                    console.error('Video error:', e);
                    alert('Error loading video. Please check if the file exists and is in a supported format (e.g., MP4 with H.264/AAC).');
                });

                // Initialize icons
                updatePlayIcon();
                updateSoundIcon();
            } else {
                console.error('Video or control elements not found:', { video, videoControlBtn, soundToggleBtn });
            }

            // Statistik Animation
            const statNumbers = document.querySelectorAll('.stat-number');
            const animateStats = () => {
                statNumbers.forEach(number => {
                    const target = parseInt(number.getAttribute('data-target'));
                    let current = 0;
                    const increment = target / 100;
                    const updateNumber = () => {
                        if (current < target) {
                            current += increment;
                            number.textContent = Math.floor(current).toLocaleString();
                            requestAnimationFrame(updateNumber);
                        } else {
                            number.textContent = target.toLocaleString();
                        }
                    };
                    updateNumber();
                });
            };

            // Intersection Observer for stats
            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            statsObserver.observe(document.getElementById('statistik'));

            // Animate on scroll for other sections
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.section, .hero-area').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'all 0.6s ease';
                observer.observe(section);
            });

            // Berita Pagination
            const beritaContainer = document.querySelector('#berita .news-container');
            if (beritaContainer) {
                const newsPrevButton = beritaContainer.querySelector('.news-prev');
                const newsNextButton = beritaContainer.querySelector('.news-next');
                const newsGroups = beritaContainer.querySelectorAll('.news-group');
                const newsPageNumbers = beritaContainer.querySelectorAll('.news-pagination .page-number');
                let newsCurrentGroup = 0;

                console.log('Berita: Found ' + newsGroups.length + ' groups');
                console.log('Berita: Previous button ' + (newsPrevButton ? 'found' : 'not found'));
                console.log('Berita: Next button ' + (newsNextButton ? 'found' : 'not found'));
                console.log('Berita: Page numbers ' + newsPageNumbers.length + ' found');

                function updateBeritaNavigation() {
                    newsGroups.forEach((group, index) => {
                        group.style.display = index === newsCurrentGroup ? 'flex' : 'none';
                        group.classList.toggle('active', index === newsCurrentGroup);
                    });
                    newsPageNumbers.forEach((page, index) => {
                        page.classList.toggle('active', index === newsCurrentGroup);
                    });
                    if (newsPrevButton) {
                        newsPrevButton.style.display = newsCurrentGroup === 0 ? 'none' : 'block';
                    }
                    if (newsNextButton) {
                        newsNextButton.style.display = newsCurrentGroup === newsGroups.length - 1 ? 'none' : 'block';
                    }
                    console.log('Berita: Showing group ' + (newsCurrentGroup + 1));
                }

                if (newsGroups.length > 1 && newsPrevButton && newsNextButton && newsPageNumbers.length > 0) {
                    newsPrevButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Berita: Previous button clicked');
                        if (newsCurrentGroup > 0) {
                            newsGroups[newsCurrentGroup].style.display = 'none';
                            newsPageNumbers[newsCurrentGroup].classList.remove('active');
                            newsCurrentGroup--;
                            updateBeritaNavigation();
                        }
                    });

                    newsNextButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Berita: Next button clicked');
                        if (newsCurrentGroup < newsGroups.length - 1) {
                            newsGroups[newsCurrentGroup].style.display = 'none';
                            newsPageNumbers[newsCurrentGroup].classList.remove('active');
                            newsCurrentGroup++;
                            updateBeritaNavigation();
                        }
                    });

                    newsPageNumbers.forEach((page, index) => {
                        page.addEventListener('click', function(e) {
                            e.preventDefault();
                            console.log('Berita: Page number ' + (index + 1) + ' clicked');
                            newsGroups[newsCurrentGroup].style.display = 'none';
                            newsPageNumbers[newsCurrentGroup].classList.remove('active');
                            newsCurrentGroup = index;
                            updateBeritaNavigation();
                        });
                    });

                    updateBeritaNavigation();
                } else {
                    if (newsPrevButton) newsPrevButton.style.display = 'none';
                    if (newsNextButton) newsNextButton.style.display = 'none';
                    console.log('Berita: Not enough groups or buttons missing, hiding navigation');
                }
            } else {
                console.error('Berita: .news-container not found');
            }
        });
    </script>
@endsection