<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('delivery', 40);
			$table->string('total', 15);
			$table->string('commission', 15);
			$table->string('net', 15);
			$table->text('notes');
			$table->enum('status', array('pending', 'accepted', 'rejected', 'prepared', 'delivered', 'cancelled'));
			$table->integer('number');
            $table->integer('cost');
			$table->integer('client_id')->unsigned();
			$table->integer('restaurant_id')->unsigned();
			$table->integer('payment_method_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}