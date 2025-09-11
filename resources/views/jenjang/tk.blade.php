@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div id="tkSlider" class="carousel slide carousel-fade slider-container" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/tk1.jpeg') }}" class="d-block w-100" alt="TK Slider 1" loading="lazy">
                    <div class="carousel-caption">
                        <h1>TK EL-FITRA</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/tk2.jpeg') }}" class="d-block w-100" alt="TK Slider 2" loading="lazy">
                    <div class="carousel-caption">
                        <h1>TK EL-FITRA</h1>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#tkSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#tkSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Content -->
        <div class="container content-container">
            <!-- History -->
            <div class="row animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="history-section">
                        <img src="{{ asset('images/el.jpeg') }}" alt="Sejarah Kami" loading="lazy">
                        <div class="history-text">
                            <h1>Sejarah TK El-Fitra</h1>
                            <p>Tentang Kami adalah tempat untuk mengetahui lebih lanjut tentang El-Fitra, lembaga pendidikan yang berkomitmen menciptakan generasi unggul berbasis nilai-nilai Islami.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vision and Mission -->
            <div class="row vision-mission">
                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center">Visi</h4>
                        <p>Menjadikan TK El-Fitra sebagai pusat pendidikan dini berbasis Islami yang unggul dan berakhlak mulia.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h4 class="text-center">Misi</h4>
                        <ul>
                            <li>Mengembangkan potensi anak melalui pembelajaran Islami.</li>
                            <li>Menciptakan lingkungan belajar yang menyenangkan.</li>
                            <li>Kolaborasi dengan orang tua untuk pendidikan holistik.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Program -->
            <div class="row program-section">
                <div class="col-12">
                    <h3 class="text-center">Program Pendidikan</h3>
                    <div class="program-container">
                        <div class="program-wrapper">
                            @php
                                $programs = [
                                    ['icon' => 'bi-lightbulb', 'title' => 'Kreativitas', 'desc' => 'Kelas seni dan kerajinan.'],
                                    ['icon' => 'bi-book', 'title' => 'Pendidikan Agama', 'desc' => 'Pembelajaran Al-Qur\'an.'],
                                    ['icon' => 'bi-play-circle', 'title' => 'Permainan Edukatif', 'desc' => 'Aktivitas perkembangan.'],
                                    ['icon' => 'bi-heart', 'title' => 'Pendidikan Karakter', 'desc' => 'Pembentukan akhlak mulia.'],
                                    ['icon' => 'bi-music-note', 'title' => 'Musik dan Tari', 'desc' => 'Ekspresi seni anak.'],
                                    ['icon' => 'bi-brush', 'title' => 'Seni Lukis', 'desc' => 'Melukis dan menggambar.'],
                                    ['icon' => 'bi-balloon', 'title' => 'Kegiatan Bermain', 'desc' => 'Bermain sambil belajar.'],
                                ];
                                $programGroups = array_chunk($programs, 5);
                            @endphp
                            @foreach ($programGroups as $index => $group)
                                <div class="program-group {{ $index === 0 ? 'active' : '' }}">
                                    @foreach ($group as $program)
                                        <div class="card">
                                            <i class="bi {{ $program['icon'] }}"></i>
                                            <h5>{{ $program['title'] }}</h5>
                                            <p>{{ $program['desc'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        @if (count($programGroups) > 1)
                            <button class="program-prev btn btn-success">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="program-next btn btn-success">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        @endif
                        <div class="program-pagination text-center mt-3">
                            @for ($i = 0; $i < count($programGroups); $i++)
                                <span class="page-number {{ $i === 0 ? 'active' : '' }}">{{ $i + 1 }}</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            <div class="row facilities-section animate__animated animate__fadeInUp">
                <div class="col-12">
                    <div class="card">
                        <h2 class="text-center">Fasilitas</h2>
                        <div class="row text-center">
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-building"></i>
                                <p>Gedung</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-shop"></i>
                                <p>Kantin</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-basket3"></i>
                                <p>Lapangan</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-cup-straw"></i>
                                <p>Makan Siang</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-book-half"></i>
                                <p>Perpustakaan</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-hourglass-split"></i>
                                <p>Laboratorium</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-person-video2"></i>
                                <p>Aula</p>
                            </div>
                            <div class="col-md-3 facility-item">
                                <i class="bi bi-door-open"></i>
                                <p>Mushola</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- News -->
            <div class="row news-section">
                <div class="col-12">
                    <h3 class="text-center">Berita Terbaru</h3>
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
                                                    <img src="{{ $berita->gambar ? Storage::url($berita->gambar) : asset('images/placeholder.jpg') }}" alt="{{ $berita->judul }}" class="img-fluid" loading="lazy">
                                                    <h5>{{ $berita->judul }}</h5>
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