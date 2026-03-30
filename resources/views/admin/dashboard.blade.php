<!DOCTYPE html>
<html lang="{{ Session::get('locale', 'id') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.dashboard_admin') }} - {{ __('messages.site_name') }}</title>
    <!-- Meta tag untuk mencegah caching -->
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS (asumsi file ini ada) -->
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
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>{{ __('messages.data_siswa') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>{{ __('messages.berita') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>{{ __('messages.testimoni') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tahun-ajaran') }}"><i class="bi bi-calendar"></i><span>{{ __('messages.tahun_ajaran') }}</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>{{ __('messages.laporan') }}</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">{{ __('messages.data_siswa') }}</h2>
        <div class="table-container">
            <div class="table-header-controls">
                
                {{-- Filter JENIS PENDAFTARAN --}}
                <form method="GET" action="{{ route('admin.data-siswa') }}" class="filter-form jenis-pendaftaran-form" id="jenisPendaftaranForm">
                    <div class="form-group select-wrapper">
                        <label for="jenis_pendaftaran" class="form-label">{{ __('messages.jenis_pendaftaran') }}</label>
                        <select class="form-select" id="jenis_pendaftaran" name="jenis_pendaftaran">
                            <option value="">Semua Jenis Pendaftaran</option>
                            <option value="baru" {{ $jenisPendaftaran == 'baru' ? 'selected' : '' }}>{{ __('messages.baru') }}</option>
                            <option value="pindahan" {{ $jenisPendaftaran == 'pindahan' ? 'selected' : '' }}>{{ __('messages.pindahan') }}</option>
                        </select>
                        <input type="hidden" name="jenjang" value="{{ $jenjang }}">
                        <input type="hidden" name="status" value="{{ $status ?? '' }}">
                        <input type="hidden" name="per_page" value="{{ $perPage }}">
                    </div>
                </form>

                {{-- Filter JENJANG --}}
                <form method="GET" action="{{ route('admin.data-siswa') }}" class="filter-form jenjang-form" id="jenjangForm">
                    <div class="form-group select-wrapper">
                        <label for="jenjang" class="form-label">{{ __('messages.filter_jenjang') }}</label>
                        <select class="form-select" id="jenjang" name="jenjang">
                            <option value="">{{ __('messages.semua_jenjang') }}</option>
                            <option value="TK" {{ $jenjang == 'TK' ? 'selected' : '' }}>TK</option>
                            <option value="SD" {{ $jenjang == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ $jenjang == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA" {{ $jenjang == 'SMA' ? 'selected' : '' }}>SMA</option>
                        </select>
                        <input type="hidden" name="jenis_pendaftaran" value="{{ $jenisPendaftaran }}">
                        <input type="hidden" name="per_page" value="{{ $perPage }}">
                        <input type="hidden" name="status" value="{{ $status ?? '' }}">
                    </div>
                </form>
                
                {{-- Filter STATUS --}}
                <form method="GET" action="{{ route('admin.data-siswa') }}" class="filter-form status-form" id="statusForm">
                    <div class="form-group select-wrapper">
                        <label for="status" class="form-label">{{ __('messages.filter_status') }}</label>
                        <select class="form-select" id="status" name="status">
                            <option value="">{{ __('messages.semua_status') }}</option>
                            <option value="none" {{ $status == 'none' ? 'selected' : '' }}>{{ __('messages.status_none') }}</option>
                            <option value="diinput" {{ $status == 'diinput' ? 'selected' : '' }}>{{ __('messages.status_diinput') }}</option>
                            <option value="pembayaran" {{ $status == 'pembayaran' ? 'selected' : '' }}>{{ __('messages.status_pembayaran') }}</option>
                            <option value="verifikasi" {{ $status == 'verifikasi' ? 'selected' : '' }}>{{ __('messages.status_verifikasi') }}</option>
                            <option value="sukses" {{ $status == 'sukses' ? 'selected' : '' }}>{{ __('messages.status_sukses') }}</option>
                            <option value="siswa" {{ $status == 'siswa' ? 'selected' : '' }}>{{ __('messages.status_siswa') }}</option>
                        </select>
                        <input type="hidden" name="jenis_pendaftaran" value="{{ $jenisPendaftaran }}">
                        <input type="hidden" name="jenjang" value="{{ $jenjang }}">
                        <input type="hidden" name="per_page" value="{{ $perPage }}">
                    </div>
                </form>
                
                {{-- Show Entries / Per Page --}}
                <form method="GET" action="{{ route('admin.data-siswa') }}" class="filter-form show-entries-form" id="perPageForm">
                    <div class="form-group select-wrapper" style="margin-left: 340px;">
                        <label for="per_page" class="form-label">{{ __('messages.show_entries') }}</label>
                        <select class="form-select" id="per_page" name="per_page">
                            <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            <option value="all" {{ $perPage == 'all' ? 'selected' : '' }}>{{ __('messages.all') }}</option>
                        </select>
                        <input type="hidden" name="jenis_pendaftaran" value="{{ $jenisPendaftaran }}">
                        <input type="hidden" name="jenjang" value="{{ $jenjang }}">
                        <input type="hidden" name="status" value="{{ $status ?? '' }}">
                    </div>
                </form>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('messages.no') }}</th>
                            <th>{{ __('messages.jenis_pendaftaran') }}</th>
                            <th>{{ __('messages.jenjang') }}</th>
                            <th>{{ __('messages.tingkat') }}</th>
                            <th>{{ __('messages.tahun_ajaran') }}</th>
                            <th>{{ __('messages.nama_siswa') }}</th>
                            <th>{{ __('messages.tanggal_lahir') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.no_whatsapp') }}</th>
                            <th>{{ __('messages.aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendaftarans->isNotEmpty())
                            @php $counter = ($pendaftarans instanceof \Illuminate\Pagination\LengthAwarePaginator ? ($pendaftarans->currentPage() - 1) * $pendaftarans->perPage() + 1 : 1); @endphp
                            @foreach ($pendaftarans as $pendaftaran)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $pendaftaran->jenis_pendaftaran }}</td>
                                    <td>{{ $pendaftaran->jenjang }}</td>
                                    <td>{{ $pendaftaran->tingkat }}</td>
                                    <td>{{ $pendaftaran->tahunAjaran->tahun_ajaran ?? '-' }}</td>
                                    <td>{{ $pendaftaran->nama_siswa }}</td>
                                    <td>{{ $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('Y-m-d') : __('messages.no_data') }}</td>
                                    <td>
                                        <form action="{{ route('admin.update-status', $pendaftaran->id) }}" method="POST" class="status-form">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="form-select status-select" onchange="this.form.submit()">
                                                <option value="none" {{ $pendaftaran->status == 'none' ? 'selected' : '' }}>{{ __('messages.status_none') }}</option>
                                                <option value="diinput" {{ $pendaftaran->status == 'diinput' ? 'selected' : '' }}>{{ __('messages.status_diinput') }}</option>
                                                <option value="pembayaran" {{ $pendaftaran->status == 'pembayaran' ? 'selected' : '' }}>{{ __('messages.status_pembayaran') }}</option>
                                                <option value="verifikasi" {{ $pendaftaran->status == 'verifikasi' ? 'selected' : '' }}>{{ __('messages.status_verifikasi') }}</option>
                                                <option value="sukses" {{ $pendaftaran->status == 'sukses' ? 'selected' : '' }}>{{ __('messages.status_sukses') }}</option>
                                                <option value="siswa" {{ $pendaftaran->status == 'siswa' ? 'selected' : '' }}>{{ __('messages.status_siswa') }}</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $pendaftaran->no_whatsapp ?? '-' }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.edit-siswa', $pendaftaran->id) }}" class="btn btn-primary btn-sm" title="{{ __('messages.edit') }}"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.delete-siswa', $pendaftaran->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="{{ __('messages.delete') }}" onclick="return confirm('{{ __('messages.confirm_delete') }}')"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <a href="{{ route('admin.detail-siswa', $pendaftaran->id) }}" class="btn btn-info btn-sm" title="{{ __('messages.detail') }}"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">{{ __('messages.no_data_pendaftaran') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                @if ($pendaftarans instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="pagination-container">
                        {{ $pendaftarans->appends(['jenis_pendaftaran' => $jenisPendaftaran, 'jenjang' => $jenjang, 'status' => $status ?? '', 'per_page' => $perPage])->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check Auth Status (Kept for completeness, though Auth middleware should handle most of this)
            fetch('{{ route('check-auth') }}', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // If not authenticated, redirect to login (This should be redundant due to middleware)
                if (!data.authenticated) {
                    // window.location.href = "{{ route('login') }}";
                }
            })
            .catch(error => {
                console.error('Error checking auth status:', error);
            });

            // Sidebar Collapse Logic
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            const header = document.querySelector('.header');
            const tableContainer = document.querySelector('.table-container');
            const contentTitle = document.getElementById('contentTitle');

            if (toggleSidebar) {
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
            }


            // Toast Notification Display Logic
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

            // FILTER SUBMISSION LOGIC (uses form submission, not JS logic)
            const jenisPendaftaranForm = document.getElementById('jenisPendaftaranForm');
            const jenjangForm = document.getElementById('jenjangForm');
            const statusForm = document.getElementById('statusForm');
            const perPageForm = document.getElementById('perPageForm');
            
            const jenisPendaftaranSelect = document.getElementById('jenis_pendaftaran');
            const jenjangSelect = document.getElementById('jenjang');
            const statusSelect = document.getElementById('status');
            const perPageSelect = document.getElementById('per_page');

            // Add change listeners to submit forms
            if (jenisPendaftaranSelect) {
                jenisPendaftaranSelect.addEventListener('change', function() {
                    jenisPendaftaranForm.submit();
                });
            }

            if (jenjangSelect) {
                jenjangSelect.addEventListener('change', function() {
                    jenjangForm.submit();
                });
            }

            if (statusSelect) {
                statusSelect.addEventListener('change', function() {
                    statusForm.submit();
                });
            }

            if (perPageSelect) {
                perPageSelect.addEventListener('change', function() {
                    perPageForm.submit();
                });
            }
        });
    </script>
</body>
</html>
