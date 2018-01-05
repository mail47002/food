<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('advert_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advert_id');
            $table->string('city');
            $table->string('street');
            $table->string('build');
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
		Schema::drop('advert_addresses');

	}

}
