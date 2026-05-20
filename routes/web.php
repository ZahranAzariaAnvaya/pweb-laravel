<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


// Hello World
Route::get('/hello', function () {
    return "Hello World";
});

// Home
Route::get('/', function () {
    return 'Selamat Datang di Laravel';
});

// User
Route::get('/user', [UserController::class, 'index']);

// Products
Route::get('/products', [ProductController::class, 'index']);

// Mahasiswa 
use App\Http\Controllers\MahasiswaController;
Route::resource('mahasiswa', MahasiswaController::class);
