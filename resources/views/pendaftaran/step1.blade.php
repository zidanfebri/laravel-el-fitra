@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Pendaftaran Siswa Baru El-Fitra</h2>
        <form method="POST" action="{{ route('pendaftaran.step2') }}" id="pendaftaranForm">
            @csrf
            <div class="mb-3">
                <label for="jenis_pendaftaran" class="form-label">Jenis Pendaftaran</label>
                <select class="form-control" id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                    <option value="baru">Baru</option>
                    <option value="pindahan">Pindahan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jenjang" class="form-label">Jenjang Pendidikan</label>
                <select class="form-control" id="jenjang" name="jenjang" required onchange="updateTingkat()">
                    <option value="">Pilih Jenjang</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tingkat" class="form-label">Tingkat</label>
                <select class="form-control" id="tingkat" name="tingkat" required>
                    <option value="">Pilih Tingkat</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Next</button>
        </form>
    </div>

    <script>
        function updateTingkat() {
            const jenjang = document.getElementById('jenjang').value;
            const tingkatSelect = document.getElementById('tingkat');
            tingkatSelect.innerHTML = '<option value="">Pilih Tingkat</option>';

            let tingkats = [];
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

            tingkats.forEach(tingkat => {
                const option = document.createElement('option');
                option.value = tingkat;
                option.text = tingkat;
                tingkatSelect.appendChild(option);
            });
        }
    </script>
@endsection