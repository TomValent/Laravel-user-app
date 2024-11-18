<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::post('/handle', [AuthController::class, 'handle'])
        ->name('auth.handle');
});

Route::get('user/{userId}/address/form', function() {
    return view('addressForm');
})->name('addressForm');
