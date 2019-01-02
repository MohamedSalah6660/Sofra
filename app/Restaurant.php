<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use App\Order;

class Restaurant extends Model 
{

    protected $table = 'restaurants';
    public $timestamps = true;
    
    protected $fillable = array('name', 'quarter', 'email', 'password', 'receiving_time', 'delivery_time', 'delivery_fee', 'phone', 'whatsapp', 'minimum', 'rate', 'city_id' ,'pin_code', 'status');

    protected $appends =['rest_commission'];

    public function getRestCommissionAttribute()
    {
        $com = $this->orders()->where('status', 'delivered')->sum('commission');
        $paid = $this->payments()->sum('done');

        $remain = ($com - $paid);

        return $remain;
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function cities()
    {
        return $this->belongsTo('App\City' , 'city_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order' , 'restaurant_id');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment', 'restaurant_id');
    }

    public function notifications()
    {
        return $this->morphMany('App\Notification', 'notificationable');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
 
    public function tokens()
    {
        return $this->morphOne('App\Token', 'tokenable');
    }
          protected $hidden = [
        'password', 'api_token',
    ];

}