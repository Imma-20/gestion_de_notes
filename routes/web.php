<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {

    return view('welcome');
});
Route::resource('unites-enseignement', UnitesEnseignementController::class)->names([
    'index' => 'unites-enseignement.index',
    'create' => 'unites-enseignement.create',
    'store' => 'unites-enseignement.store',
    'show' => 'unites-enseignement.show',
    'edit' => 'unites-enseignement.edit',
    'update' => 'unites-enseignement.update',
    'destroy' => 'unites-enseignement.destroy',
]);
// Route::resource('/unites-enseignement',UnitesEnseignementController::class)->names('unites-enseignement');
Route::resource('elements-constitutifs', ElementsConstitutifsController::class)->names('elements-constitutifs');
// Route::delete('/unites-enseignement/{id}', [UnitesEnseignementController::class, 'destroy'])->name('unites-enseignement.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('notes/create', [NoteController::class, 'create'])->name('notes.create');

Route::post('notes', [NoteController::class, 'store'])->name('notes.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');