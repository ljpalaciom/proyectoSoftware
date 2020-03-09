<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function create()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.createUser');
    return view('user.createAdmin')->with('data', $data);
  }

  public function save(Request $request)
  {
    User::validate($request);
    $request['password'] = Hash::make($request->input('password'));
    User::create($request->only(['name', 'last_name', 'age', 'email', 'password', 'role']));
    return back()->with('success', __('user.userCreated'));
  }

  public function show($id)
  {
    $data = [];
    $user = User::findOrFail($id);
    $data['title'] = $user->getName();
    $data['user'] = $user;
    return view('user.showAdmin')->with('data', $data);
  }

  public function listUsers()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::where('role', 1)->get();
    if(Auth::user()->getRole() == 3){
      return view('user.listUsersAdmin')->with('data', $data);
    }
  }

  public function listTrainers()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.trainersList');
    $data['users'] = User::where('role', 2)->get();
    return view('user.listTrainersAdmin')->with('data', $data);
  }

  public function listByName()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::where('role', 1)->orderBy('name')->get();
    return view('user.listUsersAdmin')->with('data', $data);
  }

  public function delete($id, $role){
    User::destroy($id);
    if($role == 2){
      return redirect('admin/user/listTrainers');
    }
    return redirect('admin/user/listUsers');
  }

}
