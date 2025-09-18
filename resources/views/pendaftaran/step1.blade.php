@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="margin-top: 100px">{{ __('messages.step1_title') }}</h2>
        <form method="POST" action="{{ route('pendaftaran.step2') }}" id="pendaftaranForm">
            @csrf
            <div class="mb-3">
                <label for="jenis_pendaftaran" class="form-label">{{ __('messages.jenis_pendaftaran') }}</label>
                <div class="select-wrapper">
                    <select class="form-control custom-select" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                        <option value="">{{ __('messages.select_jenis_pendaftaran') }}</option>
                        <option value="baru" {{ old('jenis_pendaftaran') == 'baru' ? 'selected' : '' }}>{{ __('messages.baru') }}</option>
                        <option value="pindahan" {{ old('jenis_pendaftaran') == 'pindahan' ? 'selected' : '' }}>{{ __('messages.pindahan') }}</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">{{ __('messages.jenjang') }}</label>
                <div class="select-wrapper">
                    <select class="form-control custom-select" id="jenjang" name="jenjang" required>
                        <option value="">{{ __('messages.select_jenjang') }}</option>
                        <option value="TK" {{ old('jenjang') == 'TK' ? 'selected' : '' }}>{{ __('messages.tk') }}</option>
                        <option value="SD" {{ old('jenjang') == 'SD' ? 'selected' : '' }}>{{ __('messages.sd') }}</option>
                        <option value="SMP" {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>{{ __('messages.smp') }}</option>
                        <option value="SMA" {{ old('jenjang') == 'SMA' ? 'selected' : '' }}>{{ __('messages.sma') }}</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="tingkat" class="form-label">{{ __('messages.tingkat') }}</label>
                <div class="select-wrapper">
                    <select class="form-control custom-select" id="tingkat" name="tingkat" required>
                        <option value="">{{ __('messages.select_tingkat') }}</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">{{ __('messages.next') }}</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                    tingkatSelect.appendChild(option);
                });
            }

            // Event listener untuk jenis pendaftaran dan jenjang
            document.getElementById('jenis_pendaftaran').addEventListener('change', updateTingkat);
            document.getElementById('jenjang').addEventListener('change', updateTingkat);
        });
    </script>
@endsection