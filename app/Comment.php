<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{

  //Atributes id, exercise_id, user_id, comment, created_at, updated_at
  protected $fillable = ['exercise_id', 'user_id', 'comment'];

  public static function validate(Request $request){
    $request->validate([
      'comment' => 'required|min:3',
      'exercise_id' => 'required'
    ]);
  }

  public function getId()
  {
    return $this->attributes['id'];
  }

  public function setId($id)
  {
    $this->attributes['id'] = $id;
  }

  public function getExerciseId()
  {
    return $this->attributes['exercise_id'];
  }

  public function setExerciseId($id)
  {
    $this->attributes['exercise_id'] = $id;
  }
  public function getUserId()
  {
    return $this->attributes['user_id'];
  }

  public function setUserId($id)
  {
    $this->attributes['user_id'] = $id;
  }

  public function getComment()
  {
    return $this->attributes['comment'];
  }

  public function setComment($comment)
  {
    $this->attributes['comment'] = $comment;
  }

  public function exercise(){
    return $this->belongsTo(Exercise::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }



}
