<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa - El-Fitra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <style>
        .table-container {
            max-width: calc(100% - 260px);
            margin-left: 260px;
            padding: 20px 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            min-width: 900px;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th, .table td {
            vertical-align: middle;
            white-space: normal;
            word-wrap: break-word;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            text-align: left;
        }

        .table th {
            background-color: #28a745;
            color: #ffffff;
            font-weight: bold;
        }

        .alert {
            margin: 10px 0;
            padding: 10px 15px;
        }

        @media (max-width: 768px) {
            .table-container {
                margin-left: 70px;
                max-width: calc(100% - 70px);
                padding: 15px;
            }
            .table {
                min-width: 600px;
            }
            .table th, .table td {
                padding: 8px 10px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="user-info">
            <span style="color: #000000;">{{ auth()->user()->username ?? 'Admin' }}</span>
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
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" style="max-height: 100px; width: 100%; object-fit: contain;">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Program</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle" style="color: #28a745;"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" style="margin-left: 260px;">Edit Data Siswa</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-container">
            <form action="{{ route('admin.update-siswa', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                    <input type="text" class="form-control" id="jenis_pendaftaran" name="jenis_pendaftaran" value="{{ old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran) }}" required>
                </div>
                <div class="mb-3">
                    <label for="jenjang" class="form-label">Jenjang</label>
                    <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ old('jenjang', $pendaftaran->jenjang) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tingkat" class="form-label">Tingkat</label>
                    <input type="text" class="form-control" id="tingkat" name="tingkat" value="{{ old('tingkat', $pendaftaran->tingkat) }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $pendaftaran->nama_siswa) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $pendaftaran->nomor_telepon) }}" required>
                </div>
                <div class="mb-3">
                    <label for="akte" class="form-label">Akte (PDF)</label>
                    <input type="file" class="form-control" id="akte" name="akte">
                    @if ($pendaftaran->akte_path)
                        <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="btn btn-info btn-sm mt-2">Lihat Akte</a>
                    @else
                        <span class="text-danger">Akte tidak tersedia</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="kk" class="form-label">Kartu Keluarga (PDF)</label>
                    <input type="file" class="form-control" id="kk" name="kk">
                    @if ($pendaftaran->kk_path)
                        <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="btn btn-info btn-sm mt-2">Lihat KK</a>
                    @else
                        <span class="text-danger">KK tidak tersedia</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="mutasi" class="form-label">Mutasi (PDF)</label>
                    <input type="file" class="form-control" id="mutasi" name="mutasi">
                    @if ($pendaftaran->mutasi_path)
                        <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="btn btn-info btn-sm mt-2">Lihat Mutasi</a>
                    @else
                        <span class="text-danger">Mutasi tidak tersedia</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const header = document.querySelector('.header');

            toggleSidebar.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
                header.classList.toggle('collapsed');

                const icon = this.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.remove('bi-arrow-left-circle');
                    icon.classList.add('bi-arrow-right-circle');
                } else {
                    icon.classList.remove('bi-arrow-right-circle');
                    icon.classList.add('bi-arrow-left-circle');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>