@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container pb-5">
            <h2 class="text-center mb-4">{{ __('messages.step2_title') }}</h2>
            
            <form method="POST" action="{{ route('pendaftaran.step3') }}" id="registrationForm">
                @csrf
                {{-- Hidden Inputs dari Session --}}
                <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
                <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
                <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
                <input type="hidden" name="form_hash" id="form_hash">

                <div class="card shadow-sm mb-4 border-primary">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">1. Data Pokok Siswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Nama Lengkap --}}
                            <div class="col-md-12 mb-3">
                                <label for="nama_siswa" class="form-label font-weight-bold">{{ __('messages.nama_siswa') }}</label>
                                <input type="text" class="form-control no-select" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin" class="form-label">{{ __('messages.jenis_kelamin') }}</label>
                                <select class="form-control custom-select no-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>{{ __('messages.laki_laki') }}</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>{{ __('messages.perempuan') }}</option>
                                </select>
                            </div>

                            {{-- NISN --}}
                            <div class="col-md-6 mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control no-select" id="nisn" name="nisn" value="{{ old('nisn') }}">
                            </div>

                            {{-- Tempat & Tanggal Lahir --}}
                            <div class="col-md-6 mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control no-select" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">{{ __('messages.tanggal_lahir') }}</label>
                                <input type="date" class="form-control no-select" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            </div>

                            {{-- Agama & Asal Sekolah --}}
                            <div class="col-md-6 mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-control custom-select no-select" id="agama" name="agama">
                                    <option value="Islam" {{ old('agama', 'Islam') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control no-select" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}">
                            </div>

                            {{-- Fisik --}}
                            <div class="col-md-3 mb-3">
                                <label for="tinggi" class="form-label">{{ __('messages.tinggi') }}</label>
                                <input type="number" step="0.1" class="form-control no-select" id="tinggi" name="tinggi" value="{{ old('tinggi') }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="berat_badan" class="form-label">{{ __('messages.berat_badan') }}</label>
                                <input type="number" step="0.1" class="form-control no-select" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penyakit_bawaan" class="form-label">{{ __('messages.penyakit_bawaan') }}</label>
                                <input type="text" class="form-control no-select" id="penyakit_bawaan" name="penyakit_bawaan" value="{{ old('penyakit_bawaan') }}">
                            </div>

                            {{-- Keluarga --}}
                            <div class="col-md-3 mb-3">
                                <label for="anak_ke" class="form-label">{{ __('messages.anak_ke') }}</label>
                                <input type="number" class="form-control no-select" id="anak_ke" name="anak_ke" value="{{ old('anak_ke') }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="jumlah_saudara" class="form-label">{{ __('messages.jumlah_saudara') }}</label>
                                <input type="number" class="form-control no-select" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara') }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="golongan_darah" class="form-label">Gol. Darah</label>
                                <input type="text" class="form-control no-select" id="golongan_darah" name="golongan_darah" value="{{ old('golongan_darah') }}">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="no_whatsapp" class="form-label">{{ __('messages.no_whatsapp') }}</label>
                                <input type="text" class="form-control no-select" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4 border-success">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">2. Data Alamat Siswa</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Alamat Utama --}}
                            <div class="col-md-8 mb-3">
                                <label for="alamat" class="form-label">{{ __('messages.alamat') }}</label>
                                <input type="text" class="form-control no-select" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="rt" class="form-label">{{ __('messages.rt') }}</label>
                                <input type="text" class="form-control no-select" id="rt" name="rt" value="{{ old('rt') }}" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="rw" class="form-label">{{ __('messages.rw') }}</label>
                                <input type="text" class="form-control no-select" id="rw" name="rw" value="{{ old('rw') }}" required>
                            </div>

                            {{-- Provinsi --}}
                            <div class="col-md-6 mb-3">
                                <label for="provinsi" class="form-label">{{ __('messages.provinsi') }}</label>
                                <div class="select-wrapper">
                                    <select class="form-control custom-select no-select" id="provinsi" name="provinsi_select" required>
                                        <option value="">{{ __('messages.select_provinsi') }}</option>
                                    </select>
                                </div>
                                <div id="provinsi_manual" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control no-select" id="provinsi_manual_input" name="provinsi" placeholder="{{ __('messages.input_provinsi') }}" value="{{ old('provinsi') }}">
                                </div>
                            </div>

                            {{-- Kota --}}
                            <div class="col-md-6 mb-3">
                                <label for="kota" class="form-label">{{ __('messages.kota') }}</label>
                                <div class="select-wrapper">
                                    <select class="form-control custom-select no-select" id="kota" name="kota_select" required>
                                        <option value="">{{ __('messages.select_kota') }}</option>
                                    </select>
                                </div>
                                <div id="kota_manual" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control no-select" id="kota_manual_input" name="kota" placeholder="{{ __('messages.input_kota') }}" value="{{ old('kota') }}">
                                </div>
                            </div>

                            {{-- Kecamatan --}}
                            <div class="col-md-4 mb-3">
                                <label for="kecamatan" class="form-label">{{ __('messages.kecamatan') }}</label>
                                <div class="select-wrapper">
                                    <select class="form-control custom-select no-select" id="kecamatan" name="kecamatan_select" required>
                                        <option value="">{{ __('messages.select_kecamatan') }}</option>
                                    </select>
                                </div>
                                <div id="kecamatan_manual" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control no-select" id="kecamatan_manual_input" name="kecamatan" placeholder="{{ __('messages.input_kecamatan') }}" value="{{ old('kecamatan') }}">
                                </div>
                            </div>

                            {{-- Kelurahan --}}
                            <div class="col-md-4 mb-3">
                                <label for="kelurahan" class="form-label">{{ __('messages.kelurahan') }}</label>
                                <div class="select-wrapper">
                                    <select class="form-control custom-select no-select" id="kelurahan" name="kelurahan_select" required>
                                        <option value="">{{ __('messages.select_kelurahan') }}</option>
                                    </select>
                                </div>
                                <div id="kelurahan_manual" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control no-select" id="kelurahan_manual_input" name="kelurahan" placeholder="{{ __('messages.input_kelurahan') }}" value="{{ old('kelurahan') }}">
                                </div>
                            </div>

                            {{-- Kode Pos --}}
                            <div class="col-md-4 mb-3">
                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control no-select" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('pendaftaran.step1') }}" class="btn btn-secondary px-4">{{ __('messages.kembali') }}</a>
                    <button type="submit" class="btn btn-success px-5">{{ __('messages.next') }}</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/address.js') }}?v=2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Date picker logic
            const dateInput = document.getElementById('tanggal_lahir');
            if (dateInput) {
                dateInput.addEventListener('focus', function () {
                    try { this.showPicker(); } catch (e) { console.log('showPicker error:', e); }
                });
            }

            // Keamanan: Cegah Klik Kanan & DevTools
            document.addEventListener('contextmenu', e => e.preventDefault());
            document.addEventListener('keydown', function (e) {
                if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && ['I','C','J'].includes(e.key)) || (e.ctrlKey && e.key === 'U')) {
                    e.preventDefault();
                }
            });

            // Fungsi Hash Tampering (Menambahkan field baru ke list deteksi)
            function generateFormHash() {
                const fields = [
                    'nama_siswa', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'rt', 'rw',
                    'provinsi_select', 'provinsi_manual_input', 'kota_select', 'kota_manual_input',
                    'kecamatan_select', 'kecamatan_manual_input', 'kelurahan_select', 'kelurahan_manual_input',
                    'penyakit_bawaan', 'tinggi', 'berat_badan', 'anak_ke', 'jumlah_saudara', 'no_whatsapp',
                    'tempat_lahir', 'nisn', 'agama', 'asal_sekolah', 'golongan_darah', 'kode_pos'
                ];
                let data = '';
                fields.forEach(id => {
                    const input = document.getElementById(id);
                    if (input && input.value) { data += input.value; }
                });
                let hash = 0;
                for (let i = 0; i < data.length; i++) {
                    hash = ((hash << 5) - hash + data.charCodeAt(i)) | 0;
                }
                return hash.toString();
            }

            const form = document.getElementById('registrationForm');
            const formHash = document.getElementById('form_hash');

            form.addEventListener('input', () => formHash.value = generateFormHash());
            form.addEventListener('change', () => formHash.value = generateFormHash());
            formHash.value = generateFormHash();

            // Submit handling (Validasi Address & Name Swapping)
            form.addEventListener('submit', function (e) {
                const currentHash = generateFormHash();
                if (formHash.value !== currentHash) {
                    e.preventDefault();
                    alert('{{ __('messages.form_tampered') }}');
                    return false;
                }

                // Logic validasi alamat manual jika select kosong
                const ids = ['provinsi', 'kota', 'kecamatan', 'kelurahan'];
                for (let id of ids) {
                    const sel = document.getElementById(id);
                    const man = document.getElementById(id + '_manual_input');
                    if (!sel.value && !man.value.trim()) {
                        e.preventDefault();
                        alert('Harap isi field ' + id);
                        return false;
                    }
                }

                // Swapping name attribute (Logic asli tetap terjaga)
                ids.forEach(id => {
                    const sel = document.getElementById(id);
                    const man = document.getElementById(id + '_manual_input');
                    if (sel.value === 'lainnya') {
                        sel.name = ''; 
                        man.name = id;
                    } else {
                        sel.name = id + '_select';
                        man.name = '';
                    }
                });
            });
        });
    </script>
@endsection