<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model 
{

    protected $table = 'order_product';
    public $timestamps = true;
    
    protected $fillable = array('order_id', 'product_id', 'price', 'quantity', 'special_order');


    
}