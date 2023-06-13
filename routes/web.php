<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminImageController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PostIcommentsController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('map', [LandingController::class, 'map']);
Route::get('treat', [LandingController::class, 'treat']);
Route::get('social', [LandingController::class, 'social']);


Route::get('post', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('image', [ImageController::class, 'index']);
Route::get('images/{image:slug}', [ImageController::class, 'show']);
Route::post('images/{image:slug}/icomments', [PostIcommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('appointment', \App\Http\Controllers\AppointmentController::class);
Route::resource('appointments', AppointmentController::class)->except('show'); 
// Route::get('appointments/{appointment:id}/edit', [AppointmentController::class, 'edit']);
// Route::post('appointments/{appointment:id}/update', [AppointmentController::class, 'update']);
// Route::get('appointment', [AppointmentController::class, 'appointment']);

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::resource('admin/images', AdminImageController::class)->except('show');
    Route::resource('admin/appointments', AdminAppointmentController::class)->except('show'); 
});
