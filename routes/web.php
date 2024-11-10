<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\RoleMiddleware; 
use App\Http\Controllers\AdminController;

// Public route
// Route::get('/', function () {
//     return view('welcome');
// });

// Authentication routes
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    
    // Lecturer routes
    Route::middleware([RoleMiddleware::class . ':2'])->group(function () {
        Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');
    });

    // Student routes
    Route::middleware([RoleMiddleware::class . ':3'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    });
});

// Protected routes (requires authentication)
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Change the route for status to include the user ID as a parameter
Route::post('/status/{id}', [HomeController::class, 'status'])->name('status');

Route::delete('/user/{id}', [HomeController::class, 'delete'])->name('user.delete');

Route::group(['prefix' => 'student'], function () {
    Route::get('/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/notifications', [StudentController::class, 'notifications'])->name('student.notifications');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/create-subject', [AdminController::class, 'createSubject'])->name('admin.createSubject');
    Route::post('/store', [AdminController::class, 'storeSubject'])->name('admin.storeSubject');
    Route::get('/notification', [AdminController::class, 'notification'])->name('admin.notification');
    Route::get('/notification/class', [AdminController::class, 'classNotification'])->name('admin.notification.class');
});
