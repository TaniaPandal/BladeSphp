<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TracksController;
use Illuminate\Support\Facades\Route;


Route::controller(TracksController::class)->group(function(){
    Route::get('/','login')->name('login');
    Route::get('/index','index')->name('index')->middleware(['auth', 'verified'])->name('index');
    Route::get('/listView', 'listView')->name('listView');
    Route::get('/listViewTrainer', 'listViewTrainer')->name('listViewTrainer');
    Route::get('/formView', 'formView')->name('formView');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('Tracks', TracksController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
