<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SOEUCFormController;
use App\Http\Controllers\SOEUCUploadFormController;
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
Route::get('/captcha', [LoginController::class, 'generateCaptcha'])->name('captcha');
Route::get('/', [LoginController::class, 'showLoginForm'])->name('/');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login-dev', [LoginController::class, 'authenticateDev'])->name('authenticate-dev');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('profile/{id}/edit', [LoginController::class, 'getUserProfile'])->name('profile.edit');
Route::get('password/{id}/update', [LoginController::class, 'getUserPassword'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    
    Route::prefix('national-user')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('national-user.dashboard');
    });

    Route::prefix('institue-user')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('institue-user.dashboard');
        Route::get('/SOE-&-UC', [SOEUCFormController::class, 'index'])->name('institue-user.SOE-&-UC');
        Route::get('/SOE-UC-upload', [SOEUCUploadFormController::class, 'index'])->name('institue-user.SOE-UC-upload');
    });
    
});

