<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Siswa - El-Fitra</title>
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
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle" style="color: #28a745"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" style="margin-left: 260px;">Detail Data Siswa</h2>
        <div class="table-container">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $pendaftaran->id }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pendaftaran</th>
                        <td>{{ $pendaftaran->jenis_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <th>Jenjang</th>
                        <td>{{ $pendaftaran->jenjang }}</td>
                    </tr>
                    <tr>
                        <th>Tingkat</th>
                        <td>{{ $pendaftaran->tingkat }}</td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>{{ $pendaftaran->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $pendaftaran->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $pendaftaran->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $pendaftaran->nama_ayah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $pendaftaran->nama_ibu }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $pendaftaran->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Akte</th>
                        <td>
                            @if ($pendaftaran->akte_path)
                                <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="btn btn-info btn-sm">Lihat Akte</a>
                            @else
                                <span class="text-danger">Akte tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Kartu Keluarga</th>
                        <td>
                            @if ($pendaftaran->kk_path)
                                <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="btn btn-info btn-sm">Lihat KK</a>
                            @else
                                <span class="text-danger">KK tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Mutasi</th>
                        <td>
                            @if ($pendaftaran->mutasi_path)
                                <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="btn btn-info btn-sm">Lihat Mutasi</a>
                            @else
                                <span class="text-danger">Mutasi tidak tersedia</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary mt-3">Kembali</a>
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