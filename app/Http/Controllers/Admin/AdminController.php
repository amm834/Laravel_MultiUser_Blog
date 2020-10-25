<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
class AdminController extends Controller
{
  function __invoke() {
    $users = User::all();
    $cats = Category::all();
    $posts = Post::all();
    return view('admin.home',compact('users','cats','posts'));
  }
}