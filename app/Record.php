<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Record extends Model
{
  //attributes id, user_id, weight, height,imc, created_at, updated_at
  protected $fillable = ['user_id','weight', 'height','imc'];


  //TODO: Add validations


  public static function validate(Request $request){
    $request->validate([
      "weight" => "required|numeric|min:0",
      "height" => "required|numeric|min:0",
      "imc" => "required|numeric|min:0"
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

  public function getUserId()
  {
    return $this->attributes['user_id'];
  }

  public function setUserId($name)
  {
    $this->attributes['user_id'] = $name;
  }

  public function getWeight()
  {
    return $this->attributes['weight'];
  }

  public function setWeight($weight)
  {
    $this->attributes['weight'] = $weight;
  }

  public function getHeight()
  {
    return $this->attributes['height'];
  }

  public function setHeight($height)
  {
    $this->attributes['height'] = $height;
  }

  public function getIMC()
  {
    return $this->attributes['imc'];
  }

  public function setIMC($imc)
  {
    $this->attributes['imc'] = $imc;
  }

  public function getCreatedAt()
  {
    return $this->attributes['created_at'];
  }

  public function setCreatedAt($created)
  {
    $this->attributes['created_at'] = $created;
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
