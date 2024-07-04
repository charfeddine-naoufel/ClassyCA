<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MatiereController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// middleware routes
// Admin routes
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-dash');
    Route::get('/matiere', [MatiereController::class, 'index'])->name('matiere.index');

    
  
  });
  // Student routes
  Route::middleware('student')->prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student-dash');
  
  });
  // Teacher routes
  Route::middleware('teacher')->prefix('teacher')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teacher-dash');
  
  });
