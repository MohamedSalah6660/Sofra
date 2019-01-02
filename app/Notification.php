<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    
    protected $fillable = array('title', 'body', 'action', 'order_id', 'notificationable_id', 'notificationable_type');

    public function notificationable()
    {
        return $this->morphTo();
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}