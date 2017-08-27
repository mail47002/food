<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertProductTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advert_product_terms', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('advert_id');
      $table->timestamp('date_start')->nullable(true);
      $table->timestamp('date_end')->nullable(true);
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
		Schema::drop('advert_product_terms');
	}

}
