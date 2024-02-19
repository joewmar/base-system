<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmInfoController;
use App\Http\Livewire\FarmInformation\FarmCreate;
use App\Http\Livewire\FarmInformation\FarmEdit;
use App\Http\Livewire\FarmInformation\FarmHome;
use App\Http\Livewire\FarmInformation\FarmLocationCreate;
use App\Http\Livewire\FarmInformation\FarmLocationEdit;
use App\Http\Livewire\FarmInformation\FarmLocationHome;
use App\Utilities\GenericUtilities as GU;
use App\Services\GenericServices as GS;

// Fixed Route for all new application that will use Auth
Route::get('/app-login/{id}', [AuthenticationController::class, 'app_login'])->name('app.login');
// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
// Auth Middleware Group
// Route::middleware('auth')->group(function() {
	// Main Session Check for Authetication
	Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
	// Dash/Dashboard
	Route::get('/', [DashboardController::class, 'dash'])->name('dash');
	/**
	 * YOUR CODE STARTS HERE
	 * DO NOT ALTER ABOVE CODE
	 */
	Route::prefix('/farm-information')->name('farm.information.')->group(function(){
		Route::get('/', [FarmInfoController::class, 'index'])->name('home');
		Route::get('/farm', FarmHome::class)->name('farm');
		Route::get('/farm/create', FarmCreate::class)->name('farm.create');
		Route::get('/location', FarmLocationHome::class)->name('location');
		Route::get('/location/create', FarmLocationCreate::class)->name('location.create');

		Route::get('/farm/{id}/edit', FarmEdit::class)->name('farm.edit');
		Route::get('/farm/location/{id}/edit', FarmLocationEdit::class)->name('location.edit');
	});

// });

Route::get('/gs', function () {
	return GS::service1();
});
