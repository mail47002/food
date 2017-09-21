<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->decimal('price', 5, 2);
            $table->decimal('custom_price', 5, 2);
            $table->integer('category_id');
            $table->integer('sticker_id');
            $table->integer('sort_order');
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
		Schema::drop('adverts');
	}

}
