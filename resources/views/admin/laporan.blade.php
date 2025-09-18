<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Siswa - El-Fitra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
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
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">Laporan Data Siswa</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-container">
            <form method="GET" action="{{ route('admin.laporan') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenjang" name="jenjang">
                                <option value="">Semua Jenjang</option>
                                <option value="TK" {{ $jenjang === 'TK' ? 'selected' : '' }}>TK</option>
                                <option value="SD" {{ $jenjang === 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ $jenjang === 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ $jenjang === 'SMA' ? 'selected' : '' }}>SMA</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{ $tanggalAwal }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{ $tanggalAkhir }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                <a href="{{ route('admin.laporan') }}" class="btn btn-secondary btn-sm">Reset</a>
                @if ($pendaftarans->isNotEmpty())
                    <a href="{{ route('admin.laporan', ['jenjang' => $jenjang, 'tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir, 'download' => 'pdf']) }}" class="btn btn-danger btn-sm">Download PDF</a>
                    <a href="{{ route('admin.laporan', ['jenjang' => $jenjang, 'tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir, 'download' => 'excel']) }}" class="btn btn-success btn-sm">Download Excel</a>
                @endif
            </form>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pendaftaran</th>
                            <th>Jenjang</th>
                            <th>Tingkat</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftarans as $index => $pendaftaran)
                            <tr>
                                <td>{{ $pendaftarans->firstItem() + $index }}</td>
                                <td>{{ $pendaftaran->jenis_pendaftaran }}</td>
                                <td>{{ $pendaftaran->jenjang }}</td>
                                <td>{{ $pendaftaran->tingkat }}</td>
                                <td>{{ $pendaftaran->nama_siswa }}</td>
                                <td>{{ $pendaftaran->tanggal_pendaftaran }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pendaftaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $pendaftarans->appends(['jenjang' => $jenjang, 'tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir])->links('pagination::bootstrap-5') }}
            </div>
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
                formContainer.classList.toggle('collapsed');
                contentTitle.classList.toggle('collapsed');

                const icon = this.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.remove('bi-arrow-left-circle');
                    icon.classList.add('bi-arrow-right-circle');
                } else {
                    icon.classList.remove('bi-arrow-right-circle');
                    icon.classList.add('bi-arrow-left-circle');
                }
            });

            const tanggalAwalInput = document.getElementById('tanggal_awal');
            tanggalAwalInput.addEventListener('focus', function() {
                if (typeof this.showPicker === 'function') {
                    this.showPicker();
                }
            });

            const tanggalAkhirInput = document.getElementById('tanggal_akhir');
            tanggalAkhirInput.addEventListener('focus', function() {
                if (typeof this.showPicker === 'function') {
                    this.showPicker();
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>