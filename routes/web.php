<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BlockCheck;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

/*
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

Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow')->middleware('auth');
Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow')->middleware('auth');
Route::post('/block/{user}', [FollowController::class, 'block'])->name('block')->middleware('auth')->middleware(BlockCheck::class);
Route::post('/unblock/{user}', [FollowController::class, 'unblock'])->name('unblock')->middleware('auth');

// user profile
Route::get('/users/{id}/profile', [UserProfileController::class, 'show'])->name('user.profile.show')->where('id', '[0-9]+')->middleware('auth')->middleware(BlockCheck::class);
Route::get('/users/{id}/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit')->where('id', '[0-9]+')->middleware('auth');
Route::post('/users/{id}/edit', [UserProfileController::class, 'store'])->name('user.profile.store')->where('id', '[0-9]+')->middleware('auth');
Route::put('/users/{id}/edit', [UserProfileController::class, 'update'])->name('user.profile.update')->where('id', '[0-9]+')->middleware('auth');


Route::fallback(function () {
    return "Route not found";
});
