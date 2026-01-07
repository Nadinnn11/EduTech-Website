<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;


Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('home'); })->name('home');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});



Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
    

    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
});


Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('courses', CourseController::class);
    Route::resource('materials', MaterialController::class);
    
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('materials', MaterialController::class);
    Route::resource('courses', CourseController::class);
});
