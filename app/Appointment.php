<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
class Appointment extends Model
{

    //Atributes id, date, time, description, user_id, created_at, updated_at
    protected $fillable = ['date','time','description', 'trainer_id', 'user_id'];

    public static function validate(Request $request){
      $request->validate([
        'date' => 'required',
        'time' => 'required',
        'description' => 'required'
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

    public function getDate()
    {
        return $this->attributes['date'];
    }

    public function setDate($date)
    {
        $this->attributes['date'] = $date;
    }

    public function getTime()
    {
        return $this->attributes['time'];
    }

    public function setTime($time)
    {
        $this->attributes['time'] = $time;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getTrainerId()
    {
        return $this->attributes['trainer_id'];
    }

    public function setTrainerId($trainerId)
    {
        $this->attributes['trainer_id'] = $trainerId;
    }

    public function getTrainerName()
    {
        return $this->attributes['name'];
    }

    public function setTrainerName($trainerName)
    {
        $this->attributes['name'] = $trainerName;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function trainer(){
        return $this->belongsTo(User::class);
    }

}
