<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 40);
			$table->string('phone', 15);
			$table->string('email', 40);
			$table->text('message');
			$table->enum('type', array('enquiry', 'suggestion', 'complaint'));
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}