<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';
    protected $fillable = array('name');


	public function orders()
	{
	  return $this->hasMany('App\Order' ,'payment_method_id');
	}

}
