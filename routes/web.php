<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RDVController;
use App\Http\Controllers\PersonnelController;

Route::get('/', [AccueilController::class, 'index'])->name('accueil');


Route::middleware('auth',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/rdv', [RDVController::class, 'store'])->name('rdv.store');
    // Route pour confirmer ou annuler (changement de statut uniquement)
    Route::post('/rdv/{id}/status', [RDVController::class, 'updateStatus'])
         ->name('rdv.updateStatus');

    // Route pour le Modal (modification de la date et de l'heure)
    Route::patch('/rdv/{id}/modifier', [RDVController::class, 'modifier'])
         ->name('rdv.modifier');
    Route::get('/ajouter-medecin', [PersonnelController::class, 'create'])->name('medecin.create');
    Route::post('/ajouter-medecin', [PersonnelController::class, 'store'])->name('medecin.store');     
    Route::delete('/rdv/{id}', [RDVController::class, 'destroy'])->name('rdv.destroy');

});

require __DIR__.'/auth.php'; 
