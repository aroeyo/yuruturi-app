<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
Route::get('/contact/show',[ContactController::class, 'show'])->name('contact.show');
Route::post('/contact/confirm',[ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/contact/complete',[ContactController::class, 'complete'])->name('contact.complete');
Route::get('/album/show',[AlbumController::class, 'show'])->name('albums.show');
Route::get('/album/albumid',[AlbumController::class, 'albumid']);
Route::get('/album/albumedit',[AlbumController::class, 'albumedit'])->name('albums.edit');
Route::get('/album/albumcreate',[AlbumController::class, 'albumcreate'])->name('albums.create');
Route::post('/album/albumcreate',[AlbumController::class, 'store'])->name('album.create');
Route::get('/album/createcomplete',[AlbumController::class, 'createcomplete'])->name('albums.create.complete');
Route::get('/rankings/ranking',[RankingController::class, 'ranking'])->name('ranking');
});


//Route::get('/', function () {
//    return view('welcome');
//});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
