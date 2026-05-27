<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StudentController;

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
Route::resource('mahasiswa', MahasiswaController::class);

// Students
Route::get('/latihan', [StudentController::class, 'latihan']);
Route::resource('students', StudentController::class);
Route::get('/jadwal', [StudentController::class, 'jadwal']);
