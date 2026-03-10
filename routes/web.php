<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractExtensionController;
use App\Http\Controllers\ContractTerminationController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:collaborator'])->group(function () {

    Route::get('/collaborators', [CollaboratorController::class, 'index']);
    Route::post('/collaborators', [CollaboratorController::class, 'store']);
    Route::put('/collaborators/{collaborator}', [CollaboratorController::class, 'update']);
    Route::delete('/collaborators/{collaborator}', [CollaboratorController::class, 'destroy']);

});


Route::middleware(['auth'])->group(function () {

    Route::resource('collaborators.contracts', ContractController::class);

    // Ruta para crear prórrogas
    Route::post('/contract-extensions', [ContractExtensionController::class, 'store']);

    Route::post('/contract-terminations', [ContractTerminationController::class, 'store']);

});

require __DIR__ . '/auth.php';