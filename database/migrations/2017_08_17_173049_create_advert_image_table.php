<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advert_image', function (Blueprint $table) {
      $table->increments('advert_image_id');
      $table->integer('advert_id');
      $table->string('image');
      $table->string('alt');
      $table->integer('sort_order');
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
		Schema::drop('advert_image');
	}

}
