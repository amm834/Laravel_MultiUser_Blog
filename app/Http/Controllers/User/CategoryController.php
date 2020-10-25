<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class CategoryController extends Controller
{
    function index($id){
  $posts = Post::where('category_id',$id)->latest()->paginate(10);
  $cats = Category::all();
      return view('user.categories',compact('posts','cats'));
    }
}
