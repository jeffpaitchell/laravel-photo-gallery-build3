<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stones', function(Blueprint $table)
		{
		    $table->increments('stone_id');
			$table->string('stone_name');
			$table->string('stone_description')->nullable();
			$table->string('stone_type');
			$table->string('stone_origin');
			$table->string('stone_pattern');
			$table->string('stone_othername');
			$table->string('stone_application_kitchen');
			$table->string('stone_application_bathroom');
			$table->string('stone_application_fireplace');
			$table->string('stone_application_floor');
			$table->string('stone_application_outdoor');
			$table->string('stone_color_black');
			$table->string('stone_color_blue');
			$table->string('stone_color_brown');
			$table->string('stone_color_gold');
			$table->string('stone_color_gray');
			$table->string('stone_color_green');
			$table->string('stone_color_red');
			$table->string('stone_color_white');
			$table->string('stone_absorption');
			$table->string('stone_density');
			$table->string('stone_compression');
			$table->string('stone_abrasion');
			$table->string('stone_flex');
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
		Schema::drop('stones');
	}

}
