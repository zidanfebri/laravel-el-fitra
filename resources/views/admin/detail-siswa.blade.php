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
        /* Tambahan style khusus detail agar selaras dengan dashboard.css */
        .category-title {
            background-color: #f1f3f5;
            padding: 10px 15px;
            border-left: 5px solid #4169E1;
            margin: 20px 0 15px 0;
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
        }
        .table-detail th {
            width: 30%;
            background-color: #f8f9fa !important;
            color: #333 !important;
            text-align: left !important;
            font-weight: 600 !important;
        }
        .table-detail td {
            text-align: left !important;
        }
        .doc-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
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

    <div class="sidebar">
        <div class="logo-sidebar">
            <img src="{{ asset('images/elfitra.jpeg') }}" alt="Elfitra Logo" class="logo-sidebar-img">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link active" href="{{ route('admin.data-siswa') }}"><i class="bi bi-people"></i><span>Data Calon Siswa</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.berita') }}"><i class="bi bi-newspaper"></i><span>Berita</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.testimoni') }}"><i class="bi bi-chat"></i><span>Testimoni</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tahun-ajaran') }}"><i class="bi bi-calendar"></i><span>Tahun Ajaran</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i class="bi bi-file-text"></i><span>Laporan</span></a></li>
            <li class="nav-item text-center">
                <a href="#" class="nav-link toggle-btn" id="toggleSidebar"><i class="bi bi-arrow-left-circle"></i></a>
            </li>
        </ul>
    </div>

    <div class="content">
        <h2 id="contentTitle">Detail Data Siswa</h2>
        
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Informasi Lengkap Calon Siswa</h4>
                <div class="action-buttons">
                    <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <a href="{{ route('admin.edit-siswa', $pendaftaran->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                </div>
            </div>

            <div class="table-responsive">
                <div class="category-title">1. DATA POKOK SISWA</div>
                <table class="table table-bordered table-detail mb-4">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $pendaftaran->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td>{{ $pendaftaran->nisn ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $pendaftaran->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>{{ $pendaftaran->tempat_lahir ?? '-' }}, {{ $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('d-m-Y') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{ $pendaftaran->agama ?? 'Islam' }}</td>
                        </tr>
                        <tr>
                            <th>Asal Sekolah</th>
                            <td>{{ $pendaftaran->asal_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tinggi / Berat Badan</th>
                            <td>{{ $pendaftaran->tinggi ? $pendaftaran->tinggi . ' cm' : '-' }} / {{ $pendaftaran->berat_badan ? $pendaftaran->berat_badan . ' kg' : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Penyakit Bawaan</th>
                            <td>{{ $pendaftaran->penyakit_bawaan ?? 'Tidak ada' }}</td>
                        </tr>
                        <tr>
                            <th>Anak ke / Jumlah Saudara</th>
                            <td>{{ $pendaftaran->anak_ke ?? '-' }} dari {{ $pendaftaran->jumlah_saudara ?? '-' }} bersaudara</td>
                        </tr>
                        <tr>
                            <th>Golongan Darah</th>
                            <td>{{ $pendaftaran->golongan_darah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Hp</th>
                            <td>{{ $pendaftaran->no_hp }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="category-title">2. DATA ALAMAT SISWA</div>
                <table class="table table-bordered table-detail mb-4">
                    <tbody>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <td>{{ $pendaftaran->alamat }}</td>
                        </tr>
                        <tr>
                            <th>RT / RW</th>
                            <td>{{ $pendaftaran->rt }} / {{ $pendaftaran->rw }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>{{ $pendaftaran->provinsi }}</td>
                        </tr>
                        <tr>
                            <th>Kota / Kabupaten</th>
                            <td>{{ $pendaftaran->kota }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>{{ $pendaftaran->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Kelurahan / Desa</th>
                            <td>{{ $pendaftaran->kelurahan }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>{{ $pendaftaran->kode_pos ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="category-title">3. DATA ORANG TUA / WALI</div>
                <table class="table table-bordered table-detail mb-4">
                    <tbody>
                        <tr>
                            <th>Nama Ayah / Pekerjaan</th>
                            <td>{{ $pendaftaran->nama_ayah }} / {{ $pendaftaran->pekerjaan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ayah</th>
                            <td>{{ $pendaftaran->pendidikan_ayah }}</td>
                        </tr>
                        <tr>
                            <th>Nama Ibu / Pekerjaan</th>
                            <td>{{ $pendaftaran->nama_ibu }} / {{ $pendaftaran->pekerjaan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Pendidikan Ibu</th>
                            <td>{{ $pendaftaran->pendidikan_ibu }}</td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
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
                    </tbody>
                </table>

                <div class="category-title">4. DOKUMEN & BUKTI PEMBAYARAN</div>
                <table class="table table-bordered table-detail mb-4">
                    <tbody>
                        <tr>
                            <th>Akte Kelahiran</th>
                            <td>
                                @if ($pendaftaran->akte_path)
                                    <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="doc-link text-info"><i class="bi bi-file-earmark-pdf"></i> Lihat Akte</a>
                                @else
                                    <span class="text-danger">File tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kartu Keluarga</th>
                            <td>
                                @if ($pendaftaran->kk_path)
                                    <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="doc-link text-info"><i class="bi bi-file-earmark-pdf"></i> Lihat KK</a>
                                @else
                                    <span class="text-danger">File tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Surat Mutasi (Pindahan)</th>
                            <td>
                                @if ($pendaftaran->mutasi_path)
                                    <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="doc-link text-info"><i class="bi bi-file-earmark-pdf"></i> Lihat Mutasi</a>
                                @else
                                    <span class="text-muted">Tidak ada (Siswa Baru)</span>
                                @endif
                            </td>
                        </tr>
                        {{-- Penambahan Transkip 1 - 5 --}}
                        @for($i = 1; $i <= 5; $i++)
                        @php $transkip_field = 'transkip' . $i . '_path'; @endphp
                        <tr>
                            <th>Transkip {{ $i }}</th>
                            <td>
                                @if ($pendaftaran->$transkip_field)
                                    <a href="{{ Storage::url($pendaftaran->$transkip_field) }}" target="_blank" class="doc-link text-info"><i class="bi bi-file-earmark-pdf"></i> Lihat Transkip {{ $i }}</a>
                                @else
                                    <span class="text-muted">File tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        @endfor
                        <tr>
                            <th>Bukti Pembayaran</th>
                            <td>
                                @if ($pendaftaran->bukti_pembayaran_path)
                                    <a href="{{ Storage::url($pendaftaran->bukti_pembayaran_path) }}" target="_blank" class="doc-link text-success"><i class="bi bi-check-circle"></i> Lihat Bukti Pembayaran</a>
                                @else
                                    <span class="text-danger">Belum mengunggah bukti</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
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