<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/jobs', 'pages.jobs')->name('jobs');
Route::view('/companies', 'pages.companies')->name('companies');
Route::view('/sign-in', 'pages.signin')->name('signin');
Route::view('/sign-up', 'pages.signup')->name('signup');
Route::view('/hire', 'pages.employers')->name('hire');
Route::view('/job', 'pages.job_details_mobile')->name('job-sm');
Route::view('/user', 'pages.user_account')->name('user-account');
