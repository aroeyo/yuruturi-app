<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
Route::get('/contact/show',[ContactController::class, 'show'])->name('contact.show');
Route::post('/contact/confirm',[ContactController::class, 'confirm'])->name('contact.confirm');
Route::get('/contact/complete',[ContactController::class, 'complete'])->name('contact.complete');
Route::get('/album/show',[AlbumController::class, 'show'])->name('albums.show');
Route::get('/album/{id}',[AlbumController::class, 'albumid'])->name('album.id')->where('id', '[0-9]+');
Route::get('/album/albumedit',[AlbumController::class, 'albumedit'])->name('albums.edit');
Route::get('/album/create',[AlbumController::class, 'albumcreate'])->name('albums.create');
Route::post('/album/albumcreate',[AlbumController::class, 'store'])->name('album.create');
Route::get('/album/createcomplete',[AlbumController::class, 'createcomplete'])->name('albums.create.complete');
Route::get('/rankings/ranking',[RankingController::class, 'ranking'])->name('ranking');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
Route::get('/favorite/show', [FavoriteController::class, 'show'])->name('favorite.show');
Route::get('/favorite/{id}', [FavoriteController::class, 'favoriteid'])->name('favorite.id')->where('id', '[0-9]+');

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
