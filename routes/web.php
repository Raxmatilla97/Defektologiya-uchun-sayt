<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\VideoDarslarController;
use App\Http\Controllers\CourseController;
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
Route::post('ckeditor/upload2', [CkeditorController::class, 'upload2'])->name('ckeditor.upload2');


Route::prefix('dashboard')->middleware('auth')->group(function () {  

    Route::middleware(['admin'])->group(function () {
      
        Route::get('/index/{kurslar?}', [DashboardController::class, 'kurslarDashboardList'])->name('dashboard.kurslarDashboardList');
        Route::get('/search', [CourseController::class, 'kurslarSearch'])->name('dashboard.kurslarSearch');
        Route::get('/users/{registratedUsers}', [DashboardController::class, 'registerUsersList'])->name('dashboard.registerUsersList');
        Route::delete('/user-delete/{id?}', [DashboardController::class, 'userDestroy'])->name('dashboard.userDestroy'); 

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

        Route::get('/seminars', [SeminarController::class, 'seminarsIndex'])->name('dashboard.seminarsIndex');
        Route::delete('/seminar-delete/{id?}', [SeminarController::class, 'seminarDestroy'])->name('dashboard.seminarDestroy'); 
        Route::get('/seminar-search', [SeminarController::class, 'seminarSearch'])->name('dashboard.seminarSearch');
        Route::get('/seminar-create', [SeminarController::class, 'seminarCreate'])->name('dashboard.seminarCreate');
        Route::post('/seminar-store', [SeminarController::class, 'seminarStore'])->name('dashboard.seminarStore'); 
        Route::get('/seminar-edit/{slug?}', [SeminarController::class, 'seminarEdit'])->name('dashboard.seminarEdit');
        Route::post('/seminar-update', [SeminarController::class, 'seminarUpdate'])->name('dashboard.seminarUpdate'); 

        Route::get('/specialist-create/{id?}', [SpecialistController::class, 'specialistCreate'])->name('dashboard.specialistCreate');            
        Route::get('/specialist-edit/{id?}', [SpecialistController::class, 'specialistEdit'])->name('dashboard.specialistEdit');            
        Route::get('/user-edit/{id}', [SpecialistController::class, 'userEdit'])->name('dashboard.userEdit');    
        Route::post('/specialist-update', [SpecialistController::class, 'specialistUpdate'])->name('dashboard.specialistUpdate');
        Route::get('/specialist-search', [SpecialistController::class, 'specialistSearch'])->name('dashboard.specialistSearch');
        Route::get('/test', [DashboardController::class, 'testIndex'])->name('dashboard.testIndex');


    });
  
    Route::middleware(['universal:admin,teacher'])->group(function () {
        Route::post('/specialist-store', [SpecialistController::class, 'specialistStore'])->name('dashboard.specialistStore');

        Route::delete('/delete-kurslar/{id?}', [CourseController::class, 'kurslarDeleteDashboard'])->name('dashboard.kurslarDeleteDashboard');
        Route::get('/create-courses', [CourseController::class, 'createCourses'])->name('dashboard.createCourses');
        Route::post('/store-courses', [CourseController::class, 'coursesStore'])->name('dashboard.coursesStore'); 
        Route::get('/my-created-courses/{request?}', [CourseController::class, 'myCreatedCourses'])->name('dashboard.myCreatedCourses');     
        Route::get('/edit-course/{slug}', [CourseController::class, 'editCourse'])->name('dashboard.editCourse');
        Route::post('/edit-course-Store', [CourseController::class, 'coursesStoreEdit'])->name('dashboard.coursesStoreEdit'); 
        Route::get('/add-video-darslar/{slug?}', [VideoDarslarController::class, 'addVideoDarslar'])->name('dashboard.addVideoDarslar'); 
        Route::post('/add-video-darslar-store', [VideoDarslarController::class, 'addVideoDarslarStore'])->name('dashboard.addVideoDarslarStore'); 
        Route::post('/edit-video-darslar', [VideoDarslarController::class, 'editVideoDarslar'])->name('dashboard.editVideoDarslar'); 
    });

    Route::middleware(['universal:admin,student'])->group(function () {
        Route::get('/my-courses/{request?}', [CourseController::class, 'myCourses'])->name('dashboard.myCourses');
    });
  
   
});


// Route::get('/news-and-events', [News::class, 'index'])->name('profile.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
