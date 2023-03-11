<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TracksController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [TracksController::class, 'init'])->name('init');
    Route::get('/index', [TracksController::class, 'index'])->name('index');
    Route::get('/listView', [TracksController::class, 'listView'])->name('listView');
    Route::get('/listViewTrainer', [TracksController::class, 'listViewTrainer'])->name('listViewTrainer');
    Route::get('/formView', [TracksController::class, 'formView'])->name('formView');
    Route::post('/tracks', [TracksController::class, 'store'])->name('tracks.store')->middleware(['auth', 'verified']);
    Route::match(['put', 'patch'], '/tracks/{id}', [TracksController::class, 'update'])->name('tracks.update');
    Route::get('/tracks.foto/{id}', [TracksController::class, 'foto'])->name('tracks.foto');
});







require __DIR__ . '/auth.php';
