<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthAdmin\PendaftaranController;
use App\Http\Controllers\AuthTokenController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\InstrukturController;
use App\Http\Controllers\Public\JadwalplthnController;
use App\Http\Controllers\Public\KejuruanController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('alumni', [HomeController::class, 'alumni']);
Route::get('visimisi', [HomeController::class, 'visimisi']);
Route::get('instruktur', [InstrukturController::class, 'index']);
Route::get('kejuruan', [KejuruanController::class, 'index']);
Route::get('jadwal-pelatihan', [JadwalplthnController::class, 'index']);

Route::get('berita', [BeritaController::class, 'blog']);
Route::get('blog', function(){
    return view('public.blog',[
        'title' => 'Blog'
    ]);
});

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