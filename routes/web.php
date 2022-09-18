<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\PendaftaranController;
use App\Http\Controllers\AuthTokenController;
use App\Http\Controllers\Instruktur\InstrukturDashboardController;
use App\Http\Controllers\Pimpinan\PimpinanDashboardController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\InstrukturController;
use App\Http\Controllers\Public\JadwalplthnController;
use App\Http\Controllers\Public\KejuruanController;
use App\Http\Controllers\Public\PesertaController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Berita;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('alumni', [HomeController::class, 'alumni']);
Route::get('alumni', [PesertaController::class, 'peserta']);
Route::get('visimisi', [HomeController::class, 'visimisi']);
// Route::get('instruktur', [InstrukturController::class, 'index']);
// Route::get('kejuruan', [KejuruanController::class, 'index']);
// Route::get('calonpeserta', [PesertaController::class, 'calonpeserta']);
// Route::get('jadwal-pelatihan', [JadwalplthnController::class, 'index']);
// Route::get('jadwal', [JadwalplthnController::class, 'jadwal']);

Route::get('blog', [BeritaController::class, 'index'])->name('blog');
Route::get('blog/{berita}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('pendaftaran', [PendaftaranController::class, 'index']);

/**
 * auth
 * 
 */
Route::get('auth/token', [AuthTokenController::class, 'token']);

/**
 * login admin
 * 
 */
Route::get('login/admin', [\App\Http\Controllers\AuthAdmin\LoginController::class, 'showLoginForm'])->name('login.admin.show');
Route::post('login/admin', [\App\Http\Controllers\AuthAdmin\LoginController::class, 'login'])->name('login.admin');
Route::any('admin/logout', [\App\Http\Controllers\AuthAdmin\LoginController::class, 'logout'])->name('logout.admin');

Auth::routes();


/**
 * route untuk halaman admin
 * 
 */
Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');
});

Route::prefix('print')->middleware('operator')->group(function(){
    Route::get('/peserta', [PrintController::class, 'peserta'])->name('print.peserta');
    Route::get('/calon', [PrintController::class, 'calon'])->name('print.calon.peserta');
    Route::get('/alumni', [PrintController::class, 'alumni'])->name('print.alumni');
    Route::get('/instruktur', [PrintController::class, 'instruktur'])->name('print.instruktur');
    Route::get('/jadwal', [PrintController::class, 'jadwal'])->name('print.jadwal');
});
/**
 * route untuk halaman admin
 * 
 */
Route::prefix('user')->middleware('auth:web')->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])->name('user.index');
    Route::get('/setting', [UserDashboardController::class, 'setting'])->name('user.setting');
    Route::put('/setting', [UserDashboardController::class, 'update'])->name('user.setting.update');
    Route::get('/berkas', [UserDashboardController::class, 'berkas'])->name('user.berkas');
    Route::put('/berkas', [UserDashboardController::class, 'updateBerkas'])->name('user.berkas.update');
});
/**
 * route untuk halaman admin
 * 
 */
Route::prefix('pimpinan')->middleware('auth:pimpinan')->group(function(){
    Route::get('/', [PimpinanDashboardController::class, 'index'])->name('pimpinan.index');
    Route::get('/setting', [PimpinanDashboardController::class, 'setting'])->name('pimpinan.setting');
    Route::put('/setting', [PimpinanDashboardController::class, 'update'])->name('pimpinan.setting.update');
});
Route::prefix('instruktur')->middleware('auth:instruktur')->group(function(){
    Route::get('/', [InstrukturDashboardController::class, 'index'])->name('instruktur.index');
    Route::get('/setting', [InstrukturDashboardController::class, 'setting'])->name('instruktur.setting');
    Route::put('/setting', [InstrukturDashboardController::class, 'update'])->name('instruktur.setting.update');
    Route::get('/berkas', [InstrukturDashboardController::class, 'berkas'])->name('instruktur.berkas');
    Route::put('/berkas', [InstrukturDashboardController::class, 'updateBerkas'])->name('instruktur.berkas.update');
    
    Route::get('/{jadwal}', [InstrukturDashboardController::class, 'materi'])->name('instruktur.materi');
    Route::put('/{jadwal}', [InstrukturDashboardController::class, 'materiupdate'])->name('instruktur.materi.update');

    Route::get('/nilai/{paket}', [InstrukturDashboardController::class, 'nilai'])->name('instruktur.nilai');
    Route::get('/nilai/{paket}/peserta/{peserta}', [InstrukturDashboardController::class, 'peserta'])->name('instruktur.nilai.peserta');
    Route::put('/nilai/{paket}/peserta/{peserta}', [InstrukturDashboardController::class, 'nilaiupdate'])->name('instruktur.nilai.update');
});