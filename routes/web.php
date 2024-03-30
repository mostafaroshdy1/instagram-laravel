<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

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
//likes
Route::patch('/posts/toggleLike/{post}', [PostController::class, 'toggleLike'])->name('posts.toggleLike');
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

Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
// user profile
Route::get('/users/{id}/profile', [UserProfileController::class, 'show'])->name('user.profile.show');



Route::fallback(function () {
    return "Route not found";
});
