@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div id="imageSlider" class="carousel slide carousel-fade slider-container" data-bs-ride="carousel" data-bs-interval="3000" style="margin-top: 70px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/sma1.jpg') }}" class="d-block" alt="{{ __('messages.slider_1') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">SMA EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/sma2.jpg') }}" class="d-block" alt="{{ __('messages.slider_2') }}" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">SMA-ELFITRA</h1>
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

        <!-- Content -->
        <div class="container content-container">
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

            <!-- Vision, Mission, and Target Lulusan -->
            <div class="row vision-mission">
                <div class="col-md-4">
                    <div class="card">
                        <h4 class="text-center">{{ __('messages.vision') }}</h4>
                        <p>{{ app()->getLocale() === 'en' ? 'To become an educational institution that produces virtuous Muslim scholars.' : 'Menjadi lembaga pendidikan yang mencetak cendekiawan muslim berakhlakul karimah' }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h4 class="text-center">{{ __('messages.mission') }}</h4>
                        <ul>
                            <li>{{ app()->getLocale() === 'en' ? 'Preparing competent and exemplary educators and staff.' : 'Menyiapkan tenaga pendidik dan kependidikan yang kompeten dan teladan' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Developing interactive learning materials and media.' : 'Mengembangkan materi dan media pembelajaran yang interaktif' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Developing science and technology-based learning methods.' : 'Mengembangkan pola pembelajaran berbasis sains dan teknologi' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Training students in positive and productive habits.' : 'Melatih pembiasaan siswa yang positif dan produktif' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h4 class="text-center">{{ __('messages.target_graduates') }}</h4>
                        <ul>
                            <li>{{ app()->getLocale() === 'en' ? 'Virtuous Muslim scholars.' : 'Cendekiawan muslim yang berakhlak mulia' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Competitive graduates for top universities.' : 'Lulusan kompetitif untuk universitas ternama' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Visionary and responsible leaders.' : 'Pemimpin yang visioner dan bertanggung jawab' }}</li>
                            <li>{{ app()->getLocale() === 'en' ? 'Creative and innovative individuals in technology.' : 'Individu kreatif dan inovatif dalam teknologi' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Program -->
            <div class="row program-section">
                <div class="col-12">
                    <h3 class="text-center" style="margin-right: 45px;">{{ __('messages.program') }}</h3>
                    <div class="program-container">
                        <div class="program-wrapper">
                            <div class="program-group active">
                                <a href="{{ route('jenjang.sma.unggulan-akademik') }}" class="text-decoration-none">
                                    <div class="card">
                                        <i class="bi bi-book"></i>
                                        <h5>{{ __('messages.academic_prog') }}</h5>
                                        <p>{{ __('messages.academic_prog_desc') }}</p>
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

            <!-- Testimonial -->
            <div class="row testimonial-section">
                <div class="col-12">
                    <h3 class="text-center" style="margin-top: 30px;">{{ __('messages.testimonials') }}</h3>
                    <div class="testimoni-container">
                        <div class="testimoni-wrapper">
                            @php
                                $testimonis = \App\Models\Testimoni::all()->chunk(3);
                            @endphp
                            @foreach ($testimonis as $index => $group)
                                <div class="row testimoni-group {{ $index === 0 ? 'active' : '' }}">
                                    @foreach ($group as $testimoni)
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="{{ $testimoni->gambar ? Storage::url($testimoni->gambar) : asset('images/placeholder.jpg') }}" alt="{{ $testimoni->nama }}" class="card-img-top">
                                                <div class="card-body text-center">
                                                    <p class="card-text">{{ app()->getLocale() === 'en' ? $testimoni->keterangan_en : $testimoni->keterangan }}</p>
                                                    <h6 class="card-subtitle mb-2 text-muted">{{ $testimoni->nama }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @for ($i = count($group); $i < 3; $i++)
                                        <div class="col-md-4"></div>
                                    @endfor
                                </div>
                            @endforeach
                        </div>
                        @if (count($testimonis) > 1)
                            <button class="news-prev btn btn-success">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="testimoni-next btn btn-success">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        @endif
                        <div class="testimoni-pagination text-center mt-3">
                            @for ($i = 0; $i < count($testimonis); $i++)
                                <span class="page-number {{ $i === 0 ? 'active' : '' }}">{{ $i + 1 }}</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <!-- News -->
            <div class="row news-section">
                <div class="col-12">
                    <h3 class="text-center">{{ __('messages.news_title') }}</h3>
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

            // Testimoni Pagination
            const testimoniPrevButton = document.querySelector('.news-prev');
            const testimoniNextButton = document.querySelector('.testimoni-next');
            const testimoniGroups = document.querySelectorAll('.testimoni-group');
            const testimoniPageNumbers = document.querySelectorAll('.testimoni-pagination .page-number');
            let testimoniCurrentGroup = 0;

            if (testimoniGroups.length > 1) {
                testimoniPrevButton.addEventListener('click', function() {
                    testimoniGroups[testimoniCurrentGroup].classList.remove('active');
                    testimoniPageNumbers[testimoniCurrentGroup].classList.remove('active');
                    testimoniCurrentGroup = (testimoniCurrentGroup - 1 + testimoniGroups.length) % testimoniGroups.length;
                    testimoniGroups[testimoniCurrentGroup].classList.add('active');
                    testimoniPageNumbers[testimoniCurrentGroup].classList.add('active');
                });

                testimoniNextButton.addEventListener('click', function() {
                    testimoniGroups[testimoniCurrentGroup].classList.remove('active');
                    testimoniPageNumbers[testimoniCurrentGroup].classList.remove('active');
                    testimoniCurrentGroup = (testimoniCurrentGroup + 1) % testimoniGroups.length;
                    testimoniGroups[testimoniCurrentGroup].classList.add('active');
                    testimoniPageNumbers[testimoniCurrentGroup].classList.add('active');
                });

                testimoniPageNumbers.forEach((page, index) => {
                    page.addEventListener('click', function() {
                        testimoniGroups[testimoniCurrentGroup].classList.remove('active');
                        testimoniPageNumbers[testimoniCurrentGroup].classList.remove('active');
                        testimoniCurrentGroup = index;
                        testimoniGroups[testimoniCurrentGroup].classList.add('active');
                        testimoniPageNumbers[testimoniCurrentGroup].classList.add('active');
                    });
                });
            }
        });
    </script>
@endsection