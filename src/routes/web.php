<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile/show', [UserController::class, 'show'])->name('profile.show');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/home', [UserController::class, 'home'])->name('user.home');
    Route::resource('posts', PostController::class);
    Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
    Route::get('/search/result', [SearchController::class, 'search'])->name('search.result');
    Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow');
    Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow');
    Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('post.like');
    Route::delete('/posts/{post}/unlike', [LikeController::class, 'unlike'])->name('post.unlike');

});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
