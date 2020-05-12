<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Training;
use App\Record;
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
      $records = Record::where('user_id', $user->getId())->orderBy('created_at')->get();
      $data['trainings'] = $trainings;
      $data['records'] = $records;
      return view('user.showTrainer')->with(['data'=> $data]);
    }

  }

  public function swipeView($type){
    if($type==1){
      return back()->with('type',1);
    }else{
      return back()->with('type',2);
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

    $users = User::where('name','like','%'.$request["name"].'%')->where('role',"=",'1')->get();
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

  public function update($id){
    $data = []; //to be sent to the view
    $user = User::findOrFail($id);
    $data["user"] = $user;
    $data["title"] =  __('exercise.update');
    return view('user.update')->with("data",$data);
  }

  public function saveUpdate(Request $request){
    User::validate($request, ['name','last_name','age','email','role']);
    User::where('id', $request->input("id"))
            ->update($request->only(['name','last_name','age','email','role']));
    return back()->with('success',  __('user.userUpdated'));
  }

  public function delete($id){
    User::destroy($id);
    // if($role == 2){
    //   return redirect('admin/user/listTrainers');
    // }
    return redirect('/admin/user/usersList');
  }

}
