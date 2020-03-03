<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

  public function create()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.createUser');
    return view('user.create')->with('data', $data);
  }

  public function save(Request $request)
  {
    User::validate($request);
    User::create($request->only(['name', 'lastName', 'age', 'email', 'password']));
    return back()->with('success', __('user.userCreated'));
  }

  public function show($id)
  {
    $data = [];
    $user = User::findOrFail($id);
    $data['title'] = $user->getName();
    $data['user'] = $user;
    return view('user.show')->with('data', $data);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::all();
    return view('user.list')->with('data', $data);
  }

  public function listByName()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::orderBy('name')->get();
    return view('user.list')->with('data', $data);
  }

  public function delete($id){
    User::destroy($id);
    return redirect('user/list');
  }

}
