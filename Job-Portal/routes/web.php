<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees\AuthController;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Employees\JobController;
use App\Http\Controllers\Employees\JobApplicationController;
use App\Http\Controllers\Employers\EmployerAuthController;
use App\Http\Controllers\Employers\PostJobController;
use App\Http\Controllers\Employers\EmployerController;
use App\Http\Controllers\Employers\EditJobController;
use App\Http\Controllers\Employers\AppliedJobController;



/* =============
     Employees
   ============= */

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('employee')->group(function () {

    // Employee/Authentication
    Route::get('/login', [AuthController::class, 'showSignIn'])->name('login');
    Route::post('/login', [AuthController::class, 'signInUser'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showSignUp'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/delete', [AuthController::class, 'userDelete'])->name('user.delete');

    // Employee/UserAccount
    Route::middleware('auth:web')->group(function () {
        Route::get('/profile', [EmployeeController::class, 'showEmployeeData'])->name('user-account');
        Route::post('/jobs/{id}/apply', [JobApplicationController::class, 'apply'])->name('job.apply');
        Route::post('/jobs/{id}/save', [JobApplicationController::class, 'save'])->name('job.save');
        Route::delete('/job/{id}/unsave', [JobApplicationController::class, 'unsave'])->name('job.unsave');
    });

    // Update Routes
    Route::prefix('update')->group(function () {
        Route::put('/logo', [EmployeeController::class, 'uploadProfileImg'])->name('employee.logo');
        Route::put('/update-profile', [EmployeeController::class, 'updateProfileDetails'])->name('employee.update-profile');
    });

    // Employee/jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
    Route::get('/job/{id}', [JobController::class, 'show'])->name('job.show');
    Route::get('/job/{for}/{id}', [JobController::class, 'showSavedApplied'])->name('job.show.saved-applied');
    Route::get('/job-detail/{id}', [JobController::class, 'showForMd']);

    // Employee/companies
    Route::view('/companies', 'employees.companies')->name('companies');

    // Reset Password
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
});

/* =============
     Employers
   ============= */

Route::prefix('employer')->group(function () {

    // Employer/Authentication
    Route::get('/login', [EmployerAuthController::class, 'showSignIn'])->name('employer.login');
    Route::post('/login', [EmployerAuthController::class, 'signInEmployer'])->name('employer.login.process');
    Route::get('/register', [EmployerAuthController::class, 'showSignUp'])->name('employer.register');
    Route::post('/register', [EmployerAuthController::class, 'store'])->name('employer.register.store');
    Route::post('/logout', [EmployerAuthController::class, 'employerLogout'])->name('employer.logout');
    Route::delete('/delete', [EmployerAuthController::class, 'employerDelete'])->name('employer.delete');

    // Employers-dashboard
    Route::get('/dashboard', function () {
        return view('employers.index');
    })->name('employer.dashboard');

    // Employer Auth
    Route::middleware('auth.employer')->group(function () {

        // company page
        Route::get('/account', [EmployerController::class, 'showEmployerData'])->name('employer.account');

        // Post/Edit/Delete job
        Route::post('/post-job', [PostJobController::class, 'postJob'])->name('job.post');
        Route::put('/edit-job', [EditJobController::class, 'editJob'])->name('job.edit');
        Route::delete('/delete-job/{id}', [EditJobController::class, 'deleteJob'])->name('job.delete');

        // Update Routes
        Route::prefix('update')->group(function () {
            Route::put('/cover-image', [EmployerController::class, 'uploadCover'])->name('employer.cover-image');
            Route::put('/logo', [EmployerController::class, 'uploadLogo'])->name('employer.logo');
            Route::put('/update-profile', [EmployerController::class, 'updateProfile'])->name('employer.update-profile');
        });

        // Show Applied User
        Route::get('/{jobId}/applications', [AppliedJobController::class, 'showAppliedUsers'])->name('employer.applications');
    });

    // Reset Password
    Route::post('/reset', [EmployerAuthController::class, 'employerPassReset'])->name('employer.reset.pass');
});
