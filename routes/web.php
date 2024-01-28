<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResidentController;

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

Route::group(['middleware'=>'guest'],function () {
    Route::get('/', [AuthController::class, 'index'])->name('loginPage');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'registerForm']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['middleware'=>'auth'],function () {
    Route::group(['middleware'=>'admin'],function () {
        Route::post('/resident/{id}/delete', [ResidentController::class, 'destroy']);
        Route::post('/resident/{id}/update', [ResidentController::class, 'update']);
    });
    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
