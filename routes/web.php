<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Auth::routes();

Route::resource('beritas', BeritaController::class);
Route::resource('activitys', KegiatanController::class);
Route::resource('users', UserController::class);

use App\Http\Controllers\ContactController;

Route::get('/contact', function () {
    return view('kontak');
})->name('contact.form');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');



// Route::middleware('auth')->group(function () {

//     Route::middleware('role:admin')->group(function () {
//         Route::get('/jenis', [KegiatanController::class, 'index'])->name('daftar-jenis');
//         Route::get('/jenis/create', [KegiatanController::class, 'create'])->name('create-jenis');
//         Route::post('/jenis/create', [KegiatanController::class, 'store'])->name('store-jenis');
//         Route::get('/jenis/{id}/edit', [KegiatanController::class, 'edit'])->name('edit-jenis');
//         Route::post('/jenis/{id}/edit', [KegiatanController::class, 'update'])->name('update-jenis');
//         Route::get('/jenis/{id}/delete', [KegiatanController::class, 'destroy'])->name('delete-jenis');
//         Route::get('/jenis/{id}', [KegiatanController::class, 'show'])->name('detail-jenis');

//         Route::get('/event', [BeritaController::class, 'index'])->name('daftar-event');
//         Route::get('/event/create', [BeritaController::class, 'create'])->name('create-event');
//         Route::post('/event/create', [BeritaController::class, 'store'])->name('store-event');
//         Route::get('/event/{id}/edit', [BeritaController::class, 'edit'])->name('edit-event');
//         Route::post('/event/{id}/edit', [BeritaController::class, 'update'])->name('update-event');
//         Route::get('/event/{id}/delete', [BeritaController::class, 'destroy'])->name('delete-event');
//         Route::get('/event/{id}', [BeritaController::class, 'show'])->name('detail-event');
//     });


//     Route::middleware('role:user')->group(function () {
//         Route::get('/event/create', [BeritaController::class, 'create'])->name('create-event');
//         Route::post('/event/create', [BeritaController::class, 'store'])->name('store-event');
//     });
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/redirect-user', function () {
    if (Auth::check() && !Auth::user()->isAdmin) {
        return redirect()->route('landing');
    }
    return redirect()->route('home');
})->middleware('auth');
