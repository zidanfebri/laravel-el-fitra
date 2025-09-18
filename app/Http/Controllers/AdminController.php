<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
    public function dataSiswa()
    {
        $pendaftarans = Pendaftaran::paginate(10);
        if ($pendaftarans->isEmpty()) {
            Log::info('Tidak ada data di tabel pendaftarans pada ' . now());
        } else {
            Log::info('Data pendaftarans ditemukan: ' . $pendaftarans->count() . ' baris. Data: ' . $pendaftarans->toJson());
        }
        return view('admin.dashboard', compact('pendaftarans'));
    }

    public function berita(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $beritas = Berita::when($tanggal, function($query) use ($tanggal) {
            return $query->whereDate('tanggal_terbit', $tanggal);
        })->paginate(5);
        return view('admin.berita', compact('beritas'));
    }

    public function createBerita()
    {
        return view('admin.create-berita');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_terbit' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $tr = new GoogleTranslate();
        $tr->setSource('id')->setTarget('en');

        $data = $request->all();
        $data['judul_en'] = $tr->translate($request->judul);
        $data['deskripsi_en'] = $tr->translate($request->deskripsi);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function editBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.edit-berita', compact('berita'));
    }

    public function updateBerita(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal_terbit' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $tr = new GoogleTranslate();
        $tr->setSource('id')->setTarget('en');

        $berita = Berita::findOrFail($id);

        $data = $request->all();
        $data['judul_en'] = $tr->translate($request->judul);
        $data['deskripsi_en'] = $tr->translate($request->deskripsi);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function deleteBerita($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus.');
    }

    public function testimoni(Request $request)
    {
        $search = $request->input('search');
        $testimonis = Testimoni::when($search, function($query) use ($search) {
            return $query->where('nama', 'like', '%'.$search.'%');
        })->paginate(10);
        return view('admin.testimoni', compact('testimonis'));
    }

    public function createTestimoni()
    {
        return view('admin.create-testimoni');
    }

    public function storeTestimoni(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $tr = new GoogleTranslate();
        $tr->setSource('id')->setTarget('en');

        $data = $request->all();
        $data['keterangan_en'] = $tr->translate($request->keterangan);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('testimoni', 'public');
        }

        Testimoni::create($data);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function editTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.edit-testimoni', compact('testimoni'));
    }

    public function updateTestimoni(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $tr = new GoogleTranslate();
        $tr->setSource('id')->setTarget('en');

        $testimoni = Testimoni::findOrFail($id);

        $data = $request->all();
        $data['keterangan_en'] = $tr->translate($request->keterangan);

        if ($request->hasFile('gambar')) {
            if ($testimoni->gambar) {
                Storage::disk('public')->delete($testimoni->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('testimoni', 'public');
        }

        $testimoni->update($data);

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function deleteTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);

        if ($testimoni->gambar) {
            Storage::disk('public')->delete($testimoni->gambar);
        }

        $testimoni->delete();

        return redirect()->route('admin.testimoni')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function editSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.edit-siswa', compact('pendaftaran'));
    }

    public function deleteSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        if ($pendaftaran->akte_path) {
            Storage::disk('public')->delete($pendaftaran->akte_path);
        }
        if ($pendaftaran->kk_path) {
            Storage::disk('public')->delete($pendaftaran->kk_path);
        }
        if ($pendaftaran->mutasi_path) {
            Storage::disk('public')->delete($pendaftaran->mutasi_path);
        }
        $pendaftaran->delete();
        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function detailSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.detail-siswa', compact('pendaftaran'));
    }

    public function updateSiswa(Request $request, $id)
    {
        $request->validate([
            'jenis_pendaftaran' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'penyakit_bawaan' => 'nullable|string|max:255',
            'tinggi' => 'nullable|numeric|min:0',
            'berat_badan' => 'nullable|numeric|min:0',
            'anak_ke' => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:0',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'pendidikan_ayah' => 'required|string|max:255',
            'pendidikan_ibu' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'no_whatsapp' => 'required|string|max:15',
            'alamat_email' => 'required|email|max:255',
            'sumber_informasi' => 'required|string|max:255',
            'akte_path' => 'nullable|file|mimes:pdf|max:2048',
            'kk_path' => 'nullable|file|mimes:pdf|max:2048',
            'mutasi_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        $data = $request->except(['akte_path', 'kk_path', 'mutasi_path']);

        if ($request->hasFile('akte_path')) {
            if ($pendaftaran->akte_path) {
                Storage::disk('public')->delete($pendaftaran->akte_path);
            }
            $data['akte_path'] = $request->file('akte_path')->store('akte', 'public');
        }

        if ($request->hasFile('kk_path')) {
            if ($pendaftaran->kk_path) {
                Storage::disk('public')->delete($pendaftaran->kk_path);
            }
            $data['kk_path'] = $request->file('kk_path')->store('kk', 'public');
        }

        if ($request->hasFile('mutasi_path')) {
            if ($pendaftaran->mutasi_path) {
                Storage::disk('public')->delete($pendaftaran->mutasi_path);
            }
            $data['mutasi_path'] = $request->file('mutasi_path')->store('mutasi', 'public');
        }

        $pendaftaran->update($data);

        return redirect()->route('admin.data-siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function laporan(Request $request)
    {
        $jenjang = $request->input('jenjang');
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = Pendaftaran::query();
        if ($jenjang) {
            $query->where('jenjang', $jenjang);
        }
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereDate('tanggal_pendaftaran', '>=', $tanggalAwal)
                  ->whereDate('tanggal_pendaftaran', '<=', $tanggalAkhir);
        }

        $pendaftarans = $query->paginate(10);
        Log::info('Filtered pendaftarans: ' . $pendaftarans->toJson());

        if ($request->has('download') && $request->input('download') === 'pdf') {
            $data = $query->get();
            $pdf = Pdf::loadView('admin.laporan-pdf', compact('data', 'jenjang', 'tanggalAwal', 'tanggalAkhir'));
            return $pdf->download('laporan_pendaftaran_' . date('Ymd_His') . '.pdf');
        }

        if ($request->has('download') && $request->input('download') === 'excel') {
            $data = $query->get();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Jenis Pendaftaran');
            $sheet->setCellValue('B1', 'Jenjang');
            $sheet->setCellValue('C1', 'Tingkat');
            $sheet->setCellValue('D1', 'Nama Siswa');
            $sheet->setCellValue('E1', 'Tanggal Pendaftaran');

            $row = 2;
            foreach ($data as $pendaftaran) {
                $sheet->setCellValue('A' . $row, $pendaftaran->jenis_pendaftaran);
                $sheet->setCellValue('B' . $row, $pendaftaran->jenjang);
                $sheet->setCellValue('C' . $row, $pendaftaran->tingkat);
                $sheet->setCellValue('D' . $row, $pendaftaran->nama_siswa);
                $sheet->setCellValue('E' . $row, $pendaftaran->tanggal_pendaftaran);
                $row++;
            }

            $writer = new Xlsx($spreadsheet);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="laporan_pendaftaran_' . date('Ymd_His') . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            exit;
        }

        return view('admin.laporan', compact('pendaftarans', 'jenjang', 'tanggalAwal', 'tanggalAkhir'));
    }

    public function showBeritaDetail($id)
    {
        Log::info('Fetching berita with ID: ' . $id);
        try {
            $berita = Berita::findOrFail($id);
            Log::info('Berita found: ' . $berita->toJson());
            return view('berita.detail', compact('berita'));
        } catch (\Exception $e) {
            Log::error('Error fetching berita: ' . $e->getMessage());
            return view('berita.detail')->with('error', 'Berita not found');
        }
    }
}