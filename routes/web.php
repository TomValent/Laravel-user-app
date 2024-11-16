<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/handle', [AuthController::class, 'handle'])->name('auth.handle');

Route::get('/address/form', function() {
    return view('addressForm');
})->name('addressForm');
