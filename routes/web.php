<?php

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\SuratGMController;
use App\Http\Controllers\MultiUserController;
use App\Http\Middleware\EnsureEnvironmentIsLocal;

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

Auth::routes([ 'reset' => false ]);

Route::get('/home', [MultiUserController::class, 'index'])->name('home');
Route::get('/dashboard', [MultiUserController::class, 'dashboard'])->name('dashboard');
Route::get('/local/act-as/{user}', [MultiUserController::class, 'actAs'])->middleware(EnsureEnvironmentIsLocal::class)->name('local.act-as');

Route::middleware('auth')->group(function () {
    Route::get('/surat/status', [SuratController::class, 'status'])->name('surat.status');
    Route::resource('surat', SuratController::class);
    Route::resource('surat_gm', SuratGMController::class);
});