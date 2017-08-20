<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review_answer', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('role_id');
      $table->string('image');
      $table->string('name');
      $table->string('phone');
      $table->string('email');
      $table->string('about');
      $table->string('password');
      $table->integer('status');
      $table->string('ip');
      $table->rememberToken();
      $table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('review_answer');
	}

}
