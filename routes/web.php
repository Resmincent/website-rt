<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\JenisController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\LandingPageController;

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
Route::middleware('auth')->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/jenis', [JenisController::class, 'index'])->name('daftar-jenis');
        Route::get('/jenis/create', [JenisController::class, 'create'])->name('create-jenis');
        Route::post('/jenis/create', [JenisController::class, 'store'])->name('store-jenis');
        Route::get('/jenis/{id}/edit', [JenisController::class, 'edit'])->name('edit-jenis');
        Route::post('/jenis/{id}/edit', [JenisController::class, 'update'])->name('update-jenis');
        Route::get('/jenis/{id}/delete', [JenisController::class, 'destroy'])->name('delete-jenis');
        Route::get('/jenis/{id}', [JenisController::class, 'show'])->name('detail-jenis');

        Route::get('/event', [EventController::class, 'index'])->name('daftar-event');
        Route::get('/event/create', [EventController::class, 'create'])->name('create-event');
        Route::post('/event/create', [EventController::class, 'store'])->name('store-event');
        Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('edit-event');
        Route::post('/event/{id}/edit', [EventController::class, 'update'])->name('update-event');
        Route::get('/event/{id}/delete', [EventController::class, 'destroy'])->name('delete-event');
        Route::get('/event/{id}', [EventController::class, 'show'])->name('detail-event');
    });


    Route::middleware('role:user')->group(function () {
        Route::get('/event/create', [EventController::class, 'create'])->name('create-event');
        Route::post('/event/create', [EventController::class, 'store'])->name('store-event');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
