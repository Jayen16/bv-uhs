<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


//Any user
// Route::get('/user', [StaffController::class, 'retrieveUserDetail']);

//Admin
Route::get('/staffs', [StaffController::class, 'index']);

Route::put('/user/update/status/{staff_id}', [StaffController::class, 'toggleStatus'])->name('toggle.user');
Route::post('/user/add', [StaffController::class, 'store'])->name('store.user');
Route::get('/user/delete/{staff_id}', [StaffController::class, 'destroy'])->name('destroy.user');

Route::get('/laboratory/staff', [StaffController::class, 'LaboratoryStaffRecord'])->name('retrieve.staff');
Route::post('/laboratory/staff/add', [StaffController::class, 'LaboratoryStaffAdd'])->name('add.staff');
Route::put('/laboratory/staff/{lab_staff_id}/{status}', [StaffController::class, 'LaboratoryStaffUpdate'])->name('retrieve.staff');
Route::post('/laboratory/staff/delete/{lab_staff_id}', [StaffController::class, 'LaboratoryStaffDestroy'])->name('destroy.staff');

Route::put('/profile/staff/{id}', [StaffController::class, 'updateStaff']);


Route::get('/schedule', [ScheduleController::class, 'index'])->name('appointment.index');
Route::post('/schedule/{type}', [ScheduleController::class, 'store'])->name('appointment.store');
// Route::get('/appointment/general', [ScheduleController::class, 'indexGeneral'])->name('appointment.indexGeneral');




// Route::get('/user/{id}', [StaffController::class, 'userDetail'])->name('detail.user');
// Route::post('/staff/activity', [StaffController::class, 'updateActivity']);

