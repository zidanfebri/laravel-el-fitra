<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Siswa - El-Fitra</title>
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
        <h2 class="mb-4" id="contentTitle">Detail Data Siswa</h2>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">Informasi Pendaftaran</th>
                        </tr>
                    </thead>
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
                            <th>Alamat</th>
                            <td>{{ $pendaftaran->alamat }}</td>
                        </tr>
                        <tr>
                            <th>RT/RW</th>
                            <td>{{ $pendaftaran->rt }}/{{ $pendaftaran->rw }}</td>
                        </tr>
                        <tr>
                            <th>Kelurahan</th>
                            <td>{{ $pendaftaran->kelurahan }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>{{ $pendaftaran->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>{{ $pendaftaran->kota }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $pendaftaran->provinsi }}</td>
                        </tr>
                        <tr>
                            <th>Penyakit Bawaan</th>
                            <td>{{ $pendaftaran->penyakit_bawaan ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <td>{{ $pendaftaran->tinggi ? $pendaftaran->tinggi . ' cm' : 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <td>{{ $pendaftaran->berat_badan ? $pendaftaran->berat_badan . ' kg' : 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Anak ke-/Jumlah Saudara</th>
                            <td>{{ $pendaftaran->anak_ke ? $pendaftaran->anak_ke . ' dari ' . $pendaftaran->jumlah_saudara : 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{ $pendaftaran->nama_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>{{ $pendaftaran->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ayah</th>
                            <td>{{ $pendaftaran->pendidikan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td>{{ $pendaftaran->nama_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>{{ $pendaftaran->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ibu</th>
                            <td>{{ $pendaftaran->pendidikan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $pendaftaran->no_hp }}</td>
                        </tr>
                        <tr>
                            <th>No. WhatsApp</th>
                            <td>{{ $pendaftaran->no_whatsapp }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Email</th>
                            <td>{{ $pendaftaran->alamat_email }}</td>
                        </tr>
                        <tr>
                            <th>Sumber Informasi</th>
                            <td>{{ $pendaftaran->sumber_informasi }}</td>
                        </tr>
                        <tr>
                            <th>Akte</th>
                            <td>
                                @if ($pendaftaran->akte_path)
                                    <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="btn btn-info btn-sm"><i class="bi bi-file-earmark-pdf"></i> Lihat Akte</a>
                                @else
                                    <span class="text-danger">Akte tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kartu Keluarga</th>
                            <td>
                                @if ($pendaftaran->kk_path)
                                    <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="btn btn-info btn-sm"><i class="bi bi-file-earmark-pdf"></i> Lihat KK</a>
                                @else
                                    <span class="text-danger">KK tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Mutasi</th>
                            <td>
                                @if ($pendaftaran->mutasi_path)
                                    <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="btn btn-info btn-sm"><i class="bi bi-file-earmark-pdf"></i> Lihat Mutasi</a>
                                @else
                                    <span class="text-danger">Mutasi tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3 action-buttons">
                <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                <a href="{{ route('admin.edit-siswa', $pendaftaran->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
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
                tableContainer.classList.toggle('collapsed');
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
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>