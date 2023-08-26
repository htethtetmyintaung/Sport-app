<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();    
// });

// Define a route group with 'auth:sanctum' middleware
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    // Your authenticated API routes go here
    Route::post('/logout', [LoginController::class, 'logout']);
});

// Route::get('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/login', [LoginController::class, 'login'])->name('register.login');

