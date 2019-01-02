<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model 
{

    protected $table = 'offers';
    public $timestamps = true;
    
    protected $fillable = array('price', 'duration', 'name', 'description', 'image' , 'restaurant_id');


    public function restaurant()
    {
    	return $this->belongsTo('App\Restaurant');
    }
}