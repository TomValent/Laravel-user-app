<?php

use App\Http\Controllers\UserApiController;
use Illuminate\Support\Facades\Route;

Route::get("/users", [UserApiController::class, "getUsers"]);
Route::get("/user/{userId}", [UserApiController::class, "getUser"]);

Route::post('/user/{userId}/address', [UserApiController::class, 'userAddress']);
