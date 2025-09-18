@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">{{ __('messages.step3_title') }}</h2>
            <form method="POST" action="{{ route('pendaftaran.step4') }}">
                @csrf
                <input type="hidden" name="jenis_pendaftaran" value="{{ session('pendaftaran.jenis_pendaftaran') }}">
                <input type="hidden" name="jenjang" value="{{ session('pendaftaran.jenjang') }}">
                <input type="hidden" name="tingkat" value="{{ session('pendaftaran.tingkat') }}">
                <input type="hidden" name="nama_siswa" value="{{ session('pendaftaran.nama_siswa') }}">
                <input type="hidden" name="tanggal_lahir" value="{{ session('pendaftaran.tanggal_lahir') }}">
                <input type="hidden" name="jenis_kelamin" value="{{ session('pendaftaran.jenis_kelamin') }}">
                <input type="hidden" name="alamat" value="{{ session('pendaftaran.alamat') }}">
                <input type="hidden" name="rt" value="{{ session('pendaftaran.rt') }}">
                <input type="hidden" name="rw" value="{{ session('pendaftaran.rw') }}">
                <input type="hidden" name="kelurahan" value="{{ session('pendaftaran.kelurahan') }}">
                <input type="hidden" name="kecamatan" value="{{ session('pendaftaran.kecamatan') }}">
                <input type="hidden" name="kota" value="{{ session('pendaftaran.kota') }}">
                <input type="hidden" name="provinsi" value="{{ session('pendaftaran.provinsi') }}">
                <input type="hidden" name="penyakit_bawaan" value="{{ session('pendaftaran.penyakit_bawaan') }}">
                <input type="hidden" name="tinggi" value="{{ session('pendaftaran.tinggi') }}">
                <input type="hidden" name="berat_badan" value="{{ session('pendaftaran.berat_badan') }}">
                <input type="hidden" name="anak_ke" value="{{ session('pendaftaran.anak_ke') }}">
                <input type="hidden" name="jumlah_saudara" value="{{ session('pendaftaran.jumlah_saudara') }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_ayah" class="form-label">{{ __('messages.nama_ayah') }}</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_ibu" class="form-label">{{ __('messages.nama_ibu') }}</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ayah" class="form-label">{{ __('messages.pekerjaan_ayah') }}</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ibu" class="form-label">{{ __('messages.pekerjaan_ibu') }}</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ayah" class="form-label">{{ __('messages.pendidikan_ayah') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ayah" name="pendidikan_ayah" required>
                                <option value="">{{ __('messages.select_pendidikan_ayah') }}</option>
                                <option value="SD" {{ old('pendidikan_ayah') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                                <option value="SMP" {{ old('pendidikan_ayah') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                                <option value="SMA" {{ old('pendidikan_ayah') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                                <option value="D3" {{ old('pendidikan_ayah') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_ayah') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ayah') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ayah') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ibu" class="form-label">{{ __('messages.pendidikan_ibu') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="pendidikan_ibu" name="pendidikan_ibu" required>
                                <option value="">{{ __('messages.select_pendidikan_ibu') }}</option>
                                <option value="SD" {{ old('pendidikan_ibu') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                                <option value="SMP" {{ old('pendidikan_ibu') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                                <option value="SMA" {{ old('pendidikan_ibu') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                                <option value="D3" {{ old('pendidikan_ibu') == 'D3' ? 'selected' : '' }}>D3</option>
                                <option value="S1" {{ old('pendidikan_ibu') == 'S1' ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('pendidikan_ibu') == 'S2' ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('pendidikan_ibu') == 'S3' ? 'selected' : '' }}>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_hp" class="form-label">{{ __('messages.no_hp') }}</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_whatsapp" class="form-label">{{ __('messages.no_whatsapp') }}</label>
                        <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat_email" class="form-label">{{ __('messages.alamat_email') }}</label>
                        <input type="email" class="form-control" id="alamat_email" name="alamat_email" value="{{ old('alamat_email') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sumber_informasi" class="form-label">{{ __('messages.sumber_informasi') }}</label>
                        <div class="select-wrapper">
                            <select class="form-control custom-select" id="sumber_informasi" name="sumber_informasi" required>
                                <option value="">{{ __('messages.select_sumber_informasi') }}</option>
                                <option value="Website" {{ old('sumber_informasi') == 'Website' ? 'selected' : '' }}>{{ __('messages.website') }}</option>
                                <option value="Media Sosial" {{ old('sumber_informasi') == 'Media Sosial' ? 'selected' : '' }}>{{ __('messages.media_sosial') }}</option>
                                <option value="Teman/Keluarga" {{ old('sumber_informasi') == 'Teman/Keluarga' ? 'selected' : '' }}>{{ __('messages.teman_keluarga') }}</option>
                                <option value="Iklan" {{ old('sumber_informasi') == 'Iklan' ? 'selected' : '' }}>{{ __('messages.iklan') }}</option>
                                <option value="Lainnya" {{ old('sumber_informasi') == 'Lainnya' ? 'selected' : '' }}>{{ __('messages.lainnya') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ __('messages.next') }}</button>
                <a href="{{ route('pendaftaran.step2') }}" class="btn btn-secondary">{{ __('messages.kembali') }}</a>
            </form>
        </div>
    </div>
@endsection