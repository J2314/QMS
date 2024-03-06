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
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ViewContent;
use App\Http\Controllers\ViewPDF;

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
    

// Add department
Route::post('/department', [DepartmentRegistration::class, 'addDepartment']);

// Retrive department
Route::get('/retrieve', [DepartmentRetrieve::class, 'getDepartments']);

// Add forms
Route::post('/form', [FormRegistration::class, 'submitForm']);

// Retrive Forms per ID
Route::get('/retrieve-forms/{data}', [FormRetrieve::class, 'retrieve_forms']);

// Retrive forms
Route::get('/retrieve-forms', [FormRetrieve::class, 'getForms']);

// Archive
Route::put('/archive/{id}', [Archive::class, 'archiveDepartment']);

Route::put('/archive-forms/{id}', [Archive::class, 'archiveForms']);

// Upload Files
Route::post('/upload', [FileUpload::class, 'upload']);

Route::get('/retrieve-upload/{formId}', [FileUpload::class, 'retrieveUploads']);

// View PDF
Route::get('/get-file-content/{fileId}', [ViewPDF::class, 'getFileContent']);


