<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exercise;
use App\Interfaces\VideoStorage;
class ExerciseController extends Controller
{
  public function home()
  {
    return view('exercise.home');
  }

  public function create()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('exercise.createTitle');
    return view('exercise.create')->with("data", $data);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('exercise.listTitle');
    $data["exercises"] = Exercise::all();
    return view('exercise.list')->with("data", $data);
  }

  public function listByDescription()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('exercise.listByDescriptionTitle');
    $data["exercises"] = Exercise::orderBy('description')->get();
    return view('exercise.list')->with("data", $data);
  }

  public function retrieve($id)
  {
    $data = []; //to be sent to the views
    $exercise = Exercise::findOrFail($id);
    $data["title"] = $exercise->getName();
    $data["exercise"] = $exercise;
    return view('exercise.retrieve')->with("data", $data);
  }

  public function delete($id)
  {
    Exercise::destroy($id);
    return redirect('exercise/list');
  }

  public function save(Request $request)
  {
    Exercise::validate($request);
    $exercise = Exercise::create($request->only(['name', 'description', 'recommendations']));
    $storeInterface = app(VideoStorage::class);
    $storeInterface->store($request, $exercise);

    return back()->with('success', __('exercise.exerciseCreated'));
  }
}
