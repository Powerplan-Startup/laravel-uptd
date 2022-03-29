<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * route untuk halaman admin
 * 
 */
Route::prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');
});