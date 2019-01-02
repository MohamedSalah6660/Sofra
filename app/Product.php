<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    
    protected $fillable = array('name', 'price', 'description', 'image', 'duration', 'restaurant_id');

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withpivot('price','quantity','special_order');
    }

       public function restaurants()
    {
        return $this->belongsTo('App\Restaurant');
    }


}