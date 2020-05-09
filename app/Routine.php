<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Routine extends Model
{

  //Atributes id, exercise_id, training_id, repetitions, sequences, seconds_to_rest, created_at, updated_at
  protected $fillable = [
    'exercise_id',
    'repetitions',
    'sequences',
    'seconds_to_rest',
    'training_id'
  ];

  public static function validate(Request $request){
    $request->validate([
      'exercise_id' => 'required|integer',
      'repetitions' => 'required|integer|min:0',
      'sequences' => 'required|integer|min:0',
      'seconds_to_rest' => 'required|integer|min:0',
      'training_id' => 'required|integer'
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

  public function getRepetitions()
  {
    return $this->attributes['repetitions'];
  }

  public function setRepetitions($repetitions)
  {
    $this->attributes['repetitions'] = $repetitions ;
  }
  public function getSequences()
  {
    return $this->attributes['sequences'];
  }

  public function setSequences($sequences)
  {
    $this->attributes['sequences'] = $sequences;
  }
  public function getSecondsToRest()
  {
    return $this->attributes['seconds_to_rest'];
  }

  public function setSecondsToRest($secondsToRest)
  {
    $this->attributes['seconds_to_rest'] = $secondsToRest;
  }
  public function getTrainingId()
  {
    return $this->attributes['training_id'];
  }

  public function setTrainingId($id)
  {
    $this->attributes['training_id'] = $id;
  }

  public function exercise(){
    return $this->belongsTo(Exercise::class);
  }

  public function training(){
    return $this->belongsTo(Training::class);
  }

}
