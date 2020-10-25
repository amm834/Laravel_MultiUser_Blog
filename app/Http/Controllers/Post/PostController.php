<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
    $posts = Post::all();
    return view('admin.post.index', compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
    $categories = Category::all();
    return view('admin.post.create', compact('categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PostFormRequest $request) {
    $user = Auth::user()->id;
    $file = $request->file('img');
    // Image Name
    $img = uniqid().'_'.$file->getClientOriginalName();
    $file->move(public_path().'/imgs/', $img);
    Post::create([
      'user_id' => $user,
      'img' => $img,
      'category_id' => $request->get('category_id'),
      'content' => $request->get('content')
    ]);
    return redirect(route('posts.index'))->with('success', 'Posted Successfully!');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    //
    $categories = Category::all();
    $post = Post::whereId($id)->firstOrFail();
    return view('admin.post.edit', compact('categories', 'post'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {

    $post = Post::whereId($id)->firstOrFail();
    // Check file exist or not
    if ($request->hasFile('img')) {
      $file = $request->file('img');
      $fileName = uniqid().'_'.$file->getClientOriginalName();
      $file->move(public_path().'/imgs/', $fileName);
    } else {
      // Old File
      $fileName = $post->img;
    }
    $post->content = $request->get('content');
    $post->category_id = $request->get('category_id');
    $post->img = $fileName;
    $post->update();
    return redirect(route('posts.index'))->with('success', 'Post edited successfully!');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    $post  = Post::whereId($id)->firstOrFail();
    $post->delete();
    return redirect(route('posts.index'))->with('success','Post has been deleted!');
  }
}