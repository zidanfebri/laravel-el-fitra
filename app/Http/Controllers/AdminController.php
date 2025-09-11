<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dataSiswa()
    {
        $pendaftarans = Pendaftaran::all();
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
        })->paginate(5); // Pagination 5 per halaman
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

        $data = $request->all();

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

        $berita = Berita::findOrFail($id);

        $data = $request->all();

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
        })->paginate(10); // Pagination 10 per halaman
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

        $data = $request->all();

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

        $testimoni = Testimoni::findOrFail($id);

        $data = $request->all();

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
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
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

    public function laporan()
    {
        return view('admin.laporan');
    }
}