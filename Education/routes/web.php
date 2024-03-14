<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendcontroller;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\registrationform;
use App\Http\Controllers\usermanagement_controller;
use App\Http\Controllers\counselorcontroller;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;


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


Auth::routes();

Route::get('home', [frontendcontroller::class, 'index'])->name('home');
route::middleware(['auth','isAdmin'])->group(function(){
Route::get('/',[admincontroller::class, 'index']);

    Route::get('index', [admincontroller::class, 'index'])->name('index');

    // registration section routes in admin panal
    Route::get('listing_counselor', [registrationform::class, 'counselor'])->name('listing_counselor');
    Route::get('country', [registrationform::class, 'countries'])->name('country');
    Route::get('agents', [registrationform::class, 'agent'])->name('agents');
    Route::get('reference', [registrationform::class, 'references'])->name('reference');
    Route::get('sessions', [registrationform::class, 'session'])->name('sessions');
    Route::get('subagent', [registrationform::class, 'subagents'])->name('subagent');
    Route::get('university', [registrationform::class, 'universities'])->name('university');
    Route::get('bookingleave_date', [registrationform::class, 'booking_leave_date'])->name('bookingleave_date');
    Route::get('students_management', [registrationform::class, 'student_management'])->name('students_management');



// user management
Route::get('user_page', [usermanagement_controller::class, 'index'])->name('user_page');



// counselor
Route::get('counselor', [counselorcontroller::class, 'index'])->name('counselor');

// permissions
Route::get('permissions', [PermissionController::class, 'index'])->name('permissions');

// user roles
Route::get('roles', [RoleController::class, 'index'])->name('roles');


// main search redirect route
Route::get('studentlists/{mainsearch?}', [admincontroller::class, 'mainsearch'])->name('studentlists');



});

// Route::get('/', [frontendcontroller::class, 'index']);
Route::post('registration_form', [frontendcontroller::class, 'registration_store'])->name('registration_form');
Route::get('updateselecttiming', [frontendcontroller::class, 'updatetime'])->name('updateselecttiming');
