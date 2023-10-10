<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [LoginController::class, 'index'])->name('view.login');
Route::post('/index', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/profile/show', [UserController::class, 'show'])->name('profile.show');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/home', [UserController::class, 'home'])->name('user.home');
Route::post('/post', [PostController::class, 'store'])->name('post.store');
