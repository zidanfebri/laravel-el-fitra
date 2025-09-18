<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Models\Berita;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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
})->name('language.switch');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('reset', [LoginController::class, 'showResetForm'])->name('reset.form');
Route::post('reset', [LoginController::class, 'reset'])->name('reset');

Route::get('pendaftaran', [PendaftaranController::class, 'step1'])->name('pendaftaran.step1');
Route::match(['GET', 'POST'], 'pendaftaran/step2', [PendaftaranController::class, 'step2'])->name('pendaftaran.step2');
Route::match(['GET', 'POST'], 'pendaftaran/step3', [PendaftaranController::class, 'step3'])->name('pendaftaran.step3');
Route::match(['GET', 'POST'], 'pendaftaran/step4', [PendaftaranController::class, 'step4'])->name('pendaftaran.step4');
Route::post('pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminController::class, 'dataSiswa'])->name('admin.data-siswa');
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
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/program', function () {
    return view('program');
})->name('program');

Route::get('/program/kompetisi', function () {
    return view('kompetisi');
})->name('kompetisi');

Route::get('/testimoni', function () {
    return view('testimoni');
})->name('testimoni');

Route::get('/berita', function () {
    $beritas = Berita::all();
    return view('berita', compact('beritas'));
})->name('berita');

Route::get('/jenjang/tk', function () {
    return view('jenjang.tk');
})->name('jenjang.tk');

Route::get('/jenjang/sd', function () {
    return view('jenjang.sd');
})->name('jenjang.sd');

Route::get('/jenjang/smp', function () {
    return view('jenjang.smp');
})->name('jenjang.smp');

Route::get('/jenjang/sma', function () {
    return view('jenjang.sma');
})->name('jenjang.sma');

Route::get('/jenjang/sma/unggulan-akademik', function () {
    return view('jenjang.unggulan-akademik');
})->name('jenjang.sma.unggulan-akademik');

Route::get('/jenjang/sma/ekstrakurikuler', function () {
    return view('jenjang.ekstrakurikuler');
})->name('jenjang.sma.ekstrakurikuler');

Route::get('/berita/{id}', [AdminController::class, 'showBeritaDetail'])->name('berita.detail');