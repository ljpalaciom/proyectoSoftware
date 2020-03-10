<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Training;
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
    if(Auth::user()->getRole() == 3){
      return view('user.showAdmin')->with('data', $data);
    }else{
      $trainings = Training::where('user_id', $user->getId())->orderBy('day')->get();
      $data['trainings'] = $trainings;
      return view('user.showTrainer')->with('data', $data);
    }

  }

  public function listUsers()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::where('role', 1)->get();
    if(Auth::user()->getRole() == 3){
      return view('user.listUsersAdmin')->with('data', $data);
    }
    return view('user.listUsersTrainer')->with('data', $data);
  }

  public function listTrainers()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.trainersList');
    $data['users'] = User::where('role', 2)->get();
    return view('user.listTrainersAdmin')->with('data', $data);
  }

  public function searchByName()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    return view('user.search')->with('data', $data);
  }

  public function search(Request $request)
  {

    $users = User::where('name','like','%'.$request["name"].'%')->get();
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = $users;
    return view('user.search')->with('data', $data);
  }


  public function listByName()
  {
    $data = []; //to be sent to the view
    $data['title'] = __('user.list');
    $data['users'] = User::where('role', 1)->orderBy('name')->get();
    return view('user.listUsersAdmin')->with('data', $data);
  }

  public function delete($id){
    User::destroy($id);
    // if($role == 2){
    //   return redirect('admin/user/listTrainers');
    // }
    return redirect('/admin/user/usersList');
  }

}
