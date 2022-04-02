<?php

use App\Http\Controllers\Api\JadwalPelatihanController;
use App\Http\Controllers\Api\KejuruanController;
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

Route::resources([
    'kejuruan'      => KejuruanController::class,
    'instruktur'    => App\Http\Controllers\Api\InstrukturController::class,
    'jadwal'        => JadwalPelatihanController::class,
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
