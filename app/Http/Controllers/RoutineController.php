<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Routine;
use App\Interfaces\VideoStorage;
class routineController extends Controller
{

  public function create($training_id)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('routine.createTitle');
    $data["exercises"] = Exercise::all();
    return view('routine.create')->with("data", $data);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('routine.listTitle');
    $data["routines"] = Routine::with('user', 'exercise')->get();
    return view('routine.list')->with("data", $data);
  }

  public function sort($order){
    $data = []; // to be sent to the view
    $data["title"] =  __('routine.listTitle');
    $data["records"] = Routine::with('user', 'exercise')->orderBy($order)->get();
    return view('routine.list')->with("data",$data);
  }

  public function delete($id)
  {
    Routine::destroy($id);
    return redirect('routine/list');
  }

  public function save(Request $request)
  {
    Routine::validate($request);
    $user = Auth::user();
    $exercise = Exercise::findOrFail($request->input('exercise_id'));
    $fields = $request->only(['exercise_id', 'routine']);
    $fields['user_id'] = $user->getId();
    $routine = Routine::create($fields);
    return back()->with('success', __('routine.routineCreated'));
  }
}
