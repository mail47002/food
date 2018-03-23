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
            $table->integer('user_id')->index();
            $table->integer('product_id')->index();
            $table->string('sticker')->nullable();
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->string('slug');
            $table->integer('quantity')->nullable();
            $table->decimal('price', 5, 2)->default(0);
            $table->decimal('custom_price', 5, 2)->default(0);
            $table->string('image');
            $table->string('type')->index();
            $table->integer('everyday')->default(0);
            $table->timestamp('date')->nullable();
            $table->timestamp('date_from')->nullable();
            $table->timestamp('date_to')->nullable();
            $table->string('time')->nullable();
            $table->string('address');
            $table->float('lat', 10, 8);
            $table->float('lng', 10, 8);
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
