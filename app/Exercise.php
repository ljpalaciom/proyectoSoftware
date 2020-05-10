<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Exercise extends Model
{

  //Atributes id, path_video, path_image, name, description, recommendations, created_at, updated_at
  protected $fillable = ['path_video', 'path_image', 'name', 'description', 'recommendations'];

  public static function validate(Request $request){
    $request->validate([
      'name' => 'required|min:3',
      'video' => 'file|mimes:avi,mp4|max:5000',
      'image' => 'file|mimes:png,jpg,jpeg'
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

  public function getPathVideo()
  {
    return $this->attributes['path_video'];
  }

  public function setPathVideo($pathVideo)
  {
    $this->attributes['path_video'] = $pathVideo;
  }

  public function getPathImage()
  {
    return $this->attributes['path_image'];
  }

  public function setPathImage($pathImage)
  {
    $this->attributes['path_image'] = $pathImage;
  }

  public function setImage($image)
  {
    $this->attributes['image'] = $image;
  }

  public function getName()
  {
    return $this->attributes['name'];
  }

  public function setName($name)
  {
    $this->attributes['name'] = $name;
  }

  public function getDescription()
  {
    return $this->attributes['description'];
  }

  public function getCreatedAt()
  {
    return $this->attributes['created_at'];
  }

  public function setDescription($description)
  {
    $this->attributes['description'] = $description;
  }

  public function getRecommendations()
  {
    return $this->attributes['recommendations'];
  }

  public function setRecommendations($recommendations)
  {
    $this->attributes['recommendations'] = $recommendations;
  }

  public function routine(){
    return $this->belongsTo(Routine::class);
  }

  public function comment(){
    return $this->hasMany(Comment::class);
  }

}
