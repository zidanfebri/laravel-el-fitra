<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #4169E1; color: white; }
        h2 { text-align: center; }
        .filter-info { margin-bottom: 20px; font-style: italic; }
    </style>
</head>
<body>
    <h2>Laporan Data Siswa</h2>
    <div class="filter-info">
        @if ($jenjang) Jenjang: {{ $jenjang }} @endif
        @if ($tanggalAwal && $tanggalAkhir) | Tanggal: {{ $tanggalAwal }} - {{ $tanggalAkhir }} @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>Jenis Pendaftaran</th>
                <th>Jenjang</th>
                <th>Tingkat</th>
                <th>Nama Siswa</th>
                <th>Tanggal Pendaftaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->jenis_pendaftaran }}</td>
                    <td>{{ $pendaftaran->jenjang }}</td>
                    <td>{{ $pendaftaran->tingkat }}</td>
                    <td>{{ $pendaftaran->nama_siswa }}</td>
                    <td>{{ $pendaftaran->tanggal_pendaftaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>