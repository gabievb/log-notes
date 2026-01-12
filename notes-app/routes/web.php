<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskItemController;
use Illuminate\Support\Facades\Route;


//Home Route
Route::get('/', [UserController::class, 'index'])->name('home');

//Create Account Routes
Route::get('/criar-conta', [UserController::class, 'create'])->name('create-account');
Route::post('/criar-conta', [UserController::class, 'store'])->name('insert-account');

//Login Routes
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Forgot Password Routes
Route::get('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('password.request');
Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'updatePassword'])->name('password.update');

//Protected Routes, only accessible when logged in
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/criar-task', [TaskController::class, 'store'])->name('store-task');
    Route::post('/criar-task-item',[TaskItemController::class, 'store'])->name('store-task-item');
});

