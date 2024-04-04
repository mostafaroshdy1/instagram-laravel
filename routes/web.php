<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\UserProfileController;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HashtagsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckIsAdmin;

Auth::routes(['verify' => true]);

Route::get(
    '/',
    function () {
        return view('welcome');
    }
)->middleware(Authenticate::class);

Route::post('/logout', function (Request $request) {
    Auth::logout();

    return redirect('/login');
})->name('logout');

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


// posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


// comments
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/posts/{id}/comments', [CommentController::class, 'fetchComments'])->name('posts.comments.fetch');

// comment reaction
Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');
Route::delete('/comments/{comment}/unlike', [CommentController::class, 'unlike'])->name('comments.unlike');


//likes
Route::patch('/posts/toggleLike/{post}', [PostController::class, 'toggleLike'])->name('posts.toggleLike');


// saved posts
Route::post('/posts/save-post', [PostController::class, 'save'])->name('posts.save-post');

// hashtags
Route::get('/hashtags/{hashtag}', [HashtagsController::class, 'showPosts'])->name('hashtags.showPosts');


// users
Route::post('/users/{id}/followers');
Route::delete('/users/{id}/followers');

Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');
// user profile

Route::get('/users/{id}/profile', [UserProfileController::class, 'show'])->name('user.profile.show');


Route::get(
    '/admin/dashboard',
    [AdminController::class, 'index']
)->middleware(['auth', CheckIsAdmin::class])->name('admin.dashboard');
Route::patch('/admin/{id}', [AdminController::class, 'update'])->middleware(['auth', CheckIsAdmin::class])->name('admin.update.user');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware(['auth', CheckIsAdmin::class])->name('admin.destroy.user');
Route::get('/admin/trashed', [AdminController::class, 'trashed'])->middleware(['auth', CheckIsAdmin::class])->name('admin.trashed');
Route::patch('/admin/restore/{id}', [AdminController::class, 'restore'])->middleware(['auth', CheckIsAdmin::class])->name('admin.restore.user');


Route::fallback(
    function () {
        return "Route not found";
    }
);
