<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    
    protected $fillable = array('delivery', 'total', 'commission', 'net', 'notes', 'status', 'number', 'client_id', 'restaurant_id', 'payment_method_id' , 'cost');


   public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withpivot('price','quantity','special_order');
    }

      public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

       public function restaurants()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id');
    }  
    
        public function payment_methods()
    {
        return $this->belongsTo('App\PaymentMethod', 'payment_method_id');
    }
}