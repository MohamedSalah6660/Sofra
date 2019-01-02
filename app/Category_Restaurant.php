<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Restaurant extends Model 
{

    protected $table = 'category_restaurant';
    public $timestamps = true;
    protected $fillable = array('category_id', 'restaurant_id');

}