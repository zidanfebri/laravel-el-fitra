```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - El-Fitra</title>
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-sidebar">
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tahun-ajaran') }}"><i class="bi bi-calendar"></i><span>Tahun Ajaran</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">Edit Berita</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-container">
            <form action="{{ route('admin.update-berita', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                </div>
                <div class="mb-3 date-wrapper">
                    <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                    <input type="date" class="form-control date-input" id="tanggal_terbit" name="tanggal_terbit" value="{{ old('tanggal_terbit', $berita->tanggal_terbit) }}" required>
                    <i class="bi bi-calendar date-icon"></i>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg,image/png,image/jfif">
                    @if ($berita->gambar)
                        <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="edit-img mt-2">
                    @endif
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.berita') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
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

            const tanggalTerbitInput = document.getElementById('tanggal_terbit');
            const dateIcon = document.querySelector('.date-icon');

            if (tanggalTerbitInput) {
                tanggalTerbitInput.addEventListener('focus', function() {
                    try {
                        this.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            }

            if (dateIcon) {
                dateIcon.addEventListener('click', function() {
                    try {
                        tanggalTerbitInput.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>