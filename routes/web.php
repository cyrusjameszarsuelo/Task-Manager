<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    
    Route::resource('/task', TaskController::class);
    Route::post('/delete-task/{id}', [TaskController::class, 'destroy']);

    Route::get('/logout', [AuthController::class, 'logout']);

    
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate']);
    Route::resource('/register', RegisterController::class);
});


Route::any('{query}', function () {
    return redirect('/task');
})->where('query', '.*');

