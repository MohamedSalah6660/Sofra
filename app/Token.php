<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{ 
    protected $table = 'tokens';

   protected $fillable = array('token','platform', 'tokenable_id' , 'tokenable_type');

       public function tokenable()
    {
        return $this->morphTo();

    }
    
}
