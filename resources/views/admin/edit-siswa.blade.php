<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa - El-Fitra</title>
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
        <h2 class="mb-4" id="contentTitle">Edit Data Siswa</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
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
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                                <option value="baru" {{ old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran) == 'baru' ? 'selected' : '' }}>Baru</option>
                                <option value="pindahan" {{ old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran) == 'pindahan' ? 'selected' : '' }}>Pindahan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
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
                    <div class="col-md-6 mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="tingkat" name="tingkat" required>
                                <option value="">{{ __('messages.select_tingkat') }}</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $pendaftaran->nama_siswa) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $pendaftaran->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $pendaftaran->alamat) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{ old('rt', $pendaftaran->rt) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{ old('rw', $pendaftaran->rw) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="provinsi" name="provinsi" required>
                                <option value="">Pilih Provinsi</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kota" name="kota" required>
                                <option value="">Pilih Kota/Kabupaten</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kecamatan" name="kecamatan" required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kelurahan" name="kelurahan" required>
                                <option value="">Pilih Kelurahan</option>
                            </select>
                            <i class="bi bi-chevron-down select-icon"></i>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="penyakit_bawaan" class="form-label">Penyakit Bawaan (opsional)</label>
                        <input type="text" class="form-control" id="penyakit_bawaan" name="penyakit_bawaan" value="{{ old('penyakit_bawaan', $pendaftaran->penyakit_bawaan) }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
                        <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="{{ old('tinggi', $pendaftaran->tinggi) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="berat_badan" class="form-label">Berat Badan (kg)</label>
                        <input type="number" step="0.1" class="form-control" id="berat_badan" name="berat_badan" value="{{ old('berat_badan', $pendaftaran->berat_badan) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="anak_ke" class="form-label">Anak ke-</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="{{ old('anak_ke', $pendaftaran->anak_ke) }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="jumlah_saudara" class="form-label">Jumlah Saudara</label>
                        <input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara', $pendaftaran->jumlah_saudara) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_ayah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ayah" name="pendidikan_ayah" required>
                                <option value="">Pilih Pendidikan</option>
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
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ibu" name="pendidikan_ibu" required>
                                <option value="">Pilih Pendidikan</option>
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
                    <div class="col-md-6 mb-3">
                        <label for="no_hp" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_whatsapp" class="form-label">No. WhatsApp</label>
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp', $pendaftaran->no_whatsapp) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat_email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="alamat_email" name="alamat_email" value="{{ old('alamat_email', $pendaftaran->alamat_email) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sumber_informasi" class="form-label">Sumber Informasi</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="sumber_informasi" name="sumber_informasi" required>
                                <option value="">Pilih Sumber Informasi</option>
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
                        <label for="akte_path" class="form-label">Akte (PDF, maks 2MB)</label>
                        <input type="file" class="form-control" id="akte_path" name="akte_path" accept="application/pdf">
                        @if ($pendaftaran->akte_path)
                            <a href="{{ Storage::url($pendaftaran->akte_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat Akte</a>
                        @else
                            <span class="text-danger">Akte tidak tersedia</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kk_path" class="form-label">Kartu Keluarga (PDF, maks 2MB)</label>
                        <input type="file" class="form-control" id="kk_path" name="kk_path" accept="application/pdf">
                        @if ($pendaftaran->kk_path)
                            <a href="{{ Storage::url($pendaftaran->kk_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat KK</a>
                        @else
                            <span class="text-danger">KK tidak tersedia</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="mutasi_path" class="form-label">Mutasi (PDF, maks 2MB, opsional)</label>
                        <input type="file" class="form-control" id="mutasi_path" name="mutasi_path" accept="application/pdf">
                        @if ($pendaftaran->mutasi_path)
                            <a href="{{ Storage::url($pendaftaran->mutasi_path) }}" target="_blank" class="btn btn-info btn-sm mt-2"><i class="bi bi-file-earmark-pdf"></i> Lihat Mutasi</a>
                        @else
                            <span class="text-danger">Mutasi tidak tersedia</span>
                        @endif
                    </div>
                </div>
                <div class="mt-3 action-buttons">
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i> Update</button>
                    <a href="{{ route('admin.data-siswa') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
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

            const tanggalLahirInput = document.getElementById('tanggal_lahir');
            tanggalLahirInput.addEventListener('focus', function() {
                if (typeof this.showPicker === 'function') {
                    this.showPicker();
                }
            });

            // Dynamic dropdowns for address
            const provinsiSelect = document.getElementById('provinsi');
            const kotaSelect = document.getElementById('kota');
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanSelect = document.getElementById('kelurahan');

            const addressData = {
                "Jawa Barat": {
                    "Bandung": {
                        "Cibeunying Kaler": ["Cihapit", "Cihaur Geulis", "Neglasari"],
                        "Cibeunying Kidul": ["Padasuka", "Sukamaju", "Cicadas"],
                        "Bandung Wetan": ["Taman Sari", "Citarum", "Tamansari"],
                    },
                    "Bogor": {
                        "Bogor Selatan": ["Batutulis", "Bondongan", "Muarasari"],
                        "Bogor Tengah": ["Cibogor", "Pabaton", "Gudang"],
                    }
                },
                "Jawa Timur": {
                    "Surabaya": {
                        "Gubeng": ["Kertajaya", "Pucang Sewu", "Airlangga"],
                        "Tegalsari": ["Kedungdoro", "Dr. Soetomo", "Keputran"],
                    },
                    "Malang": {
                        "Klojen": ["Sukoharjo", "Kasin", "Oro-oro Dowo"],
                        "Lowokwaru": ["Tulusrejo", "Mojolangu", "Sumbersari"],
                    }
                }
            };

            // Populate provinsi
            Object.keys(addressData).forEach(provinsi => {
                const option = document.createElement('option');
                option.value = provinsi;
                option.text = provinsi;
                if (provinsi === "{{ old('provinsi', $pendaftaran->provinsi) }}") {
                    option.selected = true;
                }
                provinsiSelect.appendChild(option);
            });

            provinsiSelect.addEventListener('change', function () {
                kotaSelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                if (this.value) {
                    Object.keys(addressData[this.value]).forEach(kota => {
                        const option = document.createElement('option');
                        option.value = kota;
                        option.text = kota;
                        if (kota === "{{ old('kota', $pendaftaran->kota) }}") {
                            option.selected = true;
                        }
                        kotaSelect.appendChild(option);
                    });
                    kotaSelect.dispatchEvent(new Event('change'));
                }
            });

            kotaSelect.addEventListener('change', function () {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                if (this.value && provinsiSelect.value) {
                    Object.keys(addressData[provinsiSelect.value][this.value]).forEach(kecamatan => {
                        const option = document.createElement('option');
                        option.value = kecamatan;
                        option.text = kecamatan;
                        if (kecamatan === "{{ old('kecamatan', $pendaftaran->kecamatan) }}") {
                            option.selected = true;
                        }
                        kecamatanSelect.appendChild(option);
                    });
                    kecamatanSelect.dispatchEvent(new Event('change'));
                }
            });

            kecamatanSelect.addEventListener('change', function () {
                kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';
                if (this.value && kotaSelect.value && provinsiSelect.value) {
                    addressData[provinsiSelect.value][kotaSelect.value][this.value].forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan;
                        option.text = kelurahan;
                        if (kelurahan === "{{ old('kelurahan', $pendaftaran->kelurahan) }}") {
                            option.selected = true;
                        }
                        kelurahanSelect.appendChild(option);
                    });
                }
            });

            // Trigger change events to populate initial values
            if ("{{ old('provinsi', $pendaftaran->provinsi) }}") {
                provinsiSelect.dispatchEvent(new Event('change'));
            }
            if ("{{ old('kota', $pendaftaran->kota) }}") {
                kotaSelect.dispatchEvent(new Event('change'));
            }
            if ("{{ old('kecamatan', $pendaftaran->kecamatan) }}") {
                kecamatanSelect.dispatchEvent(new Event('change'));
            }

            // Dynamic dropdown for tingkat
            function updateTingkat() {
                const jenisPendaftaran = document.getElementById('jenis_pendaftaran').value;
                const jenjang = document.getElementById('jenjang').value;
                const tingkatSelect = document.getElementById('tingkat');
                tingkatSelect.innerHTML = '<option value="">{{ __("messages.select_tingkat") }}</option>';

                let tingkats = [];
                if (jenisPendaftaran === 'baru') {
                    switch (jenjang) {
                        case 'TK':
                            tingkats = ['TK A', 'TK B'];
                            break;
                        case 'SD':
                            tingkats = ['SD Kelas 1'];
                            break;
                        case 'SMP':
                            tingkats = ['SMP Kelas 7'];
                            break;
                        case 'SMA':
                            tingkats = ['SMA Kelas 10'];
                            break;
                    }
                } else if (jenisPendaftaran === 'pindahan') {
                    switch (jenjang) {
                        case 'TK':
                            tingkats = ['TK A', 'TK B'];
                            break;
                        case 'SD':
                            for (let i = 1; i <= 6; i++) tingkats.push(`SD Kelas ${i}`);
                            break;
                        case 'SMP':
                            for (let i = 7; i <= 9; i++) tingkats.push(`SMP Kelas ${i}`);
                            break;
                        case 'SMA':
                            for (let i = 10; i <= 12; i++) tingkats.push(`SMA Kelas ${i}`);
                            break;
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

            // Event listeners for jenis_pendaftaran and jenjang
            document.getElementById('jenis_pendaftaran').addEventListener('change', updateTingkat);
            document.getElementById('jenjang').addEventListener('change', updateTingkat);

            // Trigger updateTingkat on page load to set initial value
            updateTingkat();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>