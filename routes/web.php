<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\News;
use App\Http\Controllers\IndexController;

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/news-and-events', [News::class, 'index'])->name('profile.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
