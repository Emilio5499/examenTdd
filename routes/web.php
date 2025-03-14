<?php

use App\Http\Controllers\PageCourseDetailsController;
use App\Http\Controllers\PageDashboardController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageVideosController;
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

Route::get('/', PageHomeController::class)->name('pages.home');

Route::get('courses/{course:slug}', PageCourseDetailsController::class)
    ->name('pages.course-details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', PageDashboardController::class)->name('pages.dashboard');
    Route::get('/Admin-dashboard', PageDashboardController::class)->name('pages.Admin-dashboard');
    Route::get('videos/{course:slug}/{video:slug?}', PageVideosController::class)
        ->name('pages.course-videos');
});

Route::webhooks('webhooks');
