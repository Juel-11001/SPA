<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/index');
// });

Route::get('/',  [IndexController::class, 'index'])->name('home');
Route::get('/show', [IndexController::class, 'show'])->name('show');

/** listing routes */
Route::resource('listing', ListingController::class)->only(['index', 'show']);

// Route::resource('listing', ListingController::class)->except(['create', 'store', 'edit', 'update',]);

/** auth routes */
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::delete('/logout', 'destroy')->name('logout.destroy')->middleware('auth');
});

/** registered route */
Route::controller(RegisteredUserController::class)->group(function(){
   Route::get('/register', 'index')->name('register');
   Route::post('/register', 'store')->name('register.store');
});

/** user profile routes */
Route::put('listing-profile/{listing_profile}/restore', [UserProfileController::class, 'restore'])->name('listing-profile.restore')->middleware('auth')->withTrashed();
Route::resource('listing-profile', UserProfileController::class)->withTrashed()->middleware(['auth', 'verified']);