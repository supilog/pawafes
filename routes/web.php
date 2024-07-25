<?php

use App\Http\Controllers\PawafesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PawafesController::class, 'index'])->name('index');
Route::get('/list', [PawafesController::class, 'list'])->name('list');
