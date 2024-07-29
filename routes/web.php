<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelTrackingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Home Route
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Define a route for the index page
    Route::get('/index', [ParcelTrackingController::class, 'index'])->name('index');
});

// Authentication Routes
// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Forgot password routes
Route::get('password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

//User Details
Route::get('/user/details', [UserController::class, 'showDetails'])
    ->name('user.details')
    ->middleware('auth');
// Edit User Details
Route::get('/user/edit', [UserController::class, 'edit'])
    ->name('user.edit')
    ->middleware('auth');
Route::put('/user/update', [UserController::class, 'update'])
    ->name('user.update')
    ->middleware('auth');
// Delete User Account
Route::delete('/user/destroy', [UserController::class, 'destroy'])
    ->name('user.destroy')
    ->middleware('auth');

// Search by sales_order_id
Route::get('/search-order', [ParcelTrackingController::class, 'index'])->name('search');


