<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title', 40);
			$table->text('body');
			$table->enum('action', array('new-order', 'order-rejected', 'order-prepared', 'order-delivered', 'order-new-offer'));
			$table->integer('order_id')->unsigned();
			$table->integer('notificationable_id');
			$table->string('notificationable_type', 100);
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}