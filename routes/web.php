<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/index');
// });

Route::get('/',  [IndexController::class, 'index'])->name('home');
Route::get('/show', [IndexController::class, 'show'])->name('show');

/** listing routes */
Route::resource('listing', ListingController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::resource('listing', ListingController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

/** auth routes */
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
    Route::delete('/logout', 'destroy')->name('logout.destroy');
});
