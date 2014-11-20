<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesPhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stones_photos', function(Blueprint $table)	
		{
			$table->increments('photo_id');
			$table->string('photo_name');
			$table->string('photo_description')->nullable();
			$table->string('photo_path');
			$table->integer('stone_id')->unsigned();
			$table->foreign('stone_id')->references('stone_id')->on('stones');
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
		Schema::drop('stones_photos');
	}

}
