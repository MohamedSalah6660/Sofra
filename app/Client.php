<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    
    protected $fillable = array('name', 'email', 'phone', 'home_description', 'password', 'quarter', 'city_id', 'pin_code');


    public function cities()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'client_id');
    }

    public function notifications()
    {
        return $this->morphMany('App\Notification', 'notificationable');
    }
 
    public function tokens()
    {
        return $this->morphOne('App\Token', 'tokenable');
    }
 
        protected $hidden = [
        'password', 'api_token',
    ];

}