<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration {

	public function up()
	{
		Schema::create('order_product', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('order_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('price', 15);
			$table->string('quantity', 5);
			$table->string('special_order', 100);
		});
	}

	public function down()
	{
		Schema::drop('order_product');
	}
}