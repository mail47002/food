<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('product_id')->default(0)->index();
            $table->string('thumbnail');
            $table->string('image');
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
		Schema::drop('product_images');
	}

}
