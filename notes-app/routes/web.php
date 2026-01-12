<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

//Protected Routes, only accessible when logged in
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/criar-task', [TaskController::class, 'store'])->name('store-task');
    Route::post('/criar-task-item',[TaskItemController::class, 'store'])->name('store-task-item');
});

//Forgot Password Route
Route::get('/esqueceu-senha', function () {
    //return view('forgot-password');
})->name('forgot-password');