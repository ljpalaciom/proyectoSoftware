<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Training extends Model
{

  //Atributes id, name, routines, day, duration, created_at, updated_at
  protected $fillable = ['name','day','duration','user_id'];

  public static function validate(Request $request){
    $request->validate([
      'name' => 'required|min:3',
      "day" => "required|numeric|min:0",
      "duration" => "required|numeric|min:0",
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


  public function getName()
  {
    return $this->attributes['name'];
  }

  public function setName($name)
  {
    $this->attributes['name'] = $name;
  }

  public function getDay()
  {
    return $this->attributes['day'];
  }

  public function setDay($day)
  {
    $this->attributes['day'] = $day;
  }

  public function getCreatedAt()
  {
    return $this->attributes['created_at'];
  }

  public function getDuration()
  {
    return $this->attributes['duration'];
  }

  public function setDuration($duration)
  {
    $this->attributes['duration'] = $duration;
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

}
