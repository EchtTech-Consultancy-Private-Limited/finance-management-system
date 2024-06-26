<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SOEUCFormController;
use App\Http\Controllers\SOEUCUploadFormController;
use App\Http\Controllers\NOHPPCZRCSController;
use App\Http\Controllers\NOHPPCZSSSController;
use App\Http\Controllers\NRCPLABController;
use App\Http\Controllers\PPCLLabController;
use App\Http\Controllers\PMABHIMSSSController;
use App\Http\Controllers\NationalSeoExpenseController;
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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('/');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/captcha-code', [LoginController::class, 'generateCaptcha'])->name('captcha-code');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
        
    Route::get('/profile/{id}/edit', [DashboardController::class, 'getUserProfile'])->name('profile.edit');
    Route::get('password/{id}/update', [DashboardController::class, 'getUserPassword'])->name('password.update');
    Route::post('update-profile', [DashboardController::class, 'updateProfile'])->name('update-profile');
    Route::get('/filter', [DashboardController::class, 'filterCity'])->name('filterCity');

    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        // Route::get('/get_district/{id}', [AdminController::class, 'getDistrict'])->name('admin.get_district');
        Route::get('/facility-mapping/{id?}', [AdminController::class, 'facilityMapping'])->name('admin.facility-mapping');
        Route::post('/update-facility-mapping/{id?}', [AdminController::class, 'facilityMappingUpdate'])->name('admin.update-facility-mapping');
    
    });
    Route::group(['prefix' => 'national-users', 'as' => 'national-user.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/filter-dashboard', [DashboardController::class, 'nationalFilterDdashboard'])->name('filter-dashboard');
        Route::post('/total-card', [DashboardController::class, 'totalCard'])->name('total-card');
        Route::get('/nohppczrcs', [NOHPPCZRCSController::class, 'index'])->name('nohppczrcs');
        Route::get('/nohppczrsss', [NOHPPCZSSSController::class, 'index'])->name('nohppczrsss');
        Route::get('/nrcplab', [NRCPLABController::class, 'index'])->name('nrcplab');
        Route::get('/ppcllab', [PPCLLabController::class, 'index'])->name('ppcllab');
        Route::get('/pmabhimsss', [PMABHIMSSSController::class, 'index'])->name('pmabhimsss');
        // SOE Expense
        Route::get('/soe-expense-list', [NationalSeoExpenseController::class, 'index'])->name('soe-expense-index');
        Route::get('/soe-expense-create', [NationalSeoExpenseController::class, 'create'])->name('soe-expense-create');
        Route::post('/soe-expense-save', [NationalSeoExpenseController::class, 'store'])->name('soe-expense-save');
        Route::post('/soe-change-status/{id}', [NationalSeoExpenseController::class, 'changeStatus'])->name('soe-change-status');
        Route::get('/soe-edit/{id}', [NationalSeoExpenseController::class, 'edit'])->name('soe-edit');
        Route::post('/soe-update/{id}', [NationalSeoExpenseController::class, 'update'])->name('soe-update');
        Route::get('/soe-destroy/{id}', [NationalSeoExpenseController::class, 'destroy'])->name('soe-destroy');
        // end SOE Expense
    });

    Route::group(['prefix' => 'institute-users', 'as' => 'institute-user.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/filter-dashboard', [DashboardController::class, 'instituteFilterDdashboard'])->name('filter-dashboard');
        Route::get('/report', [SOEUCFormController::class, 'report'])->name('report');
        Route::post('report-export', [SOEUCFormController::class, 'export'])->name('report-export');
        Route::get('/SOE-&-UC-list', [SOEUCFormController::class, 'index'])->name('SOE-&-UC-list');
        Route::get('/SOE-&-UC', [SOEUCFormController::class, 'create'])->name('SOE-&-UC');
        Route::post('/soe-uc-save', [SOEUCFormController::class, 'store'])->name('soe-uc-save');
        Route::get('/soe-uc-edit/{id}', [SOEUCFormController::class, 'edit'])->name('soe-uc-edit');
        Route::post('/soe-uc-update/{id}', [SOEUCFormController::class, 'update'])->name('soe-uc-update');
        Route::post('/soe-uc-change-status/{id}', [SOEUCFormController::class, 'changeStatus'])->name('soe-uc-change-status');
        Route::get('/soe-uc-destroy/{id}', [SOEUCFormController::class, 'destroy'])->name('soe-uc-destroy');
        // SOE-UC-upload routes
        Route::get('/SOE-UC-upload-list', [SOEUCUploadFormController::class, 'index'])->name('SOE-UC-upload-list');
        Route::get('/SOE-UC-upload', [SOEUCUploadFormController::class, 'create'])->name('SOE-UC-upload');
        Route::post('/save', [SOEUCUploadFormController::class, 'store'])->name('save');
        Route::get('/SOE-UC-upload-edit/{id}', [SOEUCUploadFormController::class, 'edit'])->name('SOE-UC-upload-edit');
        Route::post('/update/{id}', [SOEUCUploadFormController::class, 'update'])->name('update');
        Route::post('/soe-uc-update-change-status/{id}', [SOEUCUploadFormController::class, 'changeStatus'])->name('soe-uc-update-change-status');
        Route::get('/SOE-UC-upload-destroy/{id}', [SOEUCUploadFormController::class, 'destroy'])->name('SOE-UC-upload-destroy');

    });
});