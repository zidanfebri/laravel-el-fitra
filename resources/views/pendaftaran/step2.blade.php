@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">{{ __('messages.step2_title') }}</h2>
            <form method="POST" action="{{ route('pendaftaran.step3') }}">
                @csrf
                <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
                <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
                <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_siswa" class="form-label">{{ __('messages.nama_siswa') }}</label>
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">{{ __('messages.tanggal_lahir') }}</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jenis_kelamin" class="form-label">{{ __('messages.jenis_kelamin') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>{{ __('messages.laki_laki') }}</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>{{ __('messages.perempuan') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">{{ __('messages.alamat') }}</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="rt" class="form-label">{{ __('messages.rt') }}</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="{{ old('rt') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="rw" class="form-label">{{ __('messages.rw') }}</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="{{ old('rw') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="provinsi" class="form-label">{{ __('messages.provinsi') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="provinsi" name="provinsi" required>
                                <option value="">{{ __('messages.select_provinsi') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kota" class="form-label">{{ __('messages.kota') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kota" name="kota" required>
                                <option value="">{{ __('messages.select_kota') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan" class="form-label">{{ __('messages.kecamatan') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kecamatan" name="kecamatan" required>
                                <option value="">{{ __('messages.select_kecamatan') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan" class="form-label">{{ __('messages.kelurahan') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="kelurahan" name="kelurahan" required>
                                <option value="">{{ __('messages.select_kelurahan') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="penyakit_bawaan" class="form-label">{{ __('messages.penyakit_bawaan') }}</label>
                        <input type="text" class="form-control" id="penyakit_bawaan" name="penyakit_bawaan" value="{{ old('penyakit_bawaan') }}">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="tinggi" class="form-label">{{ __('messages.tinggi') }}</label>
                        <input type="number" step="0.1" class="form-control" id="tinggi" name="tinggi" value="{{ old('tinggi') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="berat_badan" class="form-label">{{ __('messages.berat_badan') }}</label>
                        <input type="number" step="0.1" class="form-control" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="anak_ke" class="form-label">{{ __('messages.anak_ke') }}</label>
                        <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="{{ old('anak_ke') }}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="jumlah_saudara" class="form-label">{{ __('messages.jumlah_saudara') }}</label>
                        <input type="number" class="form-control" id="jumlah_saudara" name="jumlah_saudara" value="{{ old('jumlah_saudara') }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ __('messages.next') }}</button>
                <a href="{{ route('pendaftaran.step1') }}" class="btn btn-secondary">{{ __('messages.kembali') }}</a>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Date picker on focus
            const dateInput = document.getElementById('tanggal_lahir');
            if (dateInput) {
                dateInput.addEventListener('focus', function () {
                    try {
                        this.showPicker();
                    } catch (e) {
                        console.log('showPicker not supported:', e);
                    }
                });
            }

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
                provinsiSelect.appendChild(option);
            });

            provinsiSelect.addEventListener('change', function () {
                kotaSelect.innerHTML = '<option value="">{{ __("messages.select_kota") }}</option>';
                kecamatanSelect.innerHTML = '<option value="">{{ __("messages.select_kecamatan") }}</option>';
                kelurahanSelect.innerHTML = '<option value="">{{ __("messages.select_kelurahan") }}</option>';
                if (this.value) {
                    Object.keys(addressData[this.value]).forEach(kota => {
                        const option = document.createElement('option');
                        option.value = kota;
                        option.text = kota;
                        kotaSelect.appendChild(option);
                    });
                }
            });

            kotaSelect.addEventListener('change', function () {
                kecamatanSelect.innerHTML = '<option value="">{{ __("messages.select_kecamatan") }}</option>';
                kelurahanSelect.innerHTML = '<option value="">{{ __("messages.select_kelurahan") }}</option>';
                if (this.value && provinsiSelect.value) {
                    Object.keys(addressData[provinsiSelect.value][this.value]).forEach(kecamatan => {
                        const option = document.createElement('option');
                        option.value = kecamatan;
                        option.text = kecamatan;
                        kecamatanSelect.appendChild(option);
                    });
                }
            });

            kecamatanSelect.addEventListener('change', function () {
                kelurahanSelect.innerHTML = '<option value="">{{ __("messages.select_kelurahan") }}</option>';
                if (this.value && kotaSelect.value && provinsiSelect.value) {
                    addressData[provinsiSelect.value][kotaSelect.value][this.value].forEach(kelurahan => {
                        const option = document.createElement('option');
                        option.value = kelurahan;
                        option.text = kelurahan;
                        kelurahanSelect.appendChild(option);
                    });
                }
            });
        });
    </script>
@endsection