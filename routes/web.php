<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//laravel allow us to create all CRUD routes using following line   
Route::resource('/notes',NoteController::class)->middleware(['auth', 'verified']);

//trash
// Route::get('/trashed', [TrashedNoteController::class,'index'])->middleware(['auth', 'verified'])->name('trashed.index');

// Route::get('/trashed/{note}', [TrashedNoteController::class,'show'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.show');

// Route::put('/trashed/{note}', [TrashedNoteController::class,'update'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.update');

// Route::delete('/trashed/{note}', [TrashedNoteController::class,'destroy'])->withTrashed()->middleware(['auth', 'verified'])->name('trashed.destroy');

Route::prefix('/trashed')->name('trashed.')->middleware(['auth', 'verified'])->group(function(){
Route::get('/',[TrashedNoteController::class,'index'])->name('index');
Route::get('/{note}',[TrashedNoteController::class,'show'])->name('show')->withTrashed();
Route::put('/{note}',[TrashedNoteController::class,'update'])->name('update')->withTrashed();
Route::delete('/{note}',[TrashedNoteController::class,'destroy'])->name('destroy')->withTrashed();
});


require __DIR__.'/auth.php';
