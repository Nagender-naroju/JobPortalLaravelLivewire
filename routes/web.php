<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Frontend\Home::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/account-settings', App\Livewire\Frontend\AccountSettings::class)->name('account.settings');
Route::get('/job-post', App\Livewire\Frontend\PostJob::class)->name('job.post');
Route::get('/my-jobs', App\Livewire\Frontend\JobList::class)->name('my.jobs');
Route::get('/saved-jobs', App\Livewire\Frontend\SavedJobs::class)->name('saved.jobs');
Route::get('/find-jobs', App\Livewire\Frontend\JobsListing::class)->name('find.jobs');
Route::get('/job-applications',App\Livewire\Frontend\JobApplications::class)->name('job.applications');
require __DIR__.'/auth.php';
