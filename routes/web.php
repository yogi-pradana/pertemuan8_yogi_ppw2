<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;

// Route::controller(LoginRegisterController::class)->group(function(){
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');;
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware ('auth')->group(function() {
    Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginRegisterController::class, 'logout']);
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});
