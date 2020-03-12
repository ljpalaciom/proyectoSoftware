<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends  Authenticatable
{

  use Notifiable;

  //id, name, role, lastName, age, email, password, role
  protected $fillable = ['name','last_name','age','email','password', 'role']; //

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
  * The attributes that should be cast to native types.
  *
  * @var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  public static function validate(Request $request){
    $request->validate([
      'name' => 'required',
      'last_name' => 'required',
      'age' => 'required|integer|min:0|max:120',
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'role' => 'required'
    ]);
  }
  private $indexRoles = ["user" => 1, "trainer" => 2, "admin" => 3];

  public function hasRole($role)
  {
      return $this->getRole() == $this->indexRoles[$role];
  }
  public function getBaseUrl(){

    if($this->getRole() == 1){ //user
      return '/index';
    }else if ($this->getRole() == 2){
      return '/trainer';
    }else if ($this->getRole() == 3){
      return '/admin';
    }
    return '/';
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
    return $this->attributes['last_name'];
  }

  public function setLastName($lastName)
  {
    $this->attributes['last_name'] = $lastName;
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

  public function getRole()
  {
    return $this->attributes['role'];
  }

  public function setRole($role)
  {
    $this->attributes['role'] = $role;
  }

  public function records(){
    return $this->hasMany(Record::class);
  }

  public function trainings(){
    return $this->hasMany(Training::class);
  }

  public function appointments(){
    return $this->hasMany(Appointment::class);
  }
}
