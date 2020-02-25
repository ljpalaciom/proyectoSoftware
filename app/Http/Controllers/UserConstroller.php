<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

  public function create()
  {
    $data = []; //to be sent to the view
    $data["title"] = "Create user";
    $data["users"] = User::all();
    return view('user.create')->with("data",$data);
  }

  public function save(Request $request)
  {
    $request->validate([
      "name" => "required",
      "lastName" => "required",
      "age" => "required|integer|min:0|max:120",
      "email" => "required|email|unique:user",
      "password" => "required",
    ]);
    User::create($request->only(["name","lastName","age","email","password"]));
    return back()->with('success','Elemento creado satisfactoriamente');
  }

  public function show($id)
  {
    $data = [];
    $user = User::findOrFail($id);
    $data["title"] = $user->getName();
    $data["user"] = $user;
    return view('user.show')->with("data",$data);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = "Users List";
    $data["users"] = User::all();
    //$data["users"] = User::orderBy('id')->get();
    return view('user.list')->with("data",$data);
  }

  public function listByName()
  {
    $data = []; //to be sent to the view
    $data["title"] = "Users List";
    $data["users"] = User::orderBy('name')->get();
    return view('user.list')->with("data",$data);
  }

  public function delete($id){
    User::where('id', $id)->delete();
    return redirect('user/list');
  }
  
}
