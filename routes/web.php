<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo', function(){
    return "Hello World";
});

use App\Http\Controllers\UserController;
Route::get('/user', [UserController::class, 'index']);
