<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollaboratorController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:collaborator'])->group(function () {

    Route::get('/collaborators', [CollaboratorController::class, 'index']);
    Route::post('/collaborators', [CollaboratorController::class, 'store']);
    Route::put('/collaborators/{collaborator}', [CollaboratorController::class, 'update']);
    Route::delete('/collaborators/{collaborator}', [CollaboratorController::class, 'destroy']);
});

require __DIR__ . '/auth.php';