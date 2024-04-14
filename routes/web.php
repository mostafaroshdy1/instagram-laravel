<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EditFormController;
use App\Models\Hashtag;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BlockCheck;
use App\Http\Middleware\EditProfileCheck;
use App\Http\Controllers\HashtagsController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\checkAdminAccess;
use App\Http\Middleware\CheckIsAdmin;
use App\Http\Middleware\CheckPossession;

Auth::routes(['verify' => true]);

Route::get(
    '/',
    function () {
        return view('welcome');
    }
)->middleware(Authenticate::class);

Route::post(
    '/logout',
    function (Request $request) {
        Auth::logout();

        return redirect('/login');
    }
)->name('logout');

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/verify-email', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'verified'])->name('verify-email');


Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    }
);

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect("/posts");
});
Route::get('/dashboard', function () {
    return redirect("/posts");
});

// posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth', 'verified')->middleware(checkAdminAccess::class);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth')->middleware(checkAdminAccess::class);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->middleware('auth')->middleware(checkAdminAccess::class);
Route::get('/posts/saved/{id}', [PostController::class, 'showSaved'])->name('posts.saved.show')->middleware('auth')->middleware(checkAdminAccess::class);
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth')->middleware(checkAdminAccess::class);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth')->middleware(checkAdminAccess::class);
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update')->middleware('auth')->middleware(checkAdminAccess::class);
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth')->middleware(CheckPossession::class)->middleware(checkAdminAccess::class);


// comments
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth')->middleware(checkAdminAccess::class);
Route::get('/posts/{id}/comments', [CommentController::class, 'fetchComments'])->name('posts.comments.fetch')->middleware('auth')->middleware(checkAdminAccess::class);

//delete comment
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth')->middleware(checkAdminAccess::class);

// comment reaction
Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like')->middleware('auth')->middleware(checkAdminAccess::class);
Route::delete('/comments/{comment}/unlike', [CommentController::class, 'like'])->name('comments.unlike')->middleware('auth')->middleware(checkAdminAccess::class);


//likes
Route::patch('/posts/toggleLike/{post}', [PostController::class, 'toggleLike'])->name('posts.toggleLike')->middleware('auth')->middleware(checkAdminAccess::class);


// saved posts
Route::post('/posts/save-post', [PostController::class, 'save'])->name('posts.save-post')->middleware('auth')->middleware(checkAdminAccess::class);

// hashtags
Route::get('/hashtags/{hashtag}', [HashtagsController::class, 'showPosts'])->name('hashtags.showPosts')->middleware('auth')->middleware(checkAdminAccess::class);


// users
Route::post('/users/{id}/followers')->middleware('auth')->middleware(checkAdminAccess::class);
Route::delete('/users/{id}/followers')->middleware('auth')->middleware(checkAdminAccess::class);

Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow')->middleware('auth')->middleware(checkAdminAccess::class);
Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow')->middleware('auth')->middleware(checkAdminAccess::class);
Route::post('/block/{user}', [FollowController::class, 'block'])->name('block')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(BlockCheck::class);
Route::post('/unblock/{user}', [FollowController::class, 'unblock'])->name('unblock')->middleware('auth')->middleware(checkAdminAccess::class);

// user profile

Route::get('/users/{id}/profile', [UserProfileController::class, 'show'])->name('user.profile.show')->where('id', '[0-9]+')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(BlockCheck::class);
Route::get('/users/{id}/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit')->where('id', '[0-9]+')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(EditProfileCheck::class);
Route::post('/users/{id}/edit', [UserProfileController::class, 'store'])->name('user.profile.store')->where('id', '[0-9]+')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(EditProfileCheck::class);
Route::put('/users/{id}/edit', [UserProfileController::class, 'update'])->name('user.profile.update')->where('id', '[0-9]+')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(EditProfileCheck::class);
Route::get('/users/{id}/edit/{formId}', [UserProfileController::class, 'getForm'])->name('user.profile.getForm')->where('id', '[0-9]+')->middleware('auth')->middleware(checkAdminAccess::class)->middleware(EditProfileCheck::class);;
Route::get('/search', [UserProfileController::class, 'search'])->name('search');

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
