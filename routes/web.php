<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return inertia('Index/index');
// });

Route::get('/',  [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);

/** listing routes */
Route::resource('listing', ListingController::class);
