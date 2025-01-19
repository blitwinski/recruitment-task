<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::get('/', [PetController::class, 'index'])->name('pets.index');
Route::get('/pet/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
Route::put('/pet/{id}', [PetController::class, 'update'])->name('pets.update');
Route::delete('/pet/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
Route::post('/create', [PetController::class, 'create'])->name('pets.create');
