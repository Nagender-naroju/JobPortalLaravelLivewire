<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/jobs-list', [UserController::class, 'jobs_list']);
    Route::get('/profile', [UserController::class, 'my_profile']);
    Route::get('/my-jobs', [UserController::class, 'my_jobs']);
    Route::get('/view-applicants', [UserController::class, 'view_applicants']);
    Route::get('/change-status', [UserController::class, 'changeApplicationStatus']);
    Route::get('/applied-jobs', [UserController::class, 'jobsApplied']);
    Route::get('/saved-jobs', [UserController::class, 'savedJobs']);

});
Route::get('/home-screen', [UserController::class, 'home_screen']);
Route::post('/job-details', [UserController::class, 'view_job']);


// 3|FnLtOGK1kLMMqwtXFqccZacqUoOgSVp0sf9UtW7cf9fdac44


// 5|YXV4DRb2a2nZpPpUGbQ2vd3uKhPvTYypByeA1etPb8c711db  user
// 4|F3BihPQsHz70omtXi6p97s6lHV3QXeDAw8aaPFU3c1efd0d3   user 4