<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestaurantsTable extends Migration {

	public function up()
	{
		Schema::create('restaurants', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 40);
			$table->string('quarter', 40);
			$table->string('email', 40);
			$table->string('password', 255);
			$table->string('receiving_time', 100);
			$table->string('delivery_time', 100);
			$table->string('delivery_fee', 15);
			$table->string('phone', 15);
			$table->string('whatsapp');
			$table->string('minimum', 15);
			$table->integer('rate');
			$table->string('api_token')->nullable();
			$table->integer('city_id')->unsigned();
            $table->string('pin_code')->nullable();
            $table->enum('status', array('open' , 'close'));
			
		});
	}

	public function down()
	{
		Schema::drop('restaurants');
	}
}