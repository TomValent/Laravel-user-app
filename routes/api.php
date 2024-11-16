<?php

use App\Http\Controllers\UserApiController;
use Illuminate\Routing\Route;

Route::get('/users', [UserApiController::class, 'getUsers']);
Route::get('/user/{id}', [UserApiController::class, 'getUser']);

Route::post('/user/{id}/address', [UserApiController::class, 'userAddress']);
