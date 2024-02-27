<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserReg;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\FileController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [UserReg::class, 'register']);

Route::post('/login', [UserLogin::class, 'login']);

// Route for file upload
Route::post('/upload', [FileController::class, 'upload']);

// Route for fetching submitted files
Route::get('/submitted-files', [FileController::class, 'submittedFiles']);