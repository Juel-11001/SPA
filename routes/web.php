<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return inertia('Index/index');
// });

Route::get('/',  [IndexController::class, 'index']);
Route::get('/show', [IndexController::class, 'show']);