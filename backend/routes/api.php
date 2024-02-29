<?php

use App\Http\Controllers\DepartmentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserReg;
use App\Http\Controllers\UserLogin;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DepartmentRetrieve;
use App\Http\Controllers\FormRegistration;
use App\Http\Controllers\FormRetrieve;
use App\Http\Controllers\Archive;

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

// Add department
Route::post('/department', [DepartmentRegistration::class, 'addDepartment']);

// Retrive department
Route::get('/retrieve', [DepartmentRetrieve::class, 'getDepartments']);

// Add forms
Route::post('/form', [FormRegistration::class, 'submitForm']);

// Retrive forms
Route::get('/retrieve-forms', [FormRetrieve::class, 'getForms']);

// Archive
Route::put('/archive/{id}', [Archive::class, 'archiveDepartment']);

Route::put('/archive-forms/{id}', [Archive::class, 'archiveForms']);
