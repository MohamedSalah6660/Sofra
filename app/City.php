<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name');


    public function clients()
    {
        return $this->hasMany('App\Client');
    }
       public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }

}