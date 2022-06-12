<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\PendaftaranController;
use App\Http\Controllers\AuthTokenController;
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
// Route::get('posts/{slug}', [BeritaController::class, 'blog']);

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
Route::get('admin/logout', [\App\Http\Controllers\AuthAdmin\LoginController::class, 'logout'])->name('logout.admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * route untuk halaman admin
 * 
 */
Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');
});

Route::prefix('print')->group(function(){
    Route::get('/peserta', [PrintController::class, 'peserta']);
    Route::get('/calon', [PrintController::class, 'calon']);
    Route::get('/alumni', [PrintController::class, 'alumni']);
    Route::get('/instruktur', [PrintController::class, 'instruktur']);
    Route::get('/jadwal', [PrintController::class, 'jadwal']);
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