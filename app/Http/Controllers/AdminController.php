<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\Testimoni;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentVerified;
use App\Mail\WelcomeStudent;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dataSiswa(Request $request)
    {
        $jenisPendaftaran = $request->input('jenis_pendaftaran');
        $jenjang = $request->input('jenjang');
        $status = $request->input('status');
        $perPage = $request->input('per_page', 5);

        $query = Pendaftaran::with('tahunAjaran')->latest('tanggal_pendaftaran');

        if ($jenisPendaftaran) {
            $query->where('jenis_pendaftaran', $jenisPendaftaran);
        }
        
        if ($jenjang) {
            $query->where('jenjang', $jenjang);
        }

        if ($status) {
            $query->where('status', $status);
        }

        if ($perPage === 'all') {
            $pendaftarans = $query->get();
        } else {
            $pendaftarans = $query->paginate($perPage)->appends($request->query());
        }

        if ($pendaftarans->isEmpty()) {
            Log::info('Tidak ada data di tabel pendaftarans pada ' . now());
        } else {
            Log::info('Data pendaftarans ditemukan: ' . count($pendaftarans) . ' baris.');
        }

        return view('admin.dashboard', compact('pendaftarans', 'jenisPendaftaran', 'jenjang', 'status', 'perPage'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:none,diinput,pembayaran,verifikasi,sukses,siswa',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $oldStatus = $pendaftaran->status;
        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        if ($request->status === 'verifikasi' && $oldStatus !== 'verifikasi') {
            if ($pendaftaran->user) {
                Mail::to($pendaftaran->user->email)->send(new PaymentVerified($pendaftaran->user));
                Log::info('Email verifikasi pembayaran dikirim:', ['pendaftaran_id' => $pendaftaran->id]);
            }
        }

        if ($request->status === 'siswa' && $oldStatus !== 'siswa') {
            $recipientEmail = $pendaftaran->alamat_email; 
            if ($recipientEmail) {
                Mail::to($recipientEmail)->send(new WelcomeStudent($pendaftaran));
                Log::info('Email ucapan selamat siswa dikirim:', ['pendaftaran_id' => $pendaftaran->id]);
            }
        }

        return redirect()->route('admin.data-siswa')->with('success', __('messages.status_updated'));
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

        return redirect()->route('admin.berita')->with('success', __('messages.berita_added'));
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

        return redirect()->route('admin.berita')->with('success', __('messages.berita_updated'));
    }

    public function deleteBerita($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->route('admin.berita')->with('success', __('messages.berita_deleted'));
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

        return redirect()->route('admin.testimoni')->with('success', __('messages.testimoni_added'));
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

        return redirect()->route('admin.testimoni')->with('success', __('messages.testimoni_updated'));
    }

    public function deleteTestimoni($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        if ($testimoni->gambar) {
            Storage::disk('public')->delete($testimoni->gambar);
        }
        $testimoni->delete();
        return redirect()->route('admin.testimoni')->with('success', __('messages.testimoni_deleted'));
    }

    public function editSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.edit-siswa', compact('pendaftaran'));
    }

    public function deleteSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        // Daftar file yang harus dihapus dari storage
        $filePaths = [
            'akte_path', 'kk_path', 'mutasi_path', 'bukti_pembayaran_path',
            'transkip1_path', 'transkip2_path', 'transkip3_path', 'transkip4_path', 'transkip5_path'
        ];

        foreach ($filePaths as $path) {
            if ($pendaftaran->$path) {
                Storage::disk('public')->delete($pendaftaran->$path);
            }
        }

        $pendaftaran->delete();
        return redirect()->route('admin.data-siswa')->with('success', __('messages.siswa_deleted'));
    }

    public function detailSiswa($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('admin.detail-siswa', compact('pendaftaran'));
    }

    public function updateSiswa(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran_id' => 'nullable|exists:tahun_ajarans,id',
            'jenis_pendaftaran' => 'required|in:baru,pindahan',
            'jenjang' => 'required|in:TK,SD,SMP,SMA',
            'tingkat' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'provinsi_select' => 'required_without:provinsi|string|max:255|nullable',
            'provinsi' => 'required_without:provinsi_select|string|max:255|nullable',
            'kota_select' => 'required_without:kota|string|max:255|nullable',
            'kota' => 'required_without:kota_select|string|max:255|nullable',
            'kecamatan_select' => 'required_without:kecamatan|string|max:255|nullable',
            'kecamatan' => 'required_without:kecamatan_select|string|max:255|nullable',
            'kelurahan_select' => 'required_without:kelurahan|string|max:255|nullable',
            'kelurahan' => 'required_without:kelurahan_select|string|max:255|nullable',
            'penyakit_bawaan' => 'nullable|string|max:255',
            'tinggi' => 'nullable|numeric|min:0',
            'berat_badan' => 'nullable|numeric|min:0',
            'anak_ke' => 'nullable|integer|min:1',
            'jumlah_saudara' => 'nullable|integer|min:0',
            'nama_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pendidikan_ayah' => 'nullable|in:SD,SMP,SMA,D3,S1,S2,S3',
            'nama_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'pendidikan_ibu' => 'nullable|in:SD,SMP,SMA,D3,S1,S2,S3',
            'no_hp' => 'nullable|string|max:15',
            'no_whatsapp' => 'nullable|string|max:15',
            'alamat_email' => 'nullable|email|max:255',
            'sumber_informasi' => 'nullable|in:Website,Media Sosial,Teman/Keluarga,Iklan,Lainnya',
            'status' => 'required|in:none,diinput,pembayaran,verifikasi,sukses,siswa',
            'akte_path' => 'nullable|file|mimes:pdf|max:2048',
            'kk_path' => 'nullable|file|mimes:pdf|max:2048',
            'mutasi_path' => 'nullable|file|mimes:pdf|max:2048',
            'transkip1_path' => 'nullable|file|mimes:pdf|max:2048',
            'transkip2_path' => 'nullable|file|mimes:pdf|max:2048',
            'transkip3_path' => 'nullable|file|mimes:pdf|max:2048',
            'transkip4_path' => 'nullable|file|mimes:pdf|max:2048',
            'transkip5_path' => 'nullable|file|mimes:pdf|max:2048',
            'bukti_pembayaran_path' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        $data = $request->except([
            'akte_path', 'kk_path', 'mutasi_path', 'bukti_pembayaran_path', 
            'transkip1_path', 'transkip2_path', 'transkip3_path', 'transkip4_path', 'transkip5_path',
            'provinsi_select', 'kota_select', 'kecamatan_select', 'kelurahan_select'
        ]);

        // Handle address fields
        $data['provinsi'] = $request->provinsi_select ?? $request->provinsi;
        $data['kota'] = $request->kota_select ?? $request->kota;
        $data['kecamatan'] = $request->kecamatan_select ?? $request->kecamatan;
        $data['kelurahan'] = $request->kelurahan_select ?? $request->kelurahan;

        // Logic penanganan file upload
        $fileFields = [
            'akte_path' => 'akte',
            'kk_path' => 'kk',
            'mutasi_path' => 'mutasi',
            'transkip1_path' => 'transkip',
            'transkip2_path' => 'transkip',
            'transkip3_path' => 'transkip',
            'transkip4_path' => 'transkip',
            'transkip5_path' => 'transkip',
            'bukti_pembayaran_path' => 'bukti_pembayaran'
        ];

        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                if ($pendaftaran->$field) {
                    Storage::disk('public')->delete($pendaftaran->$field);
                }
                $data[$field] = $request->file($field)->store($folder, 'public');
            }
        }

        $pendaftaran->update($data);

        return redirect()->route('admin.data-siswa')->with('success', __('messages.siswa_updated'));
    }

    public function laporan(Request $request)
    {
        $jenjang = $request->input('jenjang');
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $query = Pendaftaran::with('tahunAjaran');

        if ($jenjang) {
            $query->where('jenjang', $jenjang);
        }

        if ($tanggalAwal && !$tanggalAkhir) {
            $query->whereDate('tanggal_pendaftaran', '=', Carbon::parse($tanggalAwal)->toDateString());
        } elseif ($tanggalAwal && $tanggalAkhir) {
            $startDate = Carbon::parse($tanggalAwal)->startOfDay();
            $endDate = Carbon::parse($tanggalAkhir)->endOfDay();
            $query->whereBetween('tanggal_pendaftaran', [$startDate, $endDate]);
        }

        $pendaftarans = $query->paginate(10);

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
            $sheet->setCellValue('D1', 'Tahun Ajaran');
            $sheet->setCellValue('E1', 'Nama Siswa');
            $sheet->setCellValue('F1', 'Tanggal Pendaftaran');
            $sheet->setCellValue('G1', 'Status');

            $row = 2;
            foreach ($data as $pendaftaran) {
                $sheet->setCellValue('A' . $row, $pendaftaran->jenis_pendaftaran);
                $sheet->setCellValue('B' . $row, $pendaftaran->jenjang);
                $sheet->setCellValue('C' . $row, $pendaftaran->tingkat);
                $sheet->setCellValue('D' . $row, $pendaftaran->tahunAjaran->tahun_ajaran ?? '-');
                $sheet->setCellValue('E' . $row, $pendaftaran->nama_siswa);
                $sheet->setCellValue('F' . $row, $pendaftaran->tanggal_pendaftaran);
                $sheet->setCellValue('G' . $row, $pendaftaran->status);
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
        try {
            $berita = Berita::findOrFail($id);
            return view('berita.detail', compact('berita'));
        } catch (\Exception $e) {
            return view('berita.detail')->with('error', __('messages.berita_not_found'));
        }
    }

    public function tahunAjaran(Request $request)
    {
        TahunAjaran::where('status', 'active')
            ->where('tanggal_akhir', '<', Carbon::today())
            ->update(['status' => 'inactive']);

        $tahun_ajaran = $request->input('tahun_ajaran');
        $tahunAjarans = TahunAjaran::when($tahun_ajaran, function($query) use ($tahun_ajaran) {
            return $query->where('tahun_ajaran', 'like', '%' . $tahun_ajaran . '%');
        })->paginate(5);
        return view('admin.tahun-ajaran', compact('tahunAjarans'));
    }

    public function createTahunAjaran()
    {
        return view('admin.create-tahun-ajaran');
    }

    public function storeTahunAjaran(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|size:9|regex:/^[0-9]{4}\/[0-9]{4}$/',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ]);

        $data = $request->all();
        $data['keterangan'] = 'Pendaftaran Calon Siswa/Siswi Tahun ' . $request->tahun_ajaran;
        $data['status'] = 'inactive';

        TahunAjaran::create($data);

        return redirect()->route('admin.tahun-ajaran')->with('success', __('messages.tahun_ajaran_added'));
    }

    public function editTahunAjaran($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('admin.edit-tahun-ajaran', compact('tahunAjaran'));
    }

    public function updateTahunAjaran(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string|size:9|regex:/^[0-9]{4}\/[0-9]{4}$/',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date|after:tanggal_mulai',
        ]);

        $tahunAjaran = TahunAjaran::findOrFail($id);
        $data = $request->all();
        $data['keterangan'] = 'Pendaftaran Calon Siswa/Siswi Tahun ' . $request->tahun_ajaran;

        $tahunAjaran->update($data);

        return redirect()->route('admin.tahun-ajaran')->with('success', __('messages.tahun_ajaran_updated'));
    }

    public function toggleTahunAjaranStatus($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);

        if ($tahunAjaran->status === 'inactive') {
            TahunAjaran::where('status', 'active')->update(['status' => 'inactive']);
            $tahunAjaran->status = 'active';
        } else {
            $tahunAjaran->status = 'inactive';
        }

        $tahunAjaran->save();

        return redirect()->route('admin.tahun-ajaran')->with('success', __('messages.tahun_ajaran_status_updated'));
    }

    public function deleteTahunAjaran($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->delete();

        return redirect()->route('admin.tahun-ajaran')->with('success', __('messages.tahun_ajaran_deleted'));
    }
}