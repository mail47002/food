<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_categories', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('meta_title');
      $table->string('meta_description');
      $table->string('meta_keyword');
      $table->text('description');
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
		Schema::drop('article_categories');
	}

}
