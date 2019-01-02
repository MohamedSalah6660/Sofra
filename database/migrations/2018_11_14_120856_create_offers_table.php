<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('price', 15);
			$table->string('duration', 40);
			$table->string('name', 40);
			$table->mediumText('description');
			$table->string('image', 100);
		    $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}