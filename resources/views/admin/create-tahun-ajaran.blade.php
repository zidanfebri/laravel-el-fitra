<!DOCTYPE html>
<html lang="{{ Session::get('locale', 'id') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tahun Ajaran - El-Fitra</title>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Toast Notification -->
    @if (session('success'))
        <div class="toast-container">
            <div class="toast animate__animated animate__fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" width="20" class="me-2">
                    <strong class="me-auto">El-Fitra</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                    <div class="mt-2 text-end">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Header -->
    <div class="header">
        <div class="user-info">
            <span class="username">{{ auth()->user()->username ?? 'Admin' }}</span>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-sidebar">
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="El-Fitra" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.tahun-ajaran') }}"><i class="bi bi-calendar"></i><span>Tahun Ajaran</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="form-container tahun-ajaran-form">
        <h2 class="mb-4" id="contentTitle">Tambah Tahun Ajaran</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.store-tahun-ajaran') }}">
            @csrf
            <div class="mb-3">
                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}" placeholder="Contoh: 2025/2026" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Masukkan keterangan">
            </div>
            <div class="mb-3 date-wrapper">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control date-input" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            </div>
            <div class="mb-3 date-wrapper">
                <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control date-input" id="tanggal_akhir" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.tahun-ajaran') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const header = document.querySelector('.header');
            const formContainer = document.querySelector('.form-container');
            const contentTitle = document.getElementById('contentTitle');

            toggleSidebar.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
                header.classList.toggle('collapsed');
                if (formContainer) {
                    formContainer.classList.toggle('collapsed');
                }
                if (contentTitle) {
                    contentTitle.classList.toggle('collapsed');
                }

                const icon = this.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.remove('bi-arrow-left-circle');
                    icon.classList.add('bi-arrow-right-circle');
                } else {
                    icon.classList.remove('bi-arrow-right-circle');
                    icon.classList.add('bi-arrow-left-circle');
                }
            });

            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();

                document.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        toast.hide();
                    }
                });
            }

            const tanggalMulaiInput = document.getElementById('tanggal_mulai');
            const tanggalAkhirInput = document.getElementById('tanggal_akhir');
            const dateIcons = document.querySelectorAll('.date-icon');

            if (tanggalMulaiInput) {
                tanggalMulaiInput.addEventListener('focus', function() {
                    try {
                        this.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            }

            if (tanggalAkhirInput) {
                tanggalAkhirInput.addEventListener('focus', function() {
                    try {
                        this.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            }

            dateIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.date-input');
                    try {
                        input.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>