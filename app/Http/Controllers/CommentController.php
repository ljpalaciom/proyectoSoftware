<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Comment;
use App\Interfaces\VideoStorage;
class commentController extends Controller
{

  public function create($exercise_id)
  {
    $data = []; //to be sent to the view
    $data["title"] = __('comment.createTitle');
    $data["exercise"] = Exercise::findOrFail($exercise_id);
    return view('comment.create')->with("data", $data);
  }

  public function list()
  {
    $data = []; //to be sent to the view
    $data["title"] = __('comment.listTitle');
    $data["comments"] = Comment::with('user', 'exercise')->get();
    return view('comment.list')->with("data", $data);
  }

  public function sort($order){
    $data = []; // to be sent to the view
    $data["title"] =  __('comment.listTitle');
    $data["records"] = Comment::with('user', 'exercise')->orderBy($order)->get();
    return view('comment.list')->with("data",$data);
  }

  public function delete($id)
  {
    Comment::destroy($id);
    return redirect('comment/list');
  }

  public function save(Request $request)
  {
    Comment::validate($request);
    $user = Auth::user();
    $exercise = Exercise::findOrFail($request->input('exercise_id'));
    $fields = $request->only(['exercise_id', 'comment']);
    $fields['user_id'] = $user->getId();
    $comment = Comment::create($fields);
    return back()->with('success', __('comment.commentCreated'));
  }
}
