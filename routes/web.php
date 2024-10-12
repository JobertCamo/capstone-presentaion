<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/application/{job:title}', function () {
//     return view('user.application', ['job' ]);
// });

Route::view('/test', 'user.test-login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
});

Volt::route('/application/{job}', 'guest.app-form');

Volt::route('main', 'hr.main-layout');
Volt::route('job-create', 'hr.job-create');


Volt::route('/job-result/{tag}', 'guest.job-result')->name('job-result');

Route::middleware('auth')->group(function() {
    // Route::view('/dashboard', 'hr.welcome');
    Volt::route('job-create', 'hr.job-create');
    Volt::route('/profile/{applicant:first_name}', 'hr.applicant-profile');
    
    // Need to FIX THIS!
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
