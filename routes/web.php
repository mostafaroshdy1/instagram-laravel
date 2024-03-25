<?php

use App\Http\Controllers\ProfileController;
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

Route::fallback(function () {
    return "Route not found";
});
