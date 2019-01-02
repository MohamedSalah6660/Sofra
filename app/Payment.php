<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

	protected $fillable = array('done' , 'restaurant_id');

	public function restaurant ()
	{
		return $this->belongsTo('App\Restaurant' , 'restaurant_id');
	}

}
