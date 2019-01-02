<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	
    protected $fillable = array('phone' , 'email', 'about_app', 'facebook_url', 'twitter_url' ,'whatsapp', 'instgram', 'google_url', 'commission');

}
