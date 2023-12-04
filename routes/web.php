<?php

use App\Http\Controllers\AbsenController;
use App\Models\Absen;
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

Route::get('/', [AbsenController::class, 'index'])->name('index');

Route::post('/store', [AbsenController::class, 'store'])->name('store');

Route::get('/checkin', [AbsenController::class, 'checkin'])->name('absenmasuk');