<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TracksController;
use Illuminate\Support\Facades\Route;


Route::controller(TracksController::class)->group(function(){
    Route::get('/','init')->name('init');
    Route::get('/index','index')->name('index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/listView', 'listView')->name('listView');
    Route::post('/listView', 'listView')->name('listView');
    Route::get('/listViewTrainer', 'listViewTrainer')->name('listViewTrainer');
    Route::get('/formView', 'formView')->name('formView');
    Route::post('/tracks', 'store')->name('tracks.store');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('Tracks', TracksController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

//  Route::post('/tracks', [TracksController::class, 'store'])->name('tracks.store');


require __DIR__.'/auth.php';
