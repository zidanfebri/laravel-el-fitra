<!DOCTYPE html>
<html lang="{{ Session::get('locale', 'id') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tahun Ajaran - El-Fitra</title>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
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
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="El-Fitra" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
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
        <h2 class="mb-4" id="contentTitle">Manajemen Tahun Ajaran</h2>
        <div class="table-container">
            <div class="table-header-controls">
                <form method="GET" action="{{ route('admin.tahun-ajaran') }}" class="filter-form" id="filterForm">
                    <div class="form-group select-wrapper">
                        <label for="tahun_ajaran" class="form-label">Filter Tahun Ajaran</label>
                        <select class="form-select" id="tahun_ajaran" name="tahun_ajaran">
                            <option value="">Semua Tahun Ajaran</option>
                            @foreach ($tahunAjarans as $tahunAjaran)
                                <option value="{{ $tahunAjaran->tahun_ajaran }}" {{ request('tahun_ajaran') == $tahunAjaran->tahun_ajaran ? 'selected' : '' }}>
                                    {{ $tahunAjaran->tahun_ajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <a href="{{ route('admin.create-tahun-ajaran') }}" class="btn btn-success btn-sm">Tambah Tahun Ajaran</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Keterangan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tahunAjarans->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">
                                    @if (request('tahun_ajaran'))
                                        Tidak ada data untuk tahun ajaran {{ request('tahun_ajaran') }}.
                                    @else
                                        Tidak ada data tahun ajaran.
                                    @endif
                                </td>
                            </tr>
                        @else
                            @php $counter = ($tahunAjarans->currentPage() - 1) * $tahunAjarans->perPage() + 1; @endphp
                            @foreach ($tahunAjarans as $tahunAjaran)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $tahunAjaran->tahun_ajaran }}</td>
                                    <td>{{ $tahunAjaran->keterangan }}</td>
                                    <td>{{ $tahunAjaran->tanggal_mulai }}</td>
                                    <td>{{ $tahunAjaran->tanggal_akhir }}</td>
                                    <td>
                                        <form action="{{ route('admin.toggle-tahun-ajaran', $tahunAjaran->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <label class="toggle-switch">
                                                <input type="checkbox" name="status" {{ $tahunAjaran->status == 'active' ? 'checked' : '' }} onchange="this.form.submit()">
                                                <span class="toggle-slider"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.edit-tahun-ajaran', $tahunAjaran->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.delete-tahun-ajaran', $tahunAjaran->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($tahunAjarans->hasPages())
                    <div class="pagination-container">
                        {{ $tahunAjarans->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    @if (session('success'))
        <div class="toast-container">
            <div class="toast animate__animated animate__fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="{{ asset('images/elfitra.jpeg') }}" alt="El-Fitra" width="20" class="me-2">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const header = document.querySelector('.header');
            const tableContainer = document.querySelector('.table-container');
            const contentTitle = document.getElementById('contentTitle');

            toggleSidebar.addEventListener('click', function(e) {
                e.preventDefault();
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('collapsed');
                header.classList.toggle('collapsed');
                if (tableContainer) {
                    tableContainer.classList.toggle('collapsed');
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

            const filterForm = document.getElementById('filterForm');
            const tahunAjaranSelect = document.getElementById('tahun_ajaran');
            if (tahunAjaranSelect) {
                tahunAjaranSelect.addEventListener('change', function() {
                    filterForm.submit();
                });
            }
        });
    </script>
</body>
</html>