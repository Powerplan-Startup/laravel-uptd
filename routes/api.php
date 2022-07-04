<?php

use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\CountController;
use App\Http\Controllers\Api\JadwalPelatihanController;
use App\Http\Controllers\Api\KejuruanController;
use App\Http\Controllers\Api\PesertaController;
use App\Http\Controllers\Api\PimpinanController;
use App\Models\CalonPesertaPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('analityc')->group(function () {
        Route::get('/peserta/count', [CountController::class, 'peserta']);
    });
    
    Route::resources([
        'kejuruan'      => KejuruanController::class,
        'instruktur'    => App\Http\Controllers\Api\InstrukturController::class,
        'jadwal'        => JadwalPelatihanController::class,
        'peserta'       => PesertaController::class,
        'berita'        => BeritaController::class,
        'pimpinan'      => PimpinanController::class,
    ]);
});
