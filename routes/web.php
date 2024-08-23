<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\BeritaFeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KegiatanFeController;
use App\Http\Controllers\Admin\KeluargaController;
use App\Http\Controllers\Admin\UsahaWargaController;
use App\Http\Controllers\UsahaFeController;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('/contact', function () {
    return view('kontak');
})->name('contact.form');

Route::get('/tentang-kami', function () {
    return view('testang_kami');
})->name('tentang-kami');

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::get('/kegiatan', [KegiatanFeController::class, 'index'])->name('kegiatan');
Route::get('/berita', [BeritaFeController::class, 'index'])->name('berita');
Route::get('/usaha-warga', [UsahaFeController::class, 'index'])->name('usaha-warga');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware('auth')->group(function () {

    Route::resource('beritas', BeritaController::class);
    Route::resource('activitys', KegiatanController::class);
    Route::resource('keluargas', KeluargaController::class);
    Route::resource('usahawarga', UsahaWargaController::class);

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/redirect-user', function () {
    if (Auth::check() && !Auth::user()->isAdmin) {
        return redirect()->route('landing');
    }
    return redirect()->route('home');
})->middleware('auth');
