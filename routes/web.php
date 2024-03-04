<?php

use App\Http\Controllers\ProfileController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAuthenticated;

// use App\Http\Controllers\Staff\StaffController;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware([RedirectIfAuthenticated::class]);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Admin

Route::group(['middleware' => 'admin'], function () {

    Route::get('/management/user', function () {
        return Inertia::render('Admin/Account');
    })->middleware(['auth', 'verified'])->name('management.user');

    Route::get('/management/staff', function () {
        return Inertia::render('Admin/Staff');
    })->middleware(['auth', 'verified'])->name('management.staff');

    Route::get('/directory/record', function () {
        return Inertia::render('Admin/Directory');
    })->middleware(['auth', 'verified'])->name('directory');

    Route::get('/schedule', function () {
        return Inertia::render('Admin/Schedule');
    })->middleware(['auth', 'verified'])->name('schedule');

    Route::get('/report', function () {
        return Inertia::render('Admin/Report');
    })->middleware(['auth', 'verified'])->name('report');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/staff', [ProfileController::class, 'updateStaff'])->name('profile.updateStaff');
    Route::patch('/profile/staff/photo', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});












// Route::get('/components/buttons', function () {
//     return Inertia::render('Components/Buttons');
// })->middleware(['auth', 'verified'])->name('components.buttons');

// Route::get('/components/buttonss', function () {
//     return Inertia::render('Components/Buttonss');
// })->middleware(['auth', 'verified'])->name('components.buttonss');





require __DIR__ . '/auth.php';
