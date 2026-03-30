@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 mt-5">
        <div class="container">
            <h2 class="text-center mb-4">{{ __('messages.step4_title') }}</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('pendaftaran.step4') }}"> {{-- Action now points to the Documents step --}}
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_ayah" class="form-label">{{ __('messages.nama_ayah') }}</label>
                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah ?? '') }}" required>
                        @error('nama_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_ibu" class="form-label">{{ __('messages.nama_ibu') }}</label>
                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu ?? '') }}" required>
                        @error('nama_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ayah" class="form-label">{{ __('messages.pekerjaan_ayah') }}</label>
                        <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah ?? '') }}" required>
                        @error('pekerjaan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pekerjaan_ibu" class="form-label">{{ __('messages.pekerjaan_ibu') }}</label>
                        <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu ?? '') }}" required>
                        @error('pekerjaan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ayah" class="form-label">{{ __('messages.pendidikan_ayah') }}</label>
                        <select class="form-control custom-select @error('pendidikan_ayah') is-invalid @enderror" id="pendidikan_ayah" name="pendidikan_ayah" required>
                            <option value="">{{ __('messages.select_pendidikan_ayah') }}</option>
                            <option value="SD" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                            <option value="SMP" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                            <option value="SMA" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                            <option value="D3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_ayah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pendidikan_ibu" class="form-label">{{ __('messages.pendidikan_ibu') }}</label>
                        <select class="form-control custom-select @error('pendidikan_ibu') is-invalid @enderror" id="pendidikan_ibu" name="pendidikan_ibu" required>
                            <option value="">{{ __('messages.select_pendidikan_ibu') }}</option>
                            <option value="SD" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                            <option value="SMP" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                            <option value="SMA" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                            <option value="D3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="S1" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                        @error('pendidikan_ibu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_hp" class="form-label">{{ __('messages.no_hp') }}</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp ?? '') }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="alamat_email" class="form-label">{{ __('messages.alamat_email') }}</label>
                        <input type="email" class="form-control @error('alamat_email') is-invalid @enderror" id="alamat_email" name="alamat_email" value="{{ old('alamat_email', $pendaftaran->alamat_email ?? '') }}" required>
                        @error('alamat_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sumber_informasi" class="form-label">{{ __('messages.sumber_informasi') }}</label>
                        <select class="form-control custom-select @error('sumber_informasi') is-invalid @enderror" id="sumber_informasi" name="sumber_informasi" required>
                            <option value="">{{ __('messages.select_sumber_informasi') }}</option>
                            <option value="Website" {{ old('sumber_informasi', $pendaftaran->sumber_informasi ?? '') == 'Website' ? 'selected' : '' }}>{{ __('messages.website') }}</option>
                            <option value="Media Sosial" {{ old('sumber_informasi', $pendaftaran->sumber_informasi ?? '') == 'Media Sosial' ? 'selected' : '' }}>{{ __('messages.media_sosial') }}</option>
                            <option value="Teman/Keluarga" {{ old('sumber_informasi', $pendaftaran->sumber_informasi ?? '') == 'Teman/Keluarga' ? 'selected' : '' }}>{{ __('messages.teman_keluarga') }}</option>
                            <option value="Iklan" {{ old('sumber_informasi', $pendaftaran->sumber_informasi ?? '') == 'Iklan' ? 'selected' : '' }}>{{ __('messages.iklan') }}</option>
                            <option value="Lainnya" {{ old('sumber_informasi', $pendaftaran->sumber_informasi ?? '') == 'Lainnya' ? 'selected' : '' }}>{{ __('messages.lainnya') }}</option>
                        </select>
                        @error('sumber_informasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ __('messages.next') }}</button>
                <a href="{{ route('pendaftaran.step2') }}" class="btn btn-secondary">{{ __('messages.kembali') }}</a>
            </form>
        </div>
    </div>
@endsection