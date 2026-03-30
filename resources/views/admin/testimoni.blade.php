<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.manajemen_testimoni') }} - {{ __('messages.site_name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Toast Notification -->
    @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast animate__animated animate__fadeInUp" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="toast-header">
                    <img src="{{ asset('images/elfitra.jpeg') }}" alt="{{ __('messages.site_name') }}" width="20" class="me-2">
                    <strong class="me-auto">{{ __('messages.site_name') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                    <div class="mt-2 text-end">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast">{{ __('messages.ok') }}</button>
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
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>{{ __('messages.berita') }}</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>{{ __('messages.testimoni') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tahun-ajaran') }}"><i class="bi bi-calendar"></i><span>{{ __('messages.tahun_ajaran') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>{{ __('messages.laporan') }}</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">{{ __('messages.manajemen_testimoni') }}</h2>
        <div class="table-container">
            <div class="table-header-controls">
                <form method="GET" action="{{ route('admin.testimoni') }}" class="filter-form" id="searchForm">
                    <div class="form-group">
                        <label for="search" class="form-label">{{ __('messages.cari_nama') }}</label>
                        <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="{{ __('messages.place_nama') }}">
                    </div>
                </form>
                <a href="{{ route('admin.create-testimoni') }}" class="btn btn-success add-button">{{ __('messages.tambah_testimoni') }}</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('messages.no') }}</th>
                            <th>{{ __('messages.gambar') }}</th>
                            <th>{{ __('messages.nama') }}</th>
                            <th>{{ __('messages.keterangan') }}</th>
                            <th>{{ __('messages.tanggal') }}</th>
                            <th>{{ __('messages.aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($testimonis->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">{{ __('messages.no_data_testimoni') }}</td>
                            </tr>
                        @else
                            @php $counter = ($testimonis->currentPage() - 1) * $testimonis->perPage() + 1; @endphp
                            @foreach ($testimonis as $testimoni)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>
                                        @if ($testimoni->gambar)
                                            <img src="{{ Storage::url($testimoni->gambar) }}" alt="{{ $testimoni->nama }}" class="table-img">
                                        @else
                                            <span class="text-danger">{{ __('messages.no_image') }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $testimoni->nama }}</td>
                                    <td>{{ Str::limit($testimoni->keterangan, 50) }}</td>
                                    <td>{{ $testimoni->tanggal }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.edit-testimoni', $testimoni->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.delete-testimoni', $testimoni->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('messages.confirm_delete') }}')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                @if ($testimonis->hasPages())
                    <div class="pagination-container">
                        {{ $testimonis->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
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

            const searchForm = document.getElementById('searchForm');
            const searchInput = document.getElementById('search');
            searchInput.addEventListener('input', function() {
                searchForm.submit();
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>