<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\CommentController;

/* Auth Routes  !important */

Auth::routes();
Route::get('logout', function () {
  return redirect('/');
});

/* Public Route */

Route::get('/', [PostController::class, 'index']);
Route::get('show/{id}', [PostController::class, 'show'])->name('public.show');
Route::post('show/{id}', [CommentController::class, 'store'])->name('public.store');

/* Category Route (Post) */

Route::get('user/posts/{id}', 'user\CategoryController@index');

/* Admin Panel Route */

Route::group([
  'prefix' => 'admin',
  'namespace' => 'admin',
  'middleware' => 'manager'
], function () {

  Route::get('home','AdminController');

  Route::resource('users', 'UserController');
  Route::resource('roles', 'RoleController');
  Route::resource('categories', 'CategoryController');
});

/* Post Panel Route */

Route::group([
  'prefix' => 'admin',
  'namespace' => 'post',
  'middleware' => 'manager'
], function () {

  Route::resource('posts', 'PostController');
  Route::get('posts/{id}/delete', 'PostController@destroy');
});

/* User Reaction||Voting Route */

Route::get('user/{id}/vote', 'User\VoteController@like');