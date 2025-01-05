<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitesEnseignementController;
use App\Http\Controllers\ElementsConstitutifsController;

Route::get('/', function () {

    return view('welcome');
});
Route::get('/', function () {
    return view('acceuil');
    
    // Fichier "home.blade.php"
});
Route::get('/welcome', function () {
    return view('welcome'); // Fichier "autrePage.blade.php"
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
