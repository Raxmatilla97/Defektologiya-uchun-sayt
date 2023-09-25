<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CkeditorController;

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

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');


Route::prefix('dashboard')->middleware('auth')->group(function () {  
    Route::get('/search', [DashboardController::class, 'kurslarSearch'])->name('dashboard.kurslarSearch');

    Route::delete('/delete-kurslar/{id?}', [DashboardController::class, 'kurslarDeleteDashboard'])->name('dashboard.kurslarDeleteDashboard');
    Route::get('/create-courses', [DashboardController::class, 'createCourses'])->name('dashboard.createCourses');
    Route::post('/store-courses', [DashboardController::class, 'coursesStore'])->name('dashboard.coursesStore'); 
    Route::get('/my-created-courses/{request?}', [DashboardController::class, 'myCreatedCourses'])->name('dashboard.myCreatedCourses'); 
    Route::get('/my-courses/{request?}', [DashboardController::class, 'myCourses'])->name('dashboard.myCourses');
    Route::get('/edit-course/{slug}', [DashboardController::class, 'editCourse'])->name('dashboard.editCourse');
    Route::post('/edit-course-Store', [DashboardController::class, 'coursesStoreEdit'])->name('dashboard.coursesStoreEdit'); 
    Route::get('/add-video-darslar/{slug?}', [DashboardController::class, 'addVideoDarslar'])->name('dashboard.addVideoDarslar'); 
    Route::post('/add-video-darslar-store', [DashboardController::class, 'addVideoDarslarStore'])->name('dashboard.addVideoDarslarStore'); 
    Route::post('/edit-video-darslar', [DashboardController::class, 'editVideoDarslar'])->name('dashboard.editVideoDarslar'); 
   
    Route::get('/news-and-events', [NewsController::class, 'newsAndEvents'])->name('dashboard.newsAndEvents');
    Route::delete('/news-and-events/{id?}', [NewsController::class, 'newsAndEventsDelete'])->name('dashboard.newsAndEventsDelete'); 
    Route::get('/news-and-events-search', [NewsController::class, 'newsAndEventsSearch'])->name('dashboard.newsAndEventsSearch');
    Route::get('/news-and-events-create', [NewsController::class, 'newsAndEventsCreate'])->name('dashboard.newsAndEventsCreate');
    Route::post('/news-and-events-store', [NewsController::class, 'newsAndEventsStore'])->name('dashboard.newsAndEventsStore'); 
    Route::get('/news-and-event-edit/{slug?}', [NewsController::class, 'newsAndEventsEdit'])->name('dashboard.newsAndEventsEdit');
    Route::post('/news-and-events-edit-store', [NewsController::class, 'newsAndEventsEditStore'])->name('dashboard.newsAndEventsEditStore'); 
  
    Route::get('/projects', [ProjectController::class, 'projectIndex'])->name('dashboard.projectIndex');
    Route::delete('/projects-delete/{id?}', [ProjectController::class, 'projectDestroy'])->name('dashboard.projectDestroy'); 
    Route::get('/projects-search', [ProjectController::class, 'projectSearch'])->name('dashboard.projectSearch');
    Route::get('/project-create', [ProjectController::class, 'projectCreate'])->name('dashboard.projectCreate');
    Route::post('/project-store', [ProjectController::class, 'projectStore'])->name('dashboard.projectStore'); 
    Route::get('/project-edit/{slug?}', [ProjectController::class, 'projectEdit'])->name('dashboard.projectEdit');
    Route::post('/project-update', [ProjectController::class, 'projectUpdate'])->name('dashboard.projectUpdate'); 


    

    Route::get('/{kurslar?}', [DashboardController::class, 'kurslarDashboardList'])->name('dashboard.kurslarDashboardList');

    Route::get('/users/{registratedUsers}', [DashboardController::class, 'registerUsersList'])->name('dashboard.registerUsersList');
});


// Route::get('/news-and-events', [News::class, 'index'])->name('profile.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
