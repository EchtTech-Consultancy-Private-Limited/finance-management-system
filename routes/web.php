<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\ProgramController;
use App\Http\Controllers\Master\InstituteController;
use App\Http\Controllers\Master\UcFormController;
use App\Http\Controllers\SOEUCFormController;
use App\Http\Controllers\SOEUCUploadFormController;
use App\Http\Controllers\NOHPPCZRCSController;
use App\Http\Controllers\NOHPPCZSSSController;
use App\Http\Controllers\NRCPLABController;
use App\Http\Controllers\PPCLLabController;
use App\Http\Controllers\PMABHIMSSSController;
use App\Http\Controllers\NationalSeoExpenseController;
use App\Http\Controllers\NotificationController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('/');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/captcha-code', [LoginController::class, 'generateCaptcha'])->name('captcha-code');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{id}/edit', [DashboardController::class, 'getUserProfile'])->name('profile.edit');
    Route::get('password/{id}/update', [DashboardController::class, 'getUserPassword'])->name('password.update');
    Route::post('update-profile/{id}', [DashboardController::class, 'updateProfile'])->name('update-profile');
    Route::post('change-password/{id}', [DashboardController::class, 'changePassword'])->name('change-password');
    Route::get('/filter', [DashboardController::class, 'filterCity'])->name('filterCity');
    Route::get('/filter-program', [DashboardController::class, 'filterProgram'])->name('filterProgram');
    Route::get('/notifications', [NotificationController::class, 'getNotifications']);

    Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['checkUserType:admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/filter-dashboard', [AdminController::class, 'adminFilterDdashboard'])->name('filter-dashboard');
        Route::get('/facility-mapping', [AdminController::class, 'facilityMapping'])->name('facility-mapping');
        Route::post('/create-facility-mapping', [AdminController::class, 'facilityMappingCreate'])->name('create-facility-mapping');
        Route::get('/edit-facility-mapping/{id}', [AdminController::class, 'facilityMappingEdit'])->name('facility-mapping-edit');
        Route::post('/update-facility-mapping/{id}', [AdminController::class, 'facilityMappingUpdate'])->name('update-facility-mapping');
        
        Route::group(['prefix' => 'programs', 'as' => 'programs.'], function(){
            Route::get('/', [ProgramController::class, 'index'])->name('index');
            Route::post('store', [ProgramController::class, 'store'])->name('store');
            Route::get('edit/{id}', [ProgramController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [ProgramController::class, 'update'])->name('update');
            Route::get('delete/{id}', [ProgramController::class, 'delete'])->name('delete');
        });
        Route::group(['prefix' => 'institutes', 'as' => 'institutes.'], function(){
            Route::get('/', [InstituteController::class, 'index'])->name('index');
            Route::post('store', [InstituteController::class, 'store'])->name('store');
            Route::get('edit/{id}', [InstituteController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [InstituteController::class, 'update'])->name('update');
            Route::get('delete/{id}', [InstituteController::class, 'delete'])->name('delete');
        });
        Route::group(['prefix' => 'ucuploads', 'as' => 'ucuploads.'], function(){
            Route::get('/', [UcFormController::class, 'index'])->name('index');
            Route::post('store', [UcFormController::class, 'store'])->name('store');
            Route::get('edit/{id}', [UcFormController::class, 'edit'])->name('edit');
            Route::post('update/{id}', [UcFormController::class, 'update'])->name('update');
            Route::get('delete/{id}', [UcFormController::class, 'delete'])->name('delete');
        });
    });

    Route::group(['prefix' => 'national-users', 'as' => 'national-user.','middleware' => ['checkUserType:national']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/filter-dashboard', [DashboardController::class, 'nationalFilterDdashboard'])->name('filter-dashboard');
        Route::get('/yearly-soe-expenditure-filter', [DashboardController::class, 'yearlySoeExpenditureFilter'])->name('yearly-soe-expenditure-filter');
        Route::get('/expenditure-bar-chart-pie-filter', [DashboardController::class, 'expenditureBarChartPieFilter'])->name('expenditure-bar-chart-pie-filter');
        Route::get('/all-form-map-filter', [DashboardController::class, 'allFormMapFilter'])->name('all-form-map-filter');
        Route::get('/filter-uc-form-dashboard', [DashboardController::class, 'nationalFilterUcFormDashboard'])->name('filter-uc-form-dashboard');
        Route::post('/total-card', [DashboardController::class, 'totalCard'])->name('total-card');
        Route::get('/soe-expense-list', [NationalSeoExpenseController::class, 'index'])->name('soe-expense-index');
        Route::get('/uc-upload-list', [SOEUCUploadFormController::class, 'ucUploadList'])->name('uc-upload-list');
        Route::get('/soe-expense-view/{id}', [NationalSeoExpenseController::class, 'view'])->name('soe-expense-view');
        Route::post('/soe-change-status/{id}', [NationalSeoExpenseController::class, 'changeStatus'])->name('soe-change-status');
        Route::post('/soe-uc-update-change-status/{id}', [SOEUCUploadFormController::class, 'changeStatus'])->name('soe-uc-update-change-status');
        Route::get('/report', [DashboardController::class, 'report'])->name('report');
        Route::get('report-export', [DashboardController::class, 'export'])->name('report-export');
        Route::get('dashboard-report', [DashboardController::class, 'dashboardReport'])->name('dashboard-report');
        // NOHPPCZ-RCs Dashboard
        Route::get('/nohppczrcs', [NOHPPCZRCSController::class, 'index'])->name('nohppczrcs');
        Route::get('/nohppczrcs-filter-dashboard', [NOHPPCZRCSController::class, 'nohppczrcsNationalFilterDdashboard'])->name('nohppczrcs-filter-dashboard');
        Route::get('/nohppczrcs-filter-uc-form-dashboard', [NOHPPCZRCSController::class, 'nohppczrcsNationalFilterUcFormDashboard'])->name('nohppczrcs-filter-uc-form-dashboard');
        Route::get('/nohppczrcs-soe-expenditure-filter', [NOHPPCZRCSController::class, 'nohppczrcsSoeExpenditureFilter'])->name('nohppczrcs-soe-expenditure-filter');        
        Route::get('nohppczrcs-dashboard-report', [NOHPPCZRCSController::class, 'nohppczrcsDashboardReport'])->name('nohppczrcs-dashboard-report');
        // NOHPPCZ-SSS Dashboard
        Route::get('/nohppczrsss', [NOHPPCZSSSController::class, 'index'])->name('nohppczrsss');
        Route::get('/nohppczrsss-filter-dashboard', [NOHPPCZSSSController::class, 'nohppczrsssNationalFilterDdashboard'])->name('nohppczrsss-filter-dashboard');
        Route::get('/nohppczrsss-filter-uc-form-dashboard', [NOHPPCZSSSController::class, 'nohppczrsssNationalFilterUcFormDashboard'])->name('nohppczrsss-filter-uc-form-dashboard');
        Route::get('/nohppczrsss-soe-expenditure-filter', [NOHPPCZSSSController::class, 'nohppczrsssSoeExpenditureFilter'])->name('nohppczrsss-soe-expenditure-filter');        
        Route::get('/nohppczrsss-dashboard-report', [NOHPPCZSSSController::class, 'nohppczrsssDashboardReport'])->name('nohppczrsss-dashboard-report');
        // NRCP-LAB Dashboard
        Route::get('/nrcplab', [NRCPLABController::class, 'index'])->name('nrcplab');
        Route::get('/nrcplab-filter-dashboard', [NRCPLABController::class, 'nrcplabNationalFilterDdashboard'])->name('nrcplab-filter-dashboard');
        Route::get('/nrcplab-filter-uc-form-dashboard', [NRCPLABController::class, 'nrcplabNationalFilterUcFormDashboard'])->name('nrcplab-filter-uc-form-dashboard');
        Route::get('/nrcplab-soe-expenditure-filter', [NRCPLABController::class, 'nrcplabSoeExpenditureFilter'])->name('nrcplab-soe-expenditure-filter');        
        Route::get('/nrcplab-dashboard-report', [NRCPLABController::class, 'nrcplabDashboardReport'])->name('nrcplab-dashboard-report');
        // PPCL-LAB Dashboard
        Route::get('/ppcllab', [PPCLLabController::class, 'index'])->name('ppcllab');
        Route::get('/ppcllab-filter-dashboard', [PPCLLabController::class, 'ppcllabNationalFilterDdashboard'])->name('ppcllab-filter-dashboard');
        Route::get('/ppcllab-filter-uc-form-dashboard', [PPCLLabController::class, 'ppcllabNationalFilterUcFormDashboard'])->name('ppcllab-filter-uc-form-dashboard');
        Route::get('/ppcllab-soe-expenditure-filter', [PPCLLabController::class, 'ppcllabSoeExpenditureFilter'])->name('ppcllab-soe-expenditure-filter');        
        Route::get('/ppcllab-dashboard-report', [PPCLLabController::class, 'ppcllabDashboardReport'])->name('ppcllab-dashboard-report');
        // PM-ABHIM-SSS Dashboard
        Route::get('/pmabhimsss', [PMABHIMSSSController::class, 'index'])->name('pmabhimsss');
        Route::get('/pmabhimsss-filter-dashboard', [PMABHIMSSSController::class, 'pmabhimsssNationalFilterDdashboard'])->name('pmabhimsss-filter-dashboard');
        Route::get('/pmabhimsss-filter-uc-form-dashboard', [PMABHIMSSSController::class, 'pmabhimsssNationalFilterUcFormDashboard'])->name('pmabhimsss-filter-uc-form-dashboard');
        Route::get('/pmabhimsss-soe-expenditure-filter', [PMABHIMSSSController::class, 'pmabhimsssSoeExpenditureFilter'])->name('pmabhimsss-soe-expenditure-filter');        
        Route::get('/pmabhimsss-dashboard-report', [PMABHIMSSSController::class, 'pmabhimsssDashboardReport'])->name('pmabhimsss-dashboard-report');
    });

    Route::group(['prefix' => 'institute-users', 'as' => 'institute-user.','middleware' => ['checkUserType:institute']], function () {
        Route::get('/dashboard', [DashboardController::class, 'instituteDashboard'])->name('dashboard');
        Route::get('/filter-dashboard', [DashboardController::class, 'instituteFilterDdashboard'])->name('filter-dashboard');
        Route::get('/report', [SOEUCFormController::class, 'report'])->name('report');
        Route::get('report-export', [SOEUCFormController::class, 'export'])->name('report-export');
        Route::get('/soe-form-list', [SOEUCFormController::class, 'index'])->name('soe-form-list');
        Route::get('/soe-form', [SOEUCFormController::class, 'create'])->name('soe-form');
        Route::post('/soe-save', [SOEUCFormController::class, 'store'])->name('soe-save');
        Route::get('/soe-edit/{id}', [SOEUCFormController::class, 'edit'])->name('soe-edit');
        Route::post('/soe-update/{id}', [SOEUCFormController::class, 'update'])->name('soe-update');
        Route::get('/soe-view/{id}', [SOEUCFormController::class, 'view'])->name('soe-view');
        Route::post('/soe-uc-change-status/{id}', [SOEUCFormController::class, 'changeStatus'])->name('soe-uc-change-status');
        Route::get('/soe-destroy/{id}', [SOEUCFormController::class, 'destroy'])->name('soe-destroy');
        Route::get('/SOE-UC-upload-list', [SOEUCUploadFormController::class, 'index'])->name('SOE-UC-upload-list');
        Route::get('/SOE-UC-upload', [SOEUCUploadFormController::class, 'create'])->name('SOE-UC-upload');
        Route::post('/save', [SOEUCUploadFormController::class, 'store'])->name('save');
        Route::get('/SOE-UC-upload-edit/{id}', [SOEUCUploadFormController::class, 'edit'])->name('SOE-UC-upload-edit');
        Route::post('/update/{id}', [SOEUCUploadFormController::class, 'update'])->name('update');        
        Route::get('/SOE-UC-upload-destroy/{id}', [SOEUCUploadFormController::class, 'destroy'])->name('SOE-UC-upload-destroy');
    });
});
