<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class User extends Model
{
    //protected $table = 'user';
    //id, name, lastName, age, email, password
    protected $fillable = ['name','lastName','age','email','password'];

    public static function validate(Request $request){
      $request->validate([
        'name' => 'required',
        'lastName' => 'required',
        'age' => 'required|integer|min:0|max:120',
        'email' => 'required|email|unique:users',
        'password' => 'required',
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

    public function getLastName()
    {
        return $this->attributes['lastName'];
    }

    public function setLastName($lastName)
    {
        $this->attributes['lastName'] = $lastName;
    }

    public function getAge()
    {
        return $this->attributes['age'];
    }

    public function setAge($age)
    {
        $this->attributes['age'] = $age;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    /**
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
    */
}
