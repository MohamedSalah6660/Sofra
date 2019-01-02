<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('email', 100);
			$table->string('phone', 15);
			$table->text('home_description');
			$table->string('password', 255);
			$table->string('quarter', 40);
			$table->integer('city_id')->unsigned();
			$table->string('api_token')->nullable();
            $table->string('pin_code')->nullable();


		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}