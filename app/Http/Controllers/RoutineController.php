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
    $data["routines"] = Routine::join('Exercises', 'Exercises.id', '=', 'Routines.exercise_id')
    ->select('Routines.*', 'Exercises.name')
    ->where('training_id', $trainingId)->get();
    return view('routine.list')->with("data", $data);
  }

  public function retrieve($id)
  {
    $data = []; //to be sent to the views
    $routine = Routine::join('Exercises', 'Exercises.id', '=', 'Routines.exercise_id')
    ->select('Routines.*',
    'Exercises.name',
    'Exercises.description',
    'Exercises.recommendations',
    'Exercises.path_video')
    ->where('Routines.id', $id)->first();
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
    $data["routines"] = Routine::join('Exercises', 'Exercises.id', '=', 'Routines.exercise_id')
    ->select('Routines.*', 'Exercises.name')
    ->where('training_id', $trainingId)->get();
    return view('routine.user.list')->with("data", $data);
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
