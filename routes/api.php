<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DirectoryController;
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


Route::controller(StaffController::class)->group(function () {

    Route::get('/staffs', 'index');
    Route::put('/user/update/status/{staff_id}', 'toggleStatus')->name('toggle.user');
    Route::post('/user/add', 'store')->name('store.user');
    Route::get('/user/delete/{staff_id}', 'destroy')->name('destroy.user');

    Route::get('/laboratory/staff', 'LaboratoryStaffRecord')->name('retrieve.staff');
    Route::post('/laboratory/staff/add', 'LaboratoryStaffAdd')->name('add.staff');
    Route::put('/laboratory/staff/{lab_staff_id}/{status}', 'LaboratoryStaffUpdate')->name('retrieve.staff');
    Route::post('/laboratory/staff/delete/{lab_staff_id}', 'LaboratoryStaffDestroy')->name('destroy.staff');
    Route::put('/profile/staff/{id}', 'updateStaff');

});


Route::controller(ScheduleController::class)->group(function () {

    Route::get('/schedule', 'index')->name('appointment.index');
    Route::post('/schedule/{type}', 'store')->name('appointment.store');
    Route::post('/schedule/destroy/{schedule_id}', 'destroy')->name('appointment.destroy');

});

Route::controller(DirectoryController::class)->group(function () {
    Route::get('/directory/{individual_type}','index');
});


// Route::get('/user/{id}', [StaffController::class, 'userDetail'])->name('detail.user');
// Route::post('/staff/activity', [StaffController::class, 'updateActivity']);

