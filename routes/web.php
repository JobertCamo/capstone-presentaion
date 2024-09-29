<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('hr.welcome');
});
// Route::get('/application/{job:title}', function () {
//     return view('user.application', ['job' ]);
// });

Route::get('/jobscript', function () {
    return view('user.jobscript');
});
Route::get('/applicant-list', function () {
    return view('julsfolder.applicant-list');
});
Route::get('/candidates', function () {
    return view('julsfolder.candidate-list');
});
Route::get('/questions', function () {
    return view('julsfolder.questions-update');
});
Route::get('/exam', function () {
    return view('julsfolder.initial-exam');
});
Route::get('/setting', function () {
    return view('julsfolder.settings');
});
Route::get('/notifs', function () {
    return view('julsfolder.notifications');
});
Route::get('/employees', function () {
    return view('julsfolder.employee-list');
});


Volt::route('/jobpost', 'guest.job-post');
Volt::route('/application/{job:title}', 'guest.app-form');

Volt::route('main', 'hr.main-layout');
Volt::route('job-create', 'hr.job-create');


Volt::route('/job-result/{tag}', 'guest.job-result')->name('job-result');
