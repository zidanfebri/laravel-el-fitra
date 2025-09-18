@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <!-- Image Slider -->
        <div id="imageSlider" class="carousel slide carousel-fade slider-container" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/sd1.jpg') }}" class="d-block" alt="{{ __('messages.slider_1') }}" loading="lazy">
                    <div class="carousel-caption">
                        <h1 class="slider-text-fixed">SD EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/sd2.jpg') }}" class="d-block" alt="{{ __('messages.slider_2') }}" loading="lazy">
                    <div class="carousel-caption">
                        <h1 class="slider-text-fixed">SD EL-FITRA</h1>
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

        <div class="content-container">
            <!-- History -->
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="history-section">
                        <img src="{{ asset('images/el.jpeg') }}" alt="{{ __('messages.about_us') }}" loading="lazy">
                        <div class="history-text">
                            <h1>{{ __('messages.about_us_title') }}</h1>
                            <p>{{ app()->getLocale() === 'en' ? __('messages.about_us_text_en') : __('messages.about_us_text_en') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision and Mission -->
            <div class="content-section">
                <div class="row vision-mission animate__animated animate__fadeInUp container" style="margin-left: 85px;">
                    <div class="col-md-6">
                        <div class="card">
                            <h4 class="text-center">{{ __('messages.vision') }}</h4>
                            <p>{{ app()->getLocale() === 'en' ? 'To become a leading Islamic-based elementary school with virtuous character.' : 'Menjadikan SD El-Fitra sebagai pusat pendidikan dasar berbasis Islami yang unggul dan berakhlak mulia.' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h4 class="text-center">{{ __('messages.mission') }}</h4>
                            <ul>
                                <li>{{ app()->getLocale() === 'en' ? 'Providing quality learning.' : 'Menyediakan pembelajaran berkualitas.' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Building Islamic character in students.' : 'Membangun karakter Islami siswa.' }}</li>
                                <li>{{ app()->getLocale() === 'en' ? 'Supporting academic and extracurricular achievements.' : 'Mendukung prestasi akademik dan ekstrakurikuler.' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

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

            <!-- News -->
            <div class="content-section">
                <div class="row news-section animate__animated animate__fadeInUp">
                    <div class="col-12">
                        <h3 class="text-center" style="margin-top: 30px;">{{ __('messages.news_title') }}</h3>
                        <div class="news-container">
                            <div class="news-wrapper">
                                @php
                                    $beritas = \App\Models\Berita::all()->chunk(3);
                                @endphp
                                @foreach ($beritas as $index => $group)
                                    <div class="row news-group {{ $index === 0 ? 'active' : '' }}">
                                        @foreach ($group as $berita)
                                            <div class="col-md-4">
                                                <a href="{{ route('berita.detail', $berita->id) }}" class="text-decoration-none">
                                                    <div class="news-item">
                                                        <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ app()->getLocale() === 'en' ? $berita->judul_en : $berita->judul }}" class="img-fluid" loading="lazy">
                                                        <h5>{{ app()->getLocale() === 'en' ? $berita->judul_en : $berita->judul }}</h5>
                                                        <p>{{ app()->getLocale() === 'en' ? Str::limit($berita->deskripsi_en, 50) : Str::limit($berita->deskripsi, 50) }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        @for ($i = count($group); $i < 3; $i++)
                                            <div class="col-md-4"></div>
                                        @endfor
                                    </div>
                                @endforeach
                            </div>
                            @if (count($beritas) > 1)
                                <button class="news-prev btn btn-success">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="news-next btn btn-success">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                                <div class="news-pagination text-center mt-3">
                                    @for ($i = 0; $i < count($beritas); $i++)
                                        <span class="page-number {{ $i === 0 ? 'active' : '' }}">{{ $i + 1 }}</span>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row animate__animated animate__fadeInUp">
                    <div class="col-12">
                        <div class="registration-image" style="margin-top: 10px; margin-bottom: 30px;">
                            <div class="registration-text text-center">
                                <h2 class="text-black">{{ __('messages.registration_title') }}</h2>
                                <a href="{{ route('pendaftaran.step1') }}" class="btn btn-light mt-2">{{ __('messages.register_now') }}</a>
                            </div>
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

                // News Pagination
                const newsPrevButton = document.querySelector('.news-prev');
                const newsNextButton = document.querySelector('.news-next');
                const newsGroups = document.querySelectorAll('.news-group');
                const newsPageNumbers = document.querySelectorAll('.news-pagination .page-number');
                let newsCurrentGroup = 0;

                if (newsGroups.length > 1 && newsPrevButton && newsNextButton && newsPageNumbers.length > 0) {
                    newsPrevButton.addEventListener('click', function() {
                        newsGroups[newsCurrentGroup].classList.remove('active');
                        newsPageNumbers[newsCurrentGroup].classList.remove('active');
                        newsCurrentGroup = (newsCurrentGroup - 1 + newsGroups.length) % newsGroups.length;
                        newsGroups[newsCurrentGroup].classList.add('active');
                        newsPageNumbers[newsCurrentGroup].classList.add('active');
                    });

                    newsNextButton.addEventListener('click', function() {
                        newsGroups[newsCurrentGroup].classList.remove('active');
                        newsPageNumbers[newsCurrentGroup].classList.remove('active');
                        newsCurrentGroup = (newsCurrentGroup + 1) % newsGroups.length;
                        newsGroups[newsCurrentGroup].classList.add('active');
                        newsPageNumbers[newsCurrentGroup].classList.add('active');
                    });

                    newsPageNumbers.forEach((page, index) => {
                        page.addEventListener('click', function() {
                            newsGroups[newsCurrentGroup].classList.remove('active');
                            newsPageNumbers[newsCurrentGroup].classList.remove('active');
                            newsCurrentGroup = index;
                            newsGroups[newsCurrentGroup].classList.add('active');
                            newsPageNumbers[newsCurrentGroup].classList.add('active');
                        });
                    });
                }
            });
        </script>
    </div>
@endsection