<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //Category index
    $categories = Category::all();
    return view('admin.category.index', compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CategoryFormRequest $request) {
    // Create category
    $cats = Category::all();
    $ary = [];
    foreach ($cats as $cat) {
      array_push($ary, $cat->slug);
    }
    $slug = Str::slug($request->get('name'));
    if (in_array($slug, $ary)) {
      return redirect(route('categories.index'))->with('unique', 'Name should be unique!');
    } else {
      Category::create([
        'name' => $request->get('name'),
        'slug' => $slug,
      ]);
      return redirect(route('categories.index'))->with('success', 'New Category Is Successfully Created!');

    }
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
  public function edit($slug) {
    //edit
    $cat = Category::where('slug', $slug)->firstOrFail();
    return view('admin.category.edit', compact('cat'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $slug) {
   $cat = Category::where('slug',$slug)->firstOrFail();
   $cat->name = $request->get('name');
   $cat->slug = Str::slug($request->get('name'));
   $cat->update();
   return redirect(route('categories.index'))->with('success','Category has been renamed!');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($slug) {
    //
    $cat = Category::where('slug', $slug)->firstOrFail();
    $cat->delete();
    return redirect(route('categories.index'))->with('success', 'Category has been deleted!');
  }
}