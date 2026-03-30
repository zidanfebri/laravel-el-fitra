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
        .category-title {
            background-color: #f1f3f5;
            padding: 10px 15px;
            border-left: 5px solid #4169E1;
            margin: 20px 0 15px 0;
            font-weight: bold;
            color: #333;
            font-size: 1.1rem;
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
        <h2 class="mb-4" id="contentTitle">Edit Data Siswa</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger mx-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container">
            <form action="{{ route('admin.update-siswa', $pendaftaran->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="category-title">1. DATA POKOK SISWA</div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tahun_ajaran_id" class="form-label">Tahun Ajaran</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="tahun_ajaran_id" name="tahun_ajaran_id">
                                @foreach (\App\Models\TahunAjaran::all() as $tahun)
                                    <option value="{{ $tahun->id }}" {{ old('tahun_ajaran_id', $pendaftaran->tahun_ajaran_id) == $tahun->id ? 'selected' : '' }}>{{ $tahun->tahun_ajaran }}</option>
                                @endforeach
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $pendaftaran->nama_siswa) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn', $pendaftaran->nisn) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="agama" name="agama">
                                <option value="Islam" {{ old('agama', $pendaftaran->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama', $pendaftaran->agama) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Budha" {{ old('agama', $pendaftaran->agama) == 'Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ old('agama', $pendaftaran->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ? $pendaftaran->tanggal_lahir->format('Y-m-d') : '') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                                <option value="baru" {{ old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran) == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="pindahan" {{ old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran) == 'pindahan' ? 'selected' : '' }}>Pindahan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jenjang" class="form-label">Jenjang</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenjang" name="jenjang" required>
                                <option value="TK" {{ old('jenjang', $pendaftaran->jenjang) == 'TK' ? 'selected' : '' }}>TK</option>
                                <option value="SD" {{ old('jenjang', $pendaftaran->jenjang) == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('jenjang', $pendaftaran->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('jenjang', $pendaftaran->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="tingkat" name="tingkat" required></select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                        <input type="number" step="0.1" class="form-control" id="berat_badan" name="berat_badan" value="{{ old('berat_badan', $pendaftaran->berat_badan) }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                        <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="{{ old('tinggi', $pendaftaran->tinggi) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="penyakit_bawaan" class="form-label">Penyakit Bawaan</label>
                        <input type="text" class="form-control" id="penyakit_bawaan" name="penyakit_bawaan" value="{{ old('penyakit_bawaan', $pendaftaran->penyakit_bawaan) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="anak_ke" class="form-label">Anak ke-</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="{{ old('anak_ke', $pendaftaran->anak_ke) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                        <input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara', $pendaftaran->jumlah_saudara) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="golongan_darah" class="form-label">Gol. Darah</label>
                        <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" value="{{ old('golongan_darah', $pendaftaran->golongan_darah) }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}">
                    </div>
                </div>

                <div class="category-title">2. DATA ALAMAT SISWA</div>
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $pendaftaran->alamat) }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{ old('rt', $pendaftaran->rt) }}" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{ old('rw', $pendaftaran->rw) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="provinsi" name="provinsi_select"></select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                        <div id="provinsi_manual" class="mt-2" style="display: none;">
                            <input type="text" class="form-control" id="provinsi_manual_input" name="provinsi" value="{{ old('provinsi', $pendaftaran->provinsi) }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kota" name="kota_select"></select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                        <div id="kota_manual" class="mt-2" style="display: none;">
                            <input type="text" class="form-control" id="kota_manual_input" name="kota" value="{{ old('kota', $pendaftaran->kota) }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kecamatan" name="kecamatan_select"></select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                        <div id="kecamatan_manual" class="mt-2" style="display: none;">
                            <input type="text" class="form-control" id="kecamatan_manual_input" name="kecamatan" value="{{ old('kecamatan', $pendaftaran->kecamatan) }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kelurahan" name="kelurahan_select"></select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                        <div id="kelurahan_manual" class="mt-2" style="display: none;">
                            <input type="text" class="form-control" id="kelurahan_manual_input" name="kelurahan" value="{{ old('kelurahan', $pendaftaran->kelurahan) }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ old('kode_pos', $pendaftaran->kode_pos) }}">
                    </div>
                </div>

                <div class="category-title">3. DATA ORANG TUA & KONTAK</div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ayah" name="pendidikan_ayah">
                                <option value="SD" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah) == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ibu" name="pendidikan_ibu">
                                <option value="SD" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="D3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu) == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="no_whatsapp" class="form-label">No. WhatsApp</label>
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp', $pendaftaran->no_whatsapp) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="alamat_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="alamat_email" name="alamat_email" value="{{ old('alamat_email', $pendaftaran->alamat_email) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sumber_informasi" class="form-label">Sumber Informasi</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="sumber_informasi" name="sumber_informasi">
                                <option value="Website" {{ old('sumber_informasi', $pendaftaran->sumber_informasi) == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Media Sosial" {{ old('sumber_informasi', $pendaftaran->sumber_informasi) == 'Media Sosial' ? 'selected' : '' }}>Media Sosial</option>
                                <option value="Teman/Keluarga" {{ old('sumber_informasi', $pendaftaran->sumber_informasi) == 'Teman/Keluarga' ? 'selected' : '' }}>Teman/Keluarga</option>
                                <option value="Iklan" {{ old('sumber_informasi', $pendaftaran->sumber_informasi) == 'Iklan' ? 'selected' : '' }}>Iklan</option>
                                <option value="Lainnya" {{ old('sumber_informasi', $pendaftaran->sumber_informasi) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status Pendaftaran</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="status" name="status" required>
                                <option value="none" {{ old('status', $pendaftaran->status) == 'none' ? 'selected' : '' }}>None</option>
                                <option value="diinput" {{ old('status', $pendaftaran->status) == 'diinput' ? 'selected' : '' }}>Diinput</option>
                                <option value="pembayaran" {{ old('status', $pendaftaran->status) == 'pembayaran' ? 'selected' : '' }}>Pembayaran</option>
                                <option value="verifikasi" {{ old('status', $pendaftaran->status) == 'verifikasi' ? 'selected' : '' }}>Verifikasi</option>
                                <option value="sukses" {{ old('status', $pendaftaran->status) == 'sukses' ? 'selected' : '' }}>Sukses</option>
                                <option value="siswa" {{ old('status', $pendaftaran->status) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="category-title">4. DOKUMEN TAMBAHAN (Update File)</div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="akte_path" class="form-label">Akte (PDF, maks 2MB)</label>
                        <input type="file" class="form-control" id="akte_path" name="akte_path" accept="application/pdf">
                        @if ($pendaftaran->akte_path)
                            <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat Akte</a>
                        @else
                            <span class="text-danger">Akte tidak tersedia</span>
                        @endif
                        @error('akte_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kk_path" class="form-label">Kartu Keluarga (PDF, maks 2MB)</label>
                        <input type="file" class="form-control" id="kk_path" name="kk_path" accept="application/pdf">
                        @if ($pendaftaran->kk_path)
                            <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat KK</a>
                        @else
                            <span class="text-danger">KK tidak tersedia</span>
                        @endif
                        @error('kk_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mutasi_path" class="form-label">Mutasi (PDF, maks 2MB, opsional)</label>
                        <input type="file" class="form-control" id="mutasi_path" name="mutasi_path" accept="application/pdf">
                        @if ($pendaftaran->mutasi_path)
                            <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat Mutasi</a>
                        @else
                            <span class="text-danger">Mutasi tidak tersedia</span>
                        @endif
                        @error('mutasi_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bukti_pembayaran_path" class="form-label">Bukti Pembayaran (PDF/JPG, maks 2MB, opsional)</label>
                        <input type="file" class="form-control" id="bukti_pembayaran_path" name="bukti_pembayaran_path" accept="application/pdf,image/jpeg,image/png">
                        @if ($pendaftaran->bukti_pembayaran_path)
                            <a href="{{ Storage::url($pendaftaran->bukti_pembayaran_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark"></i> Lihat Bukti Pembayaran</a>
                        @else
                            <span class="text-danger">Bukti Pembayaran tidak tersedia</span>
                        @endif
                        @error('bukti_pembayaran_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Transkip 1-5 --}}
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="col-md-6 mb-3">
                        @php $fieldName = "transkip{$i}_path"; @endphp
                        <label for="{{ $fieldName }}" class="form-label">Transkip {{ $i }} (PDF, maks 2MB)</label>
                        <input type="file" class="form-control" id="{{ $fieldName }}" name="{{ $fieldName }}" accept="application/pdf">
                        @if ($pendaftaran->$fieldName)
                            <a href="{{ Storage::url($pendaftaran->$fieldName) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat Transkip {{ $i }}</a>
                        @endif
                    </div>
                    @endfor
                </div>

                <div class="mt-4 action-buttons">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update Data Siswa</button>
                    <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/address.js') }}?v=3"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle
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

            // Date picker focus
            const tanggalLahirInput = document.getElementById('tanggal_lahir');
            tanggalLahirInput.addEventListener('focus', function() {
                if (typeof this.showPicker === 'function') {
                    this.showPicker();
                }
            });

            // Dynamic tingkat dropdown
            function updateTingkat() {
                const jenisPendaftaran = document.getElementById('jenis_pendaftaran').value;
                const jenjang = document.getElementById('jenjang').value;
                const tingkatSelect = document.getElementById('tingkat');
                tingkatSelect.innerHTML = '<option value="">{{ __("messages.select_tingkat") }}</option>';

                let tingkats = [];
                if (jenisPendaftaran === 'baru') {
                    switch (jenjang) {
                        case 'TK': tingkats = ['TK A', 'TK B']; break;
                        case 'SD': tingkats = ['SD Kelas 1']; break;
                        case 'SMP': tingkats = ['SMP Kelas 7']; break;
                        case 'SMA': tingkats = ['SMA Kelas 10']; break;
                    }
                } else if (jenisPendaftaran === 'pindahan') {
                    switch (jenjang) {
                        case 'TK': tingkats = ['TK A', 'TK B']; break;
                        case 'SD': for (let i = 1; i <= 6; i++) tingkats.push(`SD Kelas ${i}`); break;
                        case 'SMP': for (let i = 7; i <= 9; i++) tingkats.push(`SMP Kelas ${i}`); break;
                        case 'SMA': for (let i = 10; i <= 12; i++) tingkats.push(`SMA Kelas ${i}`); break;
                    }
                }

                tingkats.forEach(tingkat => {
                    const option = document.createElement('option');
                    option.value = tingkat;
                    option.text = tingkat;
                    if (tingkat === "{{ old('tingkat', $pendaftaran->tingkat) }}") {
                        option.selected = true;
                    }
                    tingkatSelect.appendChild(option);
                });
            }

            document.getElementById('jenis_pendaftaran').addEventListener('change', updateTingkat);
            document.getElementById('jenjang').addEventListener('change', updateTingkat);
            updateTingkat();

            // Initialize address dropdowns
            const provinsiSelect = document.getElementById('provinsi');
            const kotaSelect = document.getElementById('kota');
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanSelect = document.getElementById('kelurahan');
            const provinsiManualDiv = document.getElementById('provinsi_manual');
            const kotaManualDiv = document.getElementById('kota_manual');
            const kecamatanManualDiv = document.getElementById('kecamatan_manual');
            const kelurahanManualDiv = document.getElementById('kelurahan_manual');
            const provinsiManualInput = document.getElementById('provinsi_manual_input');
            const kotaManualInput = document.getElementById('kota_manual_input');
            const kecamatanManualInput = document.getElementById('kecamatan_manual_input');
            const kelurahanManualInput = document.getElementById('kelurahan_manual_input');

            // Pre-populate address fields
            const storedProvinsi = "{{ old('provinsi', $pendaftaran->provinsi) }}";
            const storedKota = "{{ old('kota', $pendaftaran->kota) }}";
            const storedKecamatan = "{{ old('kecamatan', $pendaftaran->kecamatan) }}";
            const storedKelurahan = "{{ old('kelurahan', $pendaftaran->kelurahan) }}";

            function initializeAddress() {
                // Check if provinsi exists in addressData
                if (addressData[storedProvinsi]) {
                    provinsiSelect.value = storedProvinsi;
                    provinsiManualDiv.style.display = 'none';
                    provinsiManualInput.name = '';
                    provinsiSelect.name = 'provinsi_select';

                    // Populate kota dropdown
                    const cities = [...new Set(Object.keys(addressData[storedProvinsi]))];
                    kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                    cities.forEach(kota => {
                        const option = document.createElement('option');
                        option.value = kota;
                        option.text = kota;
                        if (kota === storedKota) {
                            option.selected = true;
                        }
                        kotaSelect.appendChild(option);
                    });
                    kotaSelect.appendChild(createLainnyaOption());

                    // Check if kota exists
                    if (addressData[storedProvinsi][storedKota]) {
                        kotaManualDiv.style.display = 'none';
                        kotaManualInput.name = '';
                        kotaSelect.name = 'kota_select';

                        // Populate kecamatan dropdown
                        const kecamatans = [...new Set(Object.keys(addressData[storedProvinsi][storedKota]))];
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        kecamatans.forEach(kecamatan => {
                            const option = document.createElement('option');
                            option.value = kecamatan;
                            option.text = kecamatan;
                            if (kecamatan === storedKecamatan) {
                                option.selected = true;
                            }
                            kecamatanSelect.appendChild(option);
                        });
                        kecamatanSelect.appendChild(createLainnyaOption());

                        // Check if kecamatan exists
                        if (addressData[storedProvinsi][storedKota][storedKecamatan]) {
                            kecamatanManualDiv.style.display = 'none';
                            kecamatanManualInput.name = '';
                            kecamatanSelect.name = 'kecamatan_select';

                            // Populate kelurahan dropdown
                            const kelurahans = [...new Set(addressData[storedProvinsi][storedKota][storedKecamatan])];
                            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                            kelurahans.forEach(kelurahan => {
                                const option = document.createElement('option');
                                option.value = kelurahan;
                                option.text = kelurahan;
                                if (kelurahan === storedKelurahan) {
                                    option.selected = true;
                                }
                                kelurahanSelect.appendChild(option);
                            });
                            kelurahanSelect.appendChild(createLainnyaOption());

                            // Check if kelurahan exists
                            if (!kelurahans.includes(storedKelurahan) && storedKelurahan) {
                                kelurahanSelect.value = 'lainnya';
                                kelurahanManualDiv.style.display = 'block';
                                kelurahanManualInput.name = 'kelurahan';
                                kelurahanSelect.name = '';
                            }
                        } else if (storedKecamatan) {
                            kecamatanSelect.value = 'lainnya';
                            kecamatanManualDiv.style.display = 'block';
                            kecamatanManualInput.name = 'kecamatan';
                            kecamatanSelect.name = '';
                            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                            kelurahanSelect.appendChild(createLainnyaOption());
                            kelurahanSelect.value = 'lainnya';
                            kelurahanManualDiv.style.display = 'block';
                            kelurahanManualInput.name = 'kelurahan';
                            kelurahanSelect.name = '';
                        }
                    } else if (storedKota) {
                        kotaSelect.value = 'lainnya';
                        kotaManualDiv.style.display = 'block';
                        kotaManualInput.name = 'kota';
                        kotaSelect.name = '';
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        kecamatanSelect.appendChild(createLainnyaOption());
                        kecamatanSelect.value = 'lainnya';
                        kecamatanManualDiv.style.display = 'block';
                        kecamatanManualInput.name = 'kecamatan';
                        kecamatanSelect.name = '';
                        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                        kelurahanSelect.appendChild(createLainnyaOption());
                        kelurahanSelect.value = 'lainnya';
                        kelurahanManualDiv.style.display = 'block';
                        kelurahanManualInput.name = 'kelurahan';
                        kelurahanSelect.name = '';
                    }
                } else if (storedProvinsi) {
                    provinsiSelect.value = 'lainnya';
                    provinsiManualDiv.style.display = 'block';
                    provinsiManualInput.name = 'provinsi';
                    provinsiSelect.name = '';
                    kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                    kotaSelect.appendChild(createLainnyaOption());
                    kotaSelect.value = 'lainnya';
                    kotaManualDiv.style.display = 'block';
                    kotaManualInput.name = 'kota';
                    kotaSelect.name = '';
                    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                    kecamatanSelect.appendChild(createLainnyaOption());
                    kecamatanSelect.value = 'lainnya';
                    kecamatanManualDiv.style.display = 'block';
                    kecamatanManualInput.name = 'kecamatan';
                    kecamatanSelect.name = '';
                    kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                    kelurahanSelect.appendChild(createLainnyaOption());
                    kelurahanSelect.value = 'lainnya';
                    kelurahanManualDiv.style.display = 'block';
                    kelurahanManualInput.name = 'kelurahan';
                    kelurahanSelect.name = '';
                }
            }

            function createLainnyaOption() {
                const option = document.createElement('option');
                option.value = 'lainnya';
                option.text = 'Lainnya';
                return option;
            }

            initializeAddress();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>