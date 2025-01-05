<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('unites-enseignement', UnitesEnseignementController::class)->names([
    'acceuil' => 'unites-enseignement.acceuil',
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

require __DIR__.'/auth.php';