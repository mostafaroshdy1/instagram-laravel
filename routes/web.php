<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => true]);

Route::get(
    '/',
    function () {
        // return view('auth.login');
        // return view('landingPage.login');
        // If user is register return the welcome view unitl TODO: the home page
        return view('welcome');
    }
)->middleware(Authenticate::class);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);

require __DIR__ . '/auth.php';

/*
// posts
Route::get('/posts');
Route::get('/posts/create');
Route::get('/posts/{id}');
Route::get('/posts/{id}/edit');
Route::post('/posts');
Route::put('/posts/{id}');
Route::delete('/posts/{id}');

// comments
Route::get('/posts/{id}/comments'); // show all comments for specific post
Route::post('/posts/{id}/comments'); // adds comment to post
Route::delete('/posts/{id}/comments/{id}'); // delete a comment

// comments reactions
Route::get('/posts/{id}/comments/{id}/likes');
Route::post('/posts/{id}/comments/{id}/likes'); // modify the number of likes to a specific comment (one to many relationship with users)
Route::delete('/posts/{id}/comments/{id}/likes'); // modify the number of likes to a specific comment (one to many relationship with users)

// users
Route::post('/users/{id}/followers'); // create followers table needed
Route::delete('/users/{id}/followers');
*/

Route::post('/follow/{user}', [FollowController::class,'follow'])->name('follow');
Route::post('/unfollow/{user}', [FollowController::class,'unfollow'])->name('unfollow');
// user profile
Route::get('/users/{id}/profile',[UserProfileController::class,'show'])->name('user.profile.show');

Route::fallback(
    function () {
        return "Route not found";
    }
);
