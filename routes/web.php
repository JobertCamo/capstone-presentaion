<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


// Route::get('/application/{job:title}', function () {
//     return view('user.application', ['job' ]);
// });

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::view('/test', 'user.test-login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});

Volt::route('/application/{job}', 'guest.app-form');

Volt::route('main', 'hr.main-layout');
// Volt::route('job-create', 'hr.job-create');


Volt::route('/job-result/{tag}', 'guest.job-result')->name('job-result');

Route::middleware('auth')->group(function() {
    // Route::view('/dashboard', 'hr.welcome');
    
    // =============================================
    // 1st create-job
    // =============================================
    // Volt::route('/job-create', 'hr.job-create');
    // =============================================
    // end 1st create-job
    // =============================================

    Volt::route('/profile/{applicant}', 'hr.applicant-profile');
    Volt::route('/create-job', 'hr.create-job');
    Volt::route('/edit-job/{job}', 'hr.job-edit');

    // 
    // Need to FIX THIS
    Volt::route('/candidate-list', 'hr.candidate-list');
    Volt::route('/applicants', 'hr.all-applicants');
    Route::view('/employees', 'julsfolder.employee-list');
    Route::view('/questions', 'julsfolder.questions-update');
    Route::view('/exam', 'julsfolder.initial-exam');
    Route::view('/setting', 'julsfolder.settings');
    Route::view('/notifs', 'julsfolder.notifications');
});

Volt::route('/jobpost', 'guest.job-post');
Route::middleware('guest')->group(function() {
    Route::view('/registration', 'user.applicant-register');
    Route::view('/', 'user.login')->name('login');
});

// ================================================================
    // WORK IN PROGRESS
// ================================================================
    Route::view('/employee-dashboard', 'julsfolder.employee-dashboard');
    Route::view('/update-profile', 'julsfolder.update-profile');
    Route::view('/schedules', 'julsfolder.resignation');
    Route::view('/tasks', 'julsfolder.submit-task');
    Route::view('/offboarding', 'julsfolder.offboarding');
    Route::view('/employee-task', 'julsfolder.hr-portal');
    Route::view('/hr-task', 'julsfolder.hr-task');
// ================================================================
    // END WORK IN PROGRESS
// ================================================================