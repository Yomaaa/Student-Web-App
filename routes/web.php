<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('dashboard', '\App\Http\Controllers\DashboardController')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/course', [CourseController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('course');

Route::post('/enroll', [CourseController::class, 'enroll'])
    ->middleware(['auth', 'verified'])
    ->name('enroll');
Route::get('/course-api', [CourseController::class, 'loadOnlyCourses'])
->middleware(['auth', 'verified'])
->name('course-api');
Route::post('/remove-course', [CourseController::class, 'removeCourse'])
->middleware(['auth', 'verified'])->name('remove-course');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
