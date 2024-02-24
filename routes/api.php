<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

/**
 * 顧客関連
 */
Route::get('/clients/list', [ClientController::class, 'index']); //一覧取得処理
Route::post('/clients/create', [ClientController::class, 'store']);//登録処理
