   <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\BimbinganController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;


// Dashboard Routes
Route::get('/dashadmin', function () {
    return view('dashadmin');
})->name('dashadmin');

Route::get('/dashkaprodi', function () {
    return view('dashkaprodi');
})->name('dashkaprodi');

Route::get('/dashdosen', function () {
    return view('dashdosen');
})->name('dashdosen');

Route::get('/dashmitra', function () {
    return view('dashmitra');
})->name('dashmitra');

Route::get('/dashperusahaan', function () {
    return view('dashmitra');
})->name('dashperusahaan');

Route::get('/dashmhs', function () {
    $userId = 1; // Assuming user_id 1 for mahasiswa, adjust if authentication is implemented
    $seminars = \App\Models\Seminar::where('mahasiswa_id', $userId)->orderBy('date', 'asc')->get();
    $bimbingans = \App\Models\Bimbingan::where('mahasiswa_id', $userId)->orderBy('date', 'asc')->get();
    return view('dashboardmhs', compact('seminars', 'bimbingans'));
})->name('dashmhs');

Route::get('/dashboardmhs', function () {
    $userId = 1; // Assuming user_id 1 for mahasiswa, adjust if authentication is implemented
    $seminars = \App\Models\Seminar::where('mahasiswa_id', $userId)->get();
    $bimbingans = \App\Models\Bimbingan::where('mahasiswa_id', $userId)->get();
    $nilais = \App\Models\Nilai::where('mahasiswa_id', $userId)->get();
    $pengajuanPKLs = \App\Models\PengajuanPKL::where('mahasiswa_id', $userId)->get();
    return view('dashboardmhs', compact('seminars', 'bimbingans', 'nilais', 'pengajuanPKLs', 'userId'));
})->name('dashboardmhs');

Route::get('/mitra', function () {
    return view('mitra');
})->name('mitra');

// Perusahaan Routes
Route::resource('perusahaan', PerusahaanController::class);

// Prodi Routes
Route::resource('prodi', ProdiController::class);

// Seminar Routes
Route::resource('seminar', SeminarController::class);

// Bimbingan Routes
Route::resource('bimbingan', BimbinganController::class);

// Nilai Routes
Route::resource('nilai', NilaiController::class);

// Mahasiswa Routes
Route::get('mahasiswa/bulk-create', [MahasiswaController::class, 'bulkCreate'])->name('mahasiswa.bulkCreate');
Route::post('mahasiswa/bulk-store', [MahasiswaController::class, 'bulkStore'])->name('mahasiswa.bulkStore');
Route::get('mahasiswa/{mahasiswa}/profile', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
Route::put('mahasiswa/{mahasiswa}/profile', [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.updateProfile');
Route::resource('mahasiswa', MahasiswaController::class);

// Dosen Routes
Route::get('dosen/{dosen}/profile', [DosenController::class, 'profile'])->name('dosen.profile');
Route::put('dosen/{dosen}/profile', [DosenController::class, 'updateProfile'])->name('dosen.updateProfile');
Route::resource('dosen', DosenController::class);

// Dokumen Routes
Route::resource('dokumen', App\Http\Controllers\DokumenController::class);
Route::post('dokumen/{id}/validate', [App\Http\Controllers\DokumenController::class, 'validateDocument'])->name('dokumen.validate');

// Pengajuan PKL Routes
Route::resource('pengajuan-pkl', App\Http\Controllers\PengajuanPKLController::class);

// Kalender Routes
Route::get('kalender', [App\Http\Controllers\KalenderController::class, 'index'])->name('kalender.index');
Route::get('kalender/events', [App\Http\Controllers\KalenderController::class, 'events'])->name('kalender.events');

// Home route with upload functionality
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
