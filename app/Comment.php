<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

    protected $table = 'comments';
    public $timestamps = true;
    
    protected $fillable = array('body', 'rate', 'client_id','restaurant_id');


   public function client()
    {
        return $this->belongsTo('App\Client');
    }
    
       public function restaurants()
    {
        return $this->belongsTo('App\Restaurant');
    }
}