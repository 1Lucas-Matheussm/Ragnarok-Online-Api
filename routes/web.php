<?php

use App\Http\Controllers\Api\MonsterController;
use Illuminate\Support\Facades\Route;

Route::get('monsters', [MonsterController::class, 'index'])->name('monsters.index');
Route::get('monsters/{id}', [MonsterController::class, 'show'])->name('monsters.show');
