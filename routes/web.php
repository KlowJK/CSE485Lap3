<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;


Route::get('/', [AuthController::class, 'loginForm'])->name('login')->middleware(LoginMiddleware::class);


Route::get('/login', [AuthController::class, 'loginForm'])->name('login')->middleware(LoginMiddleware::class);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeUsers'])->name('register');


Route::resource('tasks', TaskController::class)->middleware(AuthenticateMiddleware::class);;
Route::patch('/tasks/{task}/update-completed', [TaskController::class, 'updatecompleted'])->name('tasks.updatecompleted')->middleware(AuthenticateMiddleware::class);
route::get('/tasks/{task}/find-completed', [TaskController::class, 'findcompleted'])->name('tasks.findcompleted')->middleware(AuthenticateMiddleware::class);
