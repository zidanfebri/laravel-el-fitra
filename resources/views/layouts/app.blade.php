<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EL-FITRA</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/jenjang.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
    <nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #ffffff, #a3e4d7);">
        <div class="container">
            <a class="navbar-brand text-dark" href="{{ route('home') }}">
                <img src="{{ asset('images/elfitra.jpeg') }}" alt="EL-FITRA Logo" width="40" class="me-2"> EL-FITRA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="#" id="tentangKamiDropdown" role="button">Tentang Kami</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" id="programDropdown" role="button" data-bs-toggle="dropdown">Program</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('jenjang.tk') }}">TK</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sd') }}">SD</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.smp') }}">SMP</a></li>
                            <li><a class="dropdown-item" href="{{ route('jenjang.sma') }}">SMA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('pendaftaran.step1') }}">Pendaftaran</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link text-dark" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer py-4" style="background: linear-gradient(to right, #ffffff, #a3e4d7);">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>El-Fitra adalah lembaga pendidikan yang berkomitmen menciptakan generasi unggul berbasis nilai-nilai Islami.</p>
                </div>
                <div class="col-md-4">
                    <h5>Link</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                        <li><a href="{{ route('tentang-kami') }}" class="text-dark">Tentang Kami</a></li>
                        <li><a href="{{ route('pendaftaran.step1') }}" class="text-dark">Pendaftaran</a></li>
                        <li><a href="{{ route('berita') }}" class="text-dark">Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p>Email: info@elfitra.com</p>
                    <p>Telp: +62 812 3456 7890</p>
                    <div>
                        <a href="#" class="text-dark me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-dark me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <p class="mb-0 text-dark">&copy; 2025 by El-Fitra</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>