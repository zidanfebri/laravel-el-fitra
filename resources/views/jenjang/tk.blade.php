@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div id="imageSlider" class="carousel slide carousel-fade slider-container" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/tk1.jpg') }}" class="d-block" alt="{{ __('messages.slider_1') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">TK EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/tk2.jpg') }}" class="d-block" alt="{{ __('messages.slider_2') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">TK EL-FITRA</h1>
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
            <div class="row vision-mission container" style="margin-left: 85px;">
                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center">{{ __('messages.vision') }}</h4>
                        <p>{{ app()->getLocale() === 'en' ? 'To become a leading Islamic-based early childhood education center with virtuous character.' : 'Menjadikan TK El-Fitra sebagai pusat pendidikan dini berbasis Islami yang unggul dan berakhlak mulia.' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center">{{ __('messages.mission') }}</h4>
                        <ul>
                            <li>{{ app()->getLocale() === 'en' ? 'Developing children\'s potential through Islamic learning.' : 'Mengembangkan potensi anak melalui pembelajaran Islami.' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Creating a fun learning environment.' : 'Menciptakan lingkungan belajar yang menyenangkan.' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Collaborating with parents for holistic education.' : 'Kolaborasi dengan orang tua untuk pendidikan holistik.' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row program-section">
                <div class="col-12">
                    <h3 class="text-center" style="margin-right: 45px;">{{ __('messages.program') }}</h3>
                    <div class="program-container">
                        <div class="program-wrapper">
                            <div class="program-group active">
                                <a href="{{ route('jenjang.sma.unggulan-akademik') }}" class="text-decoration-none">
                                    <div class="card">
                                        <i class="bi bi-book"></i>
                                        <h5>{{ __('messages.academic_program') }}</h5>
                                        <p>{{ __('messages.academic_program_desc') }}</p>
                                    </div>
                                </a>
                                <a href="{{ route('jenjang.sma.ekstrakurikuler') }}" class="text-decoration-none">
                                    <div class="card">
                                        <i class="bi bi-star"></i>
                                        <h5>{{ __('messages.extracurricular_program') }}</h5>
                                        <p>{{ __('messages.extracurricular_program_desc') }}</p>
                                    </div>
                                </a>
                            </div>
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

            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="registration-image" style="margin-top: 30px;">
                        <div class="registration-text text-center">
                            <h2 class="text-black">{{ __('messages.registration_title') }}</h2>
                            <a href="{{ route('pendaftaran.step1') }}" class="btn btn-light mt-2">{{ __('messages.register_now') }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- News -->
            <div class="row news-section">
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
                        @endif
                        <div class="news-pagination text-center mt-3">
                            @for ($i = 0; $i < count($beritas); $i++)
                                <span class="page-number {{ $i === 0 ? 'active' : '' }}">{{ $i + 1 }}</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Program Pagination
            const programPrevButton = document.querySelector('.program-prev');
            const programNextButton = document.querySelector('.program-next');
            const programGroups = document.querySelectorAll('.program-group');
            const programPageNumbers = document.querySelectorAll('.program-pagination .page-number');
            let programCurrentGroup = 0;

            if (programGroups.length > 1) {
                programPrevButton.addEventListener('click', function() {
                    programGroups[programCurrentGroup].classList.remove('active');
                    programPageNumbers[programCurrentGroup].classList.remove('active');
                    programCurrentGroup = (programCurrentGroup - 1 + programGroups.length) % programGroups.length;
                    programGroups[programCurrentGroup].classList.add('active');
                    programPageNumbers[programCurrentGroup].classList.add('active');
                });

                programNextButton.addEventListener('click', function() {
                    programGroups[programCurrentGroup].classList.remove('active');
                    programPageNumbers[programCurrentGroup].classList.remove('active');
                    programCurrentGroup = (programCurrentGroup + 1) % programGroups.length;
                    programGroups[programCurrentGroup].classList.add('active');
                    programPageNumbers[programCurrentGroup].classList.add('active');
                });

                programPageNumbers.forEach((page, index) => {
                    page.addEventListener('click', function() {
                        programGroups[programCurrentGroup].classList.remove('active');
                        programPageNumbers[programCurrentGroup].classList.remove('active');
                        programCurrentGroup = index;
                        programGroups[programCurrentGroup].classList.add('active');
                        programPageNumbers[programCurrentGroup].classList.add('active');
                    });
                });
            }

            // News Pagination
            const newsPrevButton = document.querySelector('.news-prev');
            const newsNextButton = document.querySelector('.news-next');
            const newsGroups = document.querySelectorAll('.news-group');
            const newsPageNumbers = document.querySelectorAll('.news-pagination .page-number');
            let newsCurrentGroup = 0;

            if (newsGroups.length > 1) {
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
@endsection