<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleFormRequest;
class RoleController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
    $roles = Role::all();
    return view('admin.role.index',compact('roles'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //Role create
  
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(RoleFormRequest $request) {
    // Store New Role
    
    Role::create([
      'name'=>$request->get('name')
      ]);
    return redirect(route('roles.index'))->with('success','New Role Have Been Created!');
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
  //  Role edit
    $role = Role::whereId($id)->firstOrFail();
    return view('admin.role.edit',compact('role'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(RoleFormRequest $request, $id) {
    //
    $role = Role::whereId($id)->firstOrFail();
    $role->name = $request->get('name');
    $role->update();
    return redirect(route('roles.index'))->with('success','Renamed Successfully');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
   $role = Role::whereId($id)->firstOrFail();
   $role->delete();
    return redirect(route('roles.index'))->with('success','Successfully Deleted!');
  }
}