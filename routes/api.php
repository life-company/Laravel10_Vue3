<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/**
 * 顧客関連
 */
Route::prefix('/clients')->group(function () {
  Route::get('/list', [ClientController::class, 'index']);
  Route::post('/create', [ClientController::class, 'store']);
  Route::put('/update', [ClientController::class, 'update']);
  Route::delete('/delete/{id}', [ClientController::class, 'destroy']);
});