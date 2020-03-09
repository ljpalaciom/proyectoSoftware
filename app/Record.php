<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //attributes id, name, weight, height,imc, created_at, updated_at
    protected $fillable = ['name','weight', 'height','imc'];

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

}
