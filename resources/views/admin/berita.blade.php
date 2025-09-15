<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.manajemen_berita') }} - {{ __('messages.site_name') }}</title>
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
                <i class="bi bi-box-arrow-right"></i> {{ __('messages.logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-sidebar">
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>{{ __('messages.data_siswa') }}</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>{{ __('messages.berita') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>{{ __('messages.testimoni') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>{{ __('messages.laporan') }}</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">{{ __('messages.manajemen_berita') }}</h2>
        @if (session('success'))
            <div class="alert alert-success" id="successAlert">{{ session('success') }}</div>
        @endif
        @if ($beritas->isEmpty())
            <div class="alert alert-info">{{ __('messages.no_data') }}</div>
        @else
            <div class="table-container">
                <div class="table-header-controls">
                    <form method="GET" action="{{ route('admin.berita') }}" class="filter-form" id="filterForm">
                        <div class="form-group">
                            <label for="tanggal" class="form-label">{{ __('messages.filter_tanggal') }}</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ request('tanggal') }}">
                        </div>
                        <a href="{{ route('admin.berita') }}" class="btn btn-secondary">{{ __('messages.reset') }}</a>
                    </form>
                    <a href="{{ route('admin.create-berita') }}" class="btn btn-success add-button">{{ __('messages.tambah_berita') }}</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('messages.id') }}</th>
                                <th>{{ __('messages.judul') }}</th>
                                <th>{{ __('messages.deskripsi') }}</th>
                                <th>{{ __('messages.tanggal_terbit') }}</th>
                                <th>{{ __('messages.gambar') }}</th>
                                <th>{{ __('messages.aksi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = ($beritas->currentPage() - 1) * $beritas->perPage() + 1; @endphp
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $berita->judul }}</td>
                                    <td>{{ Str::limit($berita->deskripsi, 50) }}</td>
                                    <td>{{ $berita->tanggal_terbit}}</td>
                                    <td>
                                        @if ($berita->gambar)
                                            <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}" class="table-img">
                                        @else
                                            <span class="text-danger">{{ __('messages.no_image') }}</span>
                                        @endif
                                    </td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.edit-berita', $berita->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.delete-berita', $berita->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.confirm_delete') }}')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        {{ $beritas->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        @endif
    </div>

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

            const successAlert = document.getElementById('successAlert');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.display = 'none';
                }, 3000);
            }

            const filterForm = document.getElementById('filterForm');
            const tanggalInput = document.getElementById('tanggal');
            if (tanggalInput) {
                tanggalInput.addEventListener('change', function() {
                    filterForm.submit();
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>