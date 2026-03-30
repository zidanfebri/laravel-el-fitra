@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if(isset($activeTahunAjaran))
            <h2 class="text-center mb-4">{{ __('messages.registration_title') }} {{ $activeTahunAjaran->tahun_ajaran }}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('pendaftaran.step2') }}" id="pendaftaranForm">
                @csrf
                <div class="mb-3">
                    <label for="jenis_pendaftaran" class="form-label">{{ __('messages.jenis_pendaftaran') }}</label>
                    <div class="select-wrapper">
                        <select class="form-control custom-select @error('jenis_pendaftaran') is-invalid @enderror" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                            <option value="">{{ __('messages.select_jenis_pendaftaran') }}</option>
                            <option value="baru" {{ old('jenis_pendaftaran') == 'baru' ? 'selected' : '' }}>{{ __('messages.baru') }}</option>
                            <option value="pindahan" {{ old('jenis_pendaftaran') == 'pindahan' ? 'selected' : '' }}>{{ __('messages.pindahan') }}</option>
                        </select>
                    </div>
                    @error('jenis_pendaftaran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jenjang" class="form-label">{{ __('messages.jenjang') }}</label>
                    <div class="select-wrapper">
                        <select class="form-control custom-select @error('jenjang') is-invalid @enderror" id="jenjang" name="jenjang" required>
                            <option value="">{{ __('messages.select_jenjang') }}</option>
                            <option value="TK" {{ old('jenjang') == 'TK' ? 'selected' : '' }}>{{ __('messages.tk') }}</option>
                            <option value="SD" {{ old('jenjang') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                            <option value="SMP" {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                            <option value="SMA" {{ old('jenjang') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                        </select>
                    </div>
                    @error('jenjang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tingkat" class="form-label">{{ __('messages.tingkat') }}</label>
                    <div class="select-wrapper">
                        <select class="form-control custom-select @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
                            <option value="">{{ __('messages.select_tingkat') }}</option>
                        </select>
                    </div>
                    @error('tingkat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success" style="margin-bottom: 10px;">{{ __('messages.next') }}</button>
            </form>
        @else
            <h2 class="text-center mb-4">{{ __('messages.registration_closed') }}</h2>
            <div class="alert alert-info text-center">
                {{ __('messages.registration_closed_message') }}
            </div>
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.back_to_home') }}</a>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateTingkat() {
                const jenisPendaftaran = document.getElementById('jenis_pendaftaran').value;
                const jenjang = document.getElementById('jenjang').value;
                const tingkatSelect = document.getElementById('tingkat');
                
                // Clear existing options
                tingkatSelect.innerHTML = '<option value="">{{ __("messages.select_tingkat") }}</option>';

                let tingkats = [];
                if (jenisPendaftaran && jenjang) {
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
                }

                tingkats.forEach(tingkat => {
                    const option = document.createElement('option');
                    option.value = tingkat;
                    option.text = tingkat;
                    tingkatSelect.appendChild(option);
                });

                // Restore old value if exists
                const oldTingkat = "{{ old('tingkat') }}";
                if (oldTingkat && tingkats.includes(oldTingkat)) {
                    tingkatSelect.value = oldTingkat;
                }
            }

            const jenisPendaftaranSelect = document.getElementById('jenis_pendaftaran');
            const jenjangSelect = document.getElementById('jenjang');
            const form = document.getElementById('pendaftaranForm');

            if (jenisPendaftaranSelect && jenjangSelect) {
                jenisPendaftaranSelect.addEventListener('change', updateTingkat);
                jenjangSelect.addEventListener('change', updateTingkat);
                updateTingkat(); // Initial call to populate based on old values
            }

            // Prevent right-click
            document.addEventListener('contextmenu', function (e) {
                e.preventDefault();
            });

            // Prevent DevTools shortcuts
            document.addEventListener('keydown', function (e) {
                if (
                    e.key === 'F12' ||
                    (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'C' || e.key === 'J')) ||
                    (e.ctrlKey && e.key === 'U')
                ) {
                    e.preventDefault();
                }
            });

            // Validate form before submission
            form.addEventListener('submit', function (e) {
                const jenisPendaftaran = document.getElementById('jenis_pendaftaran').value;
                const jenjang = document.getElementById('jenjang').value;
                const tingkat = document.getElementById('tingkat').value;

                if (!jenisPendaftaran) {
                    e.preventDefault();
                    alert('{{ __('messages.jenis_pendaftaran_required') }}');
                    return false;
                }
                if (!jenjang) {
                    e.preventDefault();
                    alert('{{ __('messages.jenjang_required') }}');
                    return false;
                }
                if (!tingkat) {
                    e.preventDefault();
                    alert('{{ __('messages.tingkat_required') }}');
                    return false;
                }
            });
        });
    </script>
@endsection