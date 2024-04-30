<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasalController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/login', [UserController::class, 'auth'])->name('auth.login');
Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [CasalController::class, 'index'])->name('home');
    
    Route::get('/create', [CasalController::class, 'showCreate'])->name('showCreate');
    Route::post('/create', [CasalController::class, 'createCasal'])->name('createCasal');
    
    Route::get('/edit/{casalId}', [CasalController::class, 'showEdit'])->name('showEdit');
    Route::post('/edit', [CasalController::class, 'updateCasal'])->name('editCasal');
    Route::get('/delete/{casalId}', [CasalController::class, 'deleteCasal'])->name('deleteCasal');