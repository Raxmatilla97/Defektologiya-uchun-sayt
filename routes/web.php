<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;

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


// Route::get('/', function () {
//     return view('layouts.def');
// });
Route::get('/', [IndexController::class, 'index'])->name('site.index');
Route::get('/news-and-events', [IndexController::class, 'newsAndEvents'])->name('site.news-and-events');
Route::get('/news-and-events-sort/{sorting}', [IndexController::class, 'newsAndEventsSort'])->name('site.news-and-events-sort');
Route::get('/news-and-event/{slug}', [IndexController::class, 'newsAndEventsSingle'])->name('site.news-and-events-single');

Route::get('/projects', [IndexController::class, 'projectsIndex'])->name('site.projectsIndex');
Route::get('/project/{slug}', [IndexController::class, 'projectInfoPage'])->name('site.projectInfoPage');

Route::get('/seminars', [IndexController::class, 'seminarIndex'])->name('site.seminarIndex');
Route::get('/seminar/{slug}', [IndexController::class, 'seminarSingle'])->name('site.seminarSingle');
Route::get('/seminar-search', [IndexController::class, 'seminarSearch'])->name('site.seminarSearch');

Route::get('/specialists', [IndexController::class, 'specialistsIndex'])->name('site.specialistsIndex');
Route::get('/specialist/{slug}', [IndexController::class, 'specialistSingle'])->name('site.specialistSingle');

Route::get('/courses', [IndexController::class, 'coursesIndex'])->name('site.coursesIndex');
Route::get('/course/{slug}', [IndexController::class, 'courseSingle'])->name('site.courseSingle');


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/register-users-list', [DashboardController::class, 'registerUsersList'])->name('dashboard.registerUsersList');
});


// Route::get('/news-and-events', [News::class, 'index'])->name('profile.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
