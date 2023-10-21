<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'login'])->name('login.form');
Route::post('user-login', [AuthController::class, 'userLogin'])->name('user.login');


Route::middleware(['authCheck'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('logout', [AuthController::class, 'logOut'])->name('user.logout');
    Route::get('add-details', [UploadsController::class, 'addDetails'])->name('add.details');
    Route::get('workers-list', [AdminController::class, 'workersList'])->name('workers.list');
    Route::get('employee-list',[AdminController::class,'employerList'])->name('employer.list');
    Route::get('sectors-list', [AdminController::class, 'sectorList'])->name('sector.list');

    Route::get('addSector', [UploadsController::class, 'addSector'])->name('add.sector');
    Route::post('insertSector', [UploadsController::class, 'insertSector'])->name('insert.sector');
    Route::get('addEmployer', [UploadsController::class, 'addEmployer'])->name('add.employer');
    Route::post('insertEmployer', [UploadsController::class, 'insertEmployer'])->name('insert.employer');
    Route::get('addEmployee', [UploadsController::class, 'addEmployee'])->name('add.employee');
    Route::post('insertEmployee', [UploadsController::class, 'insertEmployee'])->name('insert.employee');
    Route::get('/get-sectors/{id}', [UploadsController::class, 'getSector'])->name('get.sector');

    Route::get('employer-renewal',[AdminController::class,'employerRenewal'])->name('employer.renewal');
    Route::get('get-empDetails/{id}',[AdminController::class,'getEmployerDetails'])->name('get.employerDetails');

    Route::post('employerRenewal',[UploadsController::class, 'employerRenewal'])->name('employerRenewal.insert');

    Route::get('employee-renewal',[AdminController::class,'employeeRenewal'])->name('employee.renewal');
    Route::get('get-employee/{id}',[AdminController::class,'getEmployee'])->name('get.employee');
    Route::get('get-employeDetails/{id}',[AdminController::class,'getEmployeeDetails'])->name('get.employeeDetails');
    Route::post('employeeRenewal',[UploadsController::class,'insertEmployeeRenewal'])->name('insert.employeeRenewal');
    
    Route::get('renewal-list',[AdminController::class,'renewalList'])->name('renewal.list');

    Route::get('employer-edit/{id}',[UploadsController::class,'editEmployer'])->name('edit.employer');
    Route::post('update-employer',[UploadsController::class,'updateEmployer'])->name('update.employer');
    Route::get('employer-delete/{id}', [UploadsController::class, 'delete'])->name('delete.employer');

    Route::get('employee-edit/{id}',[UploadsController::class,'editEmployee'])->name('edit.employee');
    Route::post('employee-update',[UploadsController::class,'updateEmployee'])->name('update.employee');
    Route::get('employee-delete/{id}',[UploadsController::class,'deleteEmployee'])->name('delete.employee');

    Route::get('sectors-edit/{id}', [UploadsController::class ,'editSectors'])->name('sector.edit');
    Route::post('sector-update',[UploadsController::class,'updateSector'])->name('update.sector');
    Route::get('sector-delete/{id}', [UploadsController::class, 'deleteSector'])->name('sector.delete');

    Route::get('renewal-list',[AdminController::class,'renewalList'])->name('renewal.list');
    Route::get('employer-renewal-edit/{id}',[UploadsController::class,'employerRenewalEdit'])->name('employer.renewal.edit');
    Route::get('employee-renewal-edit/{id}', [UploadsController::class, 'employeeRenewalEdit'])->name('employee.renewal.edit');
    Route::post('employer-renewalEdit',[UploadsController::class,'editRenewalEmployer'])->name('edit.renewal.employer');
    Route::get('employer-renewal-delete/{id}',[UploadsController::class,'employerRenewalDelete'])->name('employer.renewal.delete');
    Route::post('employee-renewalEdit', [UploadsController::class, 'editRenewalEmployee'])->name('edit.renewal.employee');
    Route::get('employee-renewal-delete/{id}',[UploadsController::class, 'employeeRenewalDelete'])->name('employee.renewal.delete');
    Route::get('employer-expiry-details/{dateRange}',[AdminController::class,'employerExpiryList'])->name('expiry.employer');
});
