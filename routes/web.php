<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Models\Berita;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

// Route untuk switch language
Route::get('/language/{locale}', function ($locale) {
    Log::info('Permintaan pergantian bahasa: ' . $locale);
    if (in_array($locale, ['id', 'en'])) {
        Session::put('locale', $locale);
        Log::info('Locale diset di session: ' . Session::get('locale'));
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('view:clear');
        Log::info('Cache dibersihkan setelah pergantian bahasa');
    } else {
        Session::put('locale', 'id');
    }
    
    $previousUrl = url()->previous();
    return redirect($previousUrl);
})->name('language.switch')->middleware('no-cache');

Route::get('/activate/{token}', [RegisterController::class, 'activate'])->name('activate');

// Public routes (Akses tanpa Login)
Route::get('/', function () {
    return view('home');
})->name('home')->middleware('no-cache');

Route::get('/program', function () {
    return view('program');
})->name('program')->middleware('no-cache');

Route::get('/program/kompetisi', function () {
    return view('kompetisi');
})->name('kompetisi')->middleware('no-cache');

Route::get('/admission', function () {
    return view('admission');
})->name('admission.alur');

Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni')->middleware('no-cache');

Route::get('/berita', function () {
    $beritas = Berita::all();
    return view('berita', compact('beritas'));
})->name('berita')->middleware('no-cache');

Route::get('/jenjang/tk', function () {
    return view('jenjang.tk');
})->name('jenjang.tk')->middleware('no-cache');

Route::get('/jenjang/sd', function () {
    return view('jenjang.sd');
})->name('jenjang.sd')->middleware('no-cache');

Route::get('/jenjang/smp', function () {
    return view('jenjang.smp');
})->name('jenjang.smp')->middleware('no-cache');

Route::get('/jenjang/sma', function () {
    return view('jenjang.sma');
})->name('jenjang.sma')->middleware('no-cache');

Route::get('/jenjang/sma/unggulan-akademik', function () {
    return view('jenjang.unggulan-akademik');
})->name('jenjang.sma.unggulan-akademik')->middleware('no-cache');

Route::get('/jenjang/sma/ekstrakurikuler', function () {
    return view('jenjang.ekstrakurikuler');
})->name('jenjang.sma.ekstrakurikuler')->middleware('no-cache');

Route::get('/berita/{id}', [AdminController::class, 'showBeritaDetail'])->name('berita.detail')->middleware('no-cache');

// Pendaftaran routes
Route::prefix('pendaftaran')->middleware('no-cache')->group(function () {
    Route::get('/check', [PendaftaranController::class, 'check'])->name('pendaftaran.check');
    Route::get('/must-login', [PendaftaranController::class, 'mustLogin'])->name('pendaftaran.must-login');
    Route::get('/closed', [PendaftaranController::class, 'closed'])->name('pendaftaran.closed');
    Route::get('/verification', [PendaftaranController::class, 'verification'])->name('pendaftaran.verification');
    
    // Step 1 (Jenis & Jenjang)
    Route::get('/', [PendaftaranController::class, 'step1'])->name('pendaftaran.step1');
    
    // Step 2 (Data Siswa)
    Route::match(['get', 'post'], '/step2', [PendaftaranController::class, 'step2'])->name('pendaftaran.step2');
    
    // Step 3 (Data Ortu)
    Route::match(['get', 'post'], '/step3', [PendaftaranController::class, 'step3'])->name('pendaftaran.step3'); 
    
    // Step 4 & 5 (Dokumen)
    Route::match(['get', 'post'], '/step4', [PendaftaranController::class, 'step4'])->name('pendaftaran.step4'); 
    Route::match(['get', 'post'], '/step5', [PendaftaranController::class, 'step5'])->name('pendaftaran.step5');

    // Step 5 (Payment)
    Route::match(['get', 'post'], '/payment', [PendaftaranController::class, 'payment'])->name('pendaftaran.payment'); 
    
    // Status
    Route::get('/status', [PendaftaranController::class, 'status'])->name('pendaftaran.status');
});

