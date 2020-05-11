<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Routine;
use App\Training;
use App\Exercise;
use App\Interfaces\VideoStorage;
use Auth;
class routineController extends Controller
{

  public function create($trainingId)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('routine.createTitle');
    $data["training_id"] = $trainingId;
    $data["exercises"] = Exercise::all();
    return view('routine.create')->with("data", $data);
  }

  public function listTrainer($trainingId)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('routine.listTitle');
    Training::findOrFail($trainingId);
    $data["training_id"] = $trainingId;
    $data["routines"] = Routine::join('exercises', 'exercises.id', '=', 'routines.exercise_id')
    ->select('routines.*', 'exercises.name')
    ->where('training_id', $trainingId)->get();
    return view('routine.list')->with("data", $data);
  }

  public function retrieve($id)
  {
    $data = []; //to be sent to the views
    $routine = Routine::join('exercises', 'exercises.id', '=', 'routines.exercise_id')
    ->select('routines.*',
    'exercises.name',
    'exercises.description',
    'exercises.recommendations',
    'exercises.path_video',
    'exercises.path_image'
    )
    ->where('routines.id', $id)->first();
    $data["title"] =  __('routine.retrieveTitle');
    $data["routine"] = $routine;
    return view('routine.retrieve')->with("data", $data);
  }

  public function listUser($trainingId)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('routine.listTitle');
    Training::findOrFail($trainingId);
    $data["training_id"] = $trainingId;
    $data["routines"] = Routine::join('exercises', 'exercises.id', '=', 'routines.exercise_id')
    ->select('routines.*', 'exercises.name')
    ->where('training_id', $trainingId)->get();
    return view('routine.user.list')->with("data", $data);
  }

  public function update($id){
    $data = []; //to be sent to the view
    $routine = Routine::findOrFail($id);
    $data["routine"] = $routine;
    $data["title"] =  __('routine.update');
    return view('routine.update')->with("data",$data);
  }

  public function saveUpdate(Request $request){
    Routine::validate($request);
    Routine::where('id', $request->input("id"))
    ->update($request->only(['exercise_id', 'repetitions', 'sequences', 'seconds_to_rest']));
    return back()->with('success',  __('routine.routineUpdated'));
  }

  public function delete($id)
  {
    Routine::destroy($id);
    return back();
  }
  public function save(Request $request)
  {
    Routine::validate($request);
    $trainingId = $request->input('training_id');
    $fields = $request->only(['exercise_id', 'training_id', 'repetitions', 'sequences','seconds_to_rest']);
    $routine = Routine::create($fields);
    return redirect("trainer/routine/list/".$trainingId);
  }

}
