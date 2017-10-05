<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->integer('user_id');
      $table->string('slug');
      $table->text('description');
      $table->string('image');
      $table->json('videos');
      $table->integer('status');
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
		Schema::drop('articles');
	}

}
