@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <!-- Image Slider -->
        <div id="imageSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/el.jpeg') }}" class="d-block w-100" alt="Slider 1" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/fit.jpeg') }}" class="d-block w-100" alt="Slider 2" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/ra.jpeg') }}" class="d-block w-100" alt="Slider 3" loading="lazy">
                    <div class="position-absolute top-50 start-50 translate-middle text-center">
                        <h1 class="slider-text-fixed">EL-FITRA</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>
        </div>

        <!-- Tentang Kami -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="tentang-kami-container">
                        <div class="col-md-4">
                            <img src="{{ asset('images/el.jpeg') }}" alt="Tentang Kami" class="img-fluid rounded tentang-kami-image" loading="lazy">
                        </div>
                        <div class="col-md-8">
                            <h1 class="tentang-kami-title">Tentang Kami</h1>
                            <p class="tentang-kami-text">Tentang Kami adalah tempat untuk mengetahui lebih lanjut tentang El-Fitra, lembaga pendidikan yang berkomitmen menciptakan generasi unggul berbasis nilai-nilai Islami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <h2 class="text-center">Jenjang Pendidikan</h2>
                    <div class="row mt-2 text-center">
                        <div class="col-md-3">
                            <a href="{{ route('jenjang.tk') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card tk">
                                    <i class="bi bi-person-circle"></i>
                                    <h4 class="stat-jenjang">TK</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('jenjang.sd') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card sd">
                                    <i class="bi bi-book"></i>
                                    <h4 class="stat-jenjang">SD</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('jenjang.smp') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card smp">
                                    <i class="bi bi-mortarboard"></i>
                                    <h4 class="stat-jenjang">SMP</h4>
                                    <div class="overlay"></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('jenjang.sma') }}" class="text-decoration-none">
                                <div class="statistik-box jenjang-card sma">
                                    <i class="bi bi-award"></i>
                                    <h4 class="stat-jenjang">SMA</h4>
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
                            <h2 class="text-center">Fasilitas</h2>
                            <div class="row text-center mt-2">
                                <div class="col-md-3">
                                    <i class="bi bi-building"></i>
                                    <p class="card-text">Gedung</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-shop"></i>
                                    <p class="card-text">Kantin</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-basket3"></i>
                                    <p class="card-text">Lapangan</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-cup-straw"></i>
                                    <p class="card-text">Makan Siang</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-book-half"></i>
                                    <p class="card-text">Perpustakaan</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-hourglass-split"></i>
                                    <p class="card-text">Laboratorium</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-person-video2"></i>
                                    <p class="card-text">Aula</p>
                                </div>
                                <div class="col-md-3">
                                    <i class="bi bi-door-open"></i>
                                    <p class="card-text">Mushola</p>
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
                    <h2 class="text-center">Berita</h2>
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
                                                    <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ $berita->judul }}" class="img-fluid rounded" loading="lazy">
                                                    <h5 class="mt-2">{{ $berita->judul }}</h5>
                                                    <p>{{ Str::limit($berita->deskripsi, 50) }}</p>
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
        </div>

        <!-- Pendaftaran -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="registration-image">
                        <div class="registration-text text-center">
                            <h2 class="text-black">Pendaftaran Siswa/Siswi Baru EL-FITRA</h2>
                            <a href="{{ route('pendaftaran.step1') }}" class="btn btn-light mt-2">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="content-section">
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <h2 class="text-center">Statistik Siswa/Siswi EL-FITRA</h2>
                    <div class="row text-center mt-2">
                        <div class="col-md-3">
                            <div class="statistik-box tk">
                                <h4 class="stat-title">TK</h4>
                                <p class="stat-number" data-target="1000">0</p>
                                <p class="stat-label">Siswa/Siswi</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistik-box sd">
                                <h4 class="stat-title">SD</h4>
                                <p class="stat-number" data-target="3600">0</p>
                                <p class="stat-label">Siswa/Siswi</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistik-box smp">
                                <h4 class="stat-title">SMP</h4>
                                <p class="stat-number" data-target="4000">0</p>
                                <p class="stat-label">Siswa/Siswi</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistik-box sma">
                                <h4 class="stat-title">SMA</h4>
                                <p class="stat-number" data-target="3200">0</p>
                                <p class="stat-label">Siswa/Siswi</p>
                            </div>
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

            // Statistik Animation
            const statNumbers = document.querySelectorAll('.stat-number');
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
                updateNumber();
            });
        });
    </script>
@endsection