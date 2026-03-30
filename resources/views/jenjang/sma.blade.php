<!-- resources/views/jenjang/sma.blade.php -->
@extends('layouts.sma')

@section('content')
    <section id="home" class="hero-area">
        <div class="video-container">
            <video id="heroVideo" class="d-block w-100" loop playsinline loading="lazy">
                <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="position-absolute top-50 start-50 translate-middle text-center">
                <h1 class="slider-text-fixed">SMA {{ __('messages.site_name') }}</h1>
            </div>
            <button id="videoControl" class="video-control-btn" type="button" title="{{ __('messages.play_pause') }}">
                <i class="bi bi-play-fill"></i>
            </button>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section id="tentang-kami" class="section animate__animated animate__fadeIn">
        <div class="container">
            <div class="tentang-kami-container">
                <div class="tentang-kami-image">
                    <img src="{{ asset('images/el.jpeg') }}" alt="{{ __('messages.about_us') }}" class="img-fluid rounded-lg shadow-sm">
                </div>
                <div class="tentang-kami-content">
                    <div class="section-header">
                        <h2>{{ __('messages.about_us_title') }}</h2>
                        <p class="lead">{{ app()->getLocale() === 'en' ? __('messages.about_us_text_en') : __('messages.about_us_text_en') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi -->
    <section id="lokasi" class="section animate__animated animate__fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.location') }}</h2>
                <p class="lead text-center mb-5">{{ __('messages.location_description') }}</p>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <div class="lokasi-content card h-100 p-4">
                        <h3 class="mb-3">{{ __('messages.our_address') }}</h3>
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-geo-alt-fill me-3 text-primary" style="font-size: 1.5rem;"></i>
                            <div>
                                <strong>{{ __('messages.address') }}:</strong>
                                <p class="mb-0">{{ __('messages.address_sma') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-telephone-fill me-3 text-primary" style="font-size: 1.5rem;"></i>
                            <div>
                                <strong>{{ __('messages.phone') }}:</strong>
                                <p class="mb-0">{{ __('messages.telfon_sma') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-envelope-fill me-3 text-primary" style="font-size: 1.5rem;"></i>
                            <div>
                                <strong>{{ __('messages.email') }}:</strong>
                                <p class="mb-0">{{ __('messages.email_sma') }}</p>
                            </div>
                        </div>
                        <a href="https://www.google.com/maps/place/SMA+EL+FITRA/@-6.9379241,107.6441234,6073m/data=!3m1!1e3!4m12!1m5!3m4!2zNsKwNTUnNTYuNSJTIDEwN8KwMzgnNTIuNCJF!8m2!3d-6.93237!4d107.6479!3m5!1s0x2e68c35eec6588bd:0xa880221b4d816b11!8m2!3d-6.9388896!4d107.6797333!16s%2Fg%2F11xm5m791c?entry=ttu&g_ep=EgoyMDI1MDkxNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="main-button mt-3">{{ __('messages.open_in_google_maps') }}
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="lokasi-map card h-100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.902260677367!2d107.6777333!3d-6.9388896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c35eec6588bd%3A0xa880221b4d816b11!2sSMA%20EL%20FITRA!5e0!3m2!1sen!2sid!4v1634567890123!5m2!1sen!2sid" 
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 15px;" 
                        allowfullscreen="" 
                        loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision, Mission, and Target Lulusan -->
    <section id="jenjang" class="jenjang-section animate__animated animate__fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.vision_mission_target') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="jenjang-card text-center">
                        <img src="{{ asset('images/navbar1.jpg') }}" alt="{{ __('messages.vision') }}" class="img-fluid">
                        <a class="course-title">{{ __('messages.vision') }}</a>
                        <div class="teks-visimisi">
                            <p>{{ app()->getLocale() === 'en' ? 'To become an educational institution that produces virtuous Muslim scholars.' : 'Menjadi lembaga pendidikan yang mencetak cendekiawan muslim berakhlakul karimah' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="#">
                            <img src="{{ asset('images/navbar1.jpg') }}" alt="{{ __('messages.mission') }}" class="img-fluid">
                        </a>
                        <a href="#" class="course-title">{{ __('messages.mission') }}</a>
                        <div class="teks-visimisi">
                            <ul>
                                <li>{{ app()->getLocale() === 'en' ? 'Preparing competent and exemplary educators and staff.' : 'Menyiapkan tenaga pendidik dan kependidikan yang kompeten dan teladan' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Developing interactive learning materials and media.' : 'Mengembangkan materi dan media pembelajaran yang interaktif' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Developing science and technology-based learning methods.' : 'Mengembangkan pola pembelajaran berbasis sains dan teknologi' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Training students in positive and productive habits.' : 'Melatih pembiasaan siswa yang positif dan produktif' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="#">
                            <img src="{{ asset('images/navbar1.jpg') }}" alt="{{ __('messages.target_graduates') }}" class="img-fluid">
                        </a>
                        <a href="#" class="course-title">{{ __('messages.target_graduates') }}</a>
                        <div class="teks-visimisi">
                            <ul>
                                <li>{{ app()->getLocale() === 'en' ? 'Virtuous Muslim scholars.' : 'Cendekiawan muslim yang berakhlak mulia' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Competitive graduates for top universities.' : 'Lulusan kompetitif untuk universitas ternama' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Visionary and responsible leaders.' : 'Pemimpin yang visioner dan bertanggung jawab' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Creative and innovative individuals in technology.' : 'Individu kreatif dan inovatif dalam teknologi' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Program -->
    <section id="program" class="jenjang-section animate__animated animate__fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.program') }}</h2>
                <p class="lead text-center mb-5">{{ __('messages.program_description') }}</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.sma.unggulan-akademik') }}">
                            <img src="{{ asset('images/navbar1.jpg') }}" alt="{{ __('messages.academic_prog') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.sma.unggulan-akademik') }}" class="course-title">{{ __('messages.academic_prog') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.academic_prog_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="jenjang-card text-center">
                        <a href="{{ route('jenjang.sma.ekstrakurikuler') }}">
                            <img src="{{ asset('images/navbar1.jpg') }}" alt="{{ __('messages.extracurricular_program') }}" class="img-fluid">
                        </a>
                        <a href="{{ route('jenjang.sma.ekstrakurikuler') }}" class="course-title">{{ __('messages.extracurricular_program') }}</a>
                        <div class="course-details">
                            <p>{{ __('messages.extracurricular_program_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities -->
    <section id="fasilitas" class="fasilitas-section animate__animated animate__fadeIn">
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

    <!-- Testimoni -->
    <section id="testimoni" class="news-section animate__animated animate__fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>{{ __('messages.testimonials') }}</h2>
                <p class="lead text-center mb-5">{{ __('messages.testimonials_description') }}</p>
            </div>
            <div class="news-container" data-section="testimoni">
                <div class="news-wrapper">
                    @php
                        $testimonis = \App\Models\Testimoni::all()->chunk(3);
                    @endphp
                    @foreach ($testimonis as $index => $group)
                        <div class="row news-group {{ $index === 0 ? 'active' : '' }}" style="display: {{ $index === 0 ? 'flex' : 'none' }};">
                            @foreach ($group as $testimoni)
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <div class="news-item">
                                        <a href="#">
                                            <img src="{{ $testimoni->gambar ? Storage::url($testimoni->gambar) : asset('images/placeholder.jpg') }}" alt="{{ $testimoni->nama }}" class="img-fluid rounded-lg">
                                        </a>
                                        <h5><a href="#">{{ app()->getLocale() === 'en' ? $testimoni->keterangan_en : $testimoni->keterangan }}</a></h5>
                                        <h5><a href="#">{{ $testimoni->nama }}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                            @for ($i = count($group); $i < 3; $i++)
                                <div class="col-lg-4 col-md-6 mb-3"></div>
                            @endfor
                        </div>
                    @endforeach
                </div>
                @if (count($testimonis) > 1)
                    <button class="news-prev btn btn-success" type="button" data-section="testimoni">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="news-next btn btn-success" type="button" data-section="testimoni">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                    <div class="news-pagination text-center mt-4">
                        @for ($i = 0; $i < count($testimonis); $i++)
                            <span class="page-number {{ $i === 0 ? 'active' : '' }}" role="button" tabindex="0" data-index="{{ $i }}">{{ $i + 1 }}</span>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Spacer between Testimonial and Pendaftaran -->
    <div style="height: 30px;"></div>

    <!-- Pendaftaran CTA -->
    <section id="pendaftaran" class="pendaftaran-section animate__animated animate__fadeIn">
        <div class="bg-parallax"></div>
        <div class="pendaftaran-content">
            <h2>{{ __('messages.registration_title') }}</h2>
            <p class="lead">{{ __('messages.registration_description') }}</p>
            <a href="{{ route('pendaftaran.step1') }}" class="main-button" style="background: #ffffff; color: #ff5722; border: 2px solid #ff5722;">
                {{ __('messages.register_now') }}
            </a>
        </div>
    </section>

    <!-- News -->
    <section id="berita" class="news-section animate__animated animate__fadeInUp">
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
                                            <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ app()->getLocale() === 'en' ? $berita->judul_en : $berita->judul }}" class="img-fluid rounded-lg">
                                        </a>
                                        <h5><a href="{{ route('berita.detail', $berita->id) }}">{{ app()->getLocale() === 'en' ? $berita->judul_en : $berita->judul }}</a></h5>
                                        <p>{{ app()->getLocale() === 'en' ? Str::limit($berita->deskripsi_en, 50) : Str::limit($berita->deskripsi, 50) }}</p>
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
                    <div class="news-pagination text-center mt-4">
                        @for ($i = 0; $i < count($beritas); $i++)
                            <span class="page-number {{ $i === 0 ? 'active' : '' }}" role="button" tabindex="0" data-index="{{ $i }}">{{ $i + 1 }}</span>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
                video.muted = false;
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

            // News Pagination (Berita)
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

            // Testimoni Pagination
            const testimoniContainer = document.querySelector('#testimoni .news-container');
            if (testimoniContainer) {
                const testiPrevButton = testimoniContainer.querySelector('.news-prev');
                const testiNextButton = testimoniContainer.querySelector('.news-next');
                const testiGroups = testimoniContainer.querySelectorAll('.news-group');
                const testiPageNumbers = testimoniContainer.querySelectorAll('.news-pagination .page-number');
                let testiCurrentGroup = 0;

                console.log('Testimoni: Found ' + testiGroups.length + ' groups');
                console.log('Testimoni: Previous button ' + (testiPrevButton ? 'found' : 'not found'));
                console.log('Testimoni: Next button ' + (testiNextButton ? 'found' : 'not found'));
                console.log('Testimoni: Page numbers ' + testiPageNumbers.length + ' found');

                function updateTestimoniNavigation() {
                    testiGroups.forEach((group, index) => {
                        group.style.display = index === testiCurrentGroup ? 'flex' : 'none';
                        group.classList.toggle('active', index === testiCurrentGroup);
                    });
                    testiPageNumbers.forEach((page, index) => {
                        page.classList.toggle('active', index === testiCurrentGroup);
                    });
                    if (testiPrevButton) {
                        testiPrevButton.style.display = testiCurrentGroup === 0 ? 'none' : 'block';
                    }
                    if (testiNextButton) {
                        testiNextButton.style.display = testiCurrentGroup === testiGroups.length - 1 ? 'none' : 'block';
                    }
                    console.log('Testimoni: Showing group ' + (testiCurrentGroup + 1));
                }

                if (testiGroups.length > 1 && testiPrevButton && testiNextButton && testiPageNumbers.length > 0) {
                    testiPrevButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Testimoni: Previous button clicked');
                        if (testiCurrentGroup > 0) {
                            testiGroups[testiCurrentGroup].style.display = 'none';
                            testiPageNumbers[testiCurrentGroup].classList.remove('active');
                            testiCurrentGroup--;
                            updateTestimoniNavigation();
                        }
                    });

                    testiNextButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        console.log('Testimoni: Next button clicked');
                        if (testiCurrentGroup < testiGroups.length - 1) {
                            testiGroups[testiCurrentGroup].style.display = 'none';
                            testiPageNumbers[testiCurrentGroup].classList.remove('active');
                            testiCurrentGroup++;
                            updateTestimoniNavigation();
                        }
                    });

                    testiPageNumbers.forEach((page, index) => {
                        page.addEventListener('click', function(e) {
                            e.preventDefault();
                            console.log('Testimoni: Page number ' + (index + 1) + ' clicked');
                            testiGroups[testiCurrentGroup].style.display = 'none';
                            testiPageNumbers[testiCurrentGroup].classList.remove('active');
                            testiCurrentGroup = index;
                            updateTestimoniNavigation();
                        });
                    });

                    updateTestimoniNavigation();
                } else {
                    if (testiPrevButton) testiPrevButton.style.display = 'none';
                    if (testiNextButton) testiNextButton.style.display = 'none';
                    console.log('Testimoni: Not enough groups or buttons missing, hiding navigation');
                }
            } else {
                console.error('Testimoni: .news-container not found');
            }
        });
    </script>
@endsection