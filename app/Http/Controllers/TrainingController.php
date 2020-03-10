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

    return redirect("/trainer/user/show/" . strval($id));
  }

  // public function show($trainingId)
  // {
  //   $data = []; //to be sent to the view
  //   $data["title"] = __('training.trainingTitle');
  //   $data["training_id"] = $trainingId;
  //
  //   return view('training.create')->with("data", $data);
  // }


/*
  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('comment.listTitle');
    $data["comments"] = Comment::with('user', 'exercise')->get();
    return view('comment.list')->with("data", $data);
  }


  public function delete($id)
  {
    Comment::destroy($id);
    return redirect('comment/list');
  }
*/

}