// Auth routes - Guest only
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('no-cache');
    Route::post('login', [LoginController::class, 'login'])->middleware('no-cache');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('no-cache');
    Route::post('register', [RegisterController::class, 'register'])->middleware('no-cache');
    
    // Perbaikan bagian Reset Password agar sinkron dengan Controller
    Route::get('password/reset', [LoginController::class, 'showResetRequestForm'])->name('password.request')->middleware('no-cache');
    Route::post('password/email', [LoginController::class, 'sendResetLink'])->name('password.email')->middleware('no-cache');
    // Ganti 'reset.form' menjadi 'password.reset'
    Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset')->middleware('no-cache');
    Route::post('password/reset', [LoginController::class, 'reset'])->name('reset')->middleware('no-cache');
});

// Authenticated routes
Route::middleware(['auth', 'no-cache'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/check-auth', function () {
        return response()->json([
            'authenticated' => Auth::check(),
            'role' => Auth::check() ? Auth::user()->role : null,
            'user' => Auth::check() ? [
                'id' => Auth::user()->id,
                'nama' => Auth::user()->nama,
                'username' => Auth::user()->username,
                'email' => Auth::user()->email
            ] : null
        ]);
    })->name('check-auth')->middleware('auth');
});

// Admin routes
Route::middleware(['auth', 'admin', 'no-cache'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dataSiswa'])->name('admin.data-siswa');
    Route::patch('/siswa/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.update-status');
    Route::get('edit-siswa/{id}', [AdminController::class, 'editSiswa'])->name('admin.edit-siswa');
    Route::delete('delete-siswa/{id}', [AdminController::class, 'deleteSiswa'])->name('admin.delete-siswa');
    Route::get('detail-siswa/{id}', [AdminController::class, 'detailSiswa'])->name('admin.detail-siswa');
    Route::put('update-siswa/{id}', [AdminController::class, 'updateSiswa'])->name('admin.update-siswa');
    Route::get('berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::get('create-berita', [AdminController::class, 'createBerita'])->name('admin.create-berita');
    Route::post('store-berita', [AdminController::class, 'storeBerita'])->name('admin.store-berita');
    Route::get('edit-berita/{id}', [AdminController::class, 'editBerita'])->name('admin.edit-berita');
    Route::put('update-berita/{id}', [AdminController::class, 'updateBerita'])->name('admin.update-berita');
    Route::delete('delete-berita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.delete-berita');
    Route::get('testimoni', [AdminController::class, 'testimoni'])->name('admin.testimoni');
    Route::get('laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::get('create-testimoni', [AdminController::class, 'createTestimoni'])->name('admin.create-testimoni');
    Route::post('store-testimoni', [AdminController::class, 'storeTestimoni'])->name('admin.store-testimoni');
    Route::get('edit-testimoni/{id}', [AdminController::class, 'editTestimoni'])->name('admin.edit-testimoni');
    Route::put('update-testimoni/{id}', [AdminController::class, 'updateTestimoni'])->name('admin.update-testimoni');
    Route::delete('delete-testimoni/{id}', [AdminController::class, 'deleteTestimoni'])->name('admin.delete-testimoni');
    Route::get('tahun-ajaran', [AdminController::class, 'tahunAjaran'])->name('admin.tahun-ajaran');
    Route::get('create-tahun-ajaran', [AdminController::class, 'createTahunAjaran'])->name('admin.create-tahun-ajaran');
    Route::post('store-tahun-ajaran', [AdminController::class, 'storeTahunAjaran'])->name('admin.store-tahun-ajaran');
    Route::get('edit-tahun-ajaran/{id}', [AdminController::class, 'editTahunAjaran'])->name('admin.edit-tahun-ajaran');
    Route::put('update-tahun-ajaran/{id}', [AdminController::class, 'updateTahunAjaran'])->name('admin.update-tahun-ajaran');
    Route::post('toggle-tahun-ajaran/{id}', [AdminController::class, 'toggleTahunAjaranStatus'])->name('admin.toggle-tahun-ajaran');
    Route::delete('delete-tahun-ajaran/{id}', [AdminController::class, 'deleteTahunAjaran'])->name('admin.delete-tahun-ajaran');
});