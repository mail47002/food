<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->json('ingredient')->nullable();
            $table->string('image')->nullable();
            $table->json('video')->nullable();
            $table->integer('status')->default(0);
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
		Schema::drop('products');
	}

}
