<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Training;
use Auth;


class TrainingController extends Controller
{

  public function create($userId)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('training.trainingTitle');
    $data["user_id"] = $userId;

    return view('training.create')->with("data", $data);
  }

  public function save(Request $request, $id)
  {

    Training::validate($request);

    $fields = $request->only(['name', 'day','duration']);
    $fields['user_id'] = $id;

    $comment = Training::create($fields);

    return redirect("/trainer/user/show/" . strval($id))->with("type",1);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('training.trainingTitle');
    $user = Auth::user();
    $data["trainings"] = Training::where('user_id', $user->getId())->get();    
    return view('training.list')->with("data", $data);
  }


  public function delete($id)
  {
    Training::destroy($id);
    return back()->with("type",1);
  }

}
