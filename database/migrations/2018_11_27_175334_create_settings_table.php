<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
        $table->increments('id');
            $table->timestamps();
            $table->string('phone', 15);
            $table->string('email', 40);
            $table->longText('about_app');
            $table->text('facebook_url');
            $table->text('twitter_url');
            $table->integer('whatsapp');
            $table->text('instgram');
            $table->text('google_url');            
            $table->string('commission');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
