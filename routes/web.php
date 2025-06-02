<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationMarkReadController;
use App\Http\Controllers\OfferListingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return inertia('Index/index');
// });

Route::get('/',  [IndexController::class, 'index'])->name('home');
Route::get('/show', [IndexController::class, 'show'])->name('show');

/** listing routes */
Route::resource('listing', ListingController::class)->only(['index', 'show']);

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

Route::middleware(['auth', 'web', 'verified'])->group(function (){
    Route::put('listing-profile/{listing_profile}/restore', [UserProfileController::class, 'restore'])->name('listing-profile.restore')->withTrashed();
    /** user profile  routes */
    Route::resource('listing-profile', UserProfileController::class)->withTrashed();
    /** listing images */
    Route::resource('listing.image', ListingImageController::class)->only(['create', 'store', 'destroy']);

    /** listing offer routes  */
    Route::put('listing/{offer}/accept', OfferListingController::class)->name('listing.offer.accept');

    /** notification routes */
    Route::resource('notification', NotificationController::class)->only(['index']);
    /** notification read as mark */
    Route::put('notification/{notification}/read', NotificationMarkReadController::class)->name('notification.read');
});

/** listing offer */
Route::resource('listing.offer', ListingOfferController::class)->only(['store'])->middleware('auth');

/** user must be verify */
Route::get('email/verify', function (){
    return inertia('auth/verifyEmail');
})->middleware('auth')->name('verification.notice');
/** email verified */
Route::get('verify/email/{id}/{hash}', function (EmailVerificationRequest $request){
    $request->fulfill();
    return redirect()->route('listing.index')->with('success', 'Email was verified!');
})->middleware(['auth', 'signed'])->name('verification.verify');

/** resent verification link */
Route::post('/email/verification-notification', function (Request $request) {

    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');

})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
