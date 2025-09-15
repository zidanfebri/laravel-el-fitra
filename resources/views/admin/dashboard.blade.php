<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - El-Fitra</title>
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
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <h2 class="mb-4" id="contentTitle">Data Calon Siswa</h2>
        <div class="table-container">
            <h3 class="mb-3">Data Calon Siswa/Siswi</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jenis Pendaftaran</th>
                            <th>Jenjang</th>
                            <th>Tingkat</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pendaftarans->isNotEmpty())
                            @php $counter = ($pendaftarans->currentPage() - 1) * $pendaftarans->perPage() + 1; @endphp
                            @foreach ($pendaftarans as $pendaftaran)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $pendaftaran->jenis_pendaftaran }}</td>
                                    <td>{{ $pendaftaran->jenjang }}</td>
                                    <td>{{ $pendaftaran->tingkat }}</td>
                                    <td>{{ $pendaftaran->nama_siswa }}</td>
                                    <td>{{ $pendaftaran->tanggal_lahir }}</td>
                                    <td>{{ $pendaftaran->jenis_kelamin }}</td>
                                    <td>{{ $pendaftaran->nama_ayah }}</td>
                                    <td>{{ $pendaftaran->nama_ibu }}</td>
                                    <td>{{ $pendaftaran->nomor_telepon }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('admin.edit-siswa', $pendaftaran->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('admin.delete-siswa', $pendaftaran->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <a href="{{ route('admin.detail-siswa', $pendaftaran->id) }}" class="btn btn-info btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data pendaftaran.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="pagination-container">
                    {{ $pendaftarans->links('pagination::bootstrap-5') }}
                </div>
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
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>