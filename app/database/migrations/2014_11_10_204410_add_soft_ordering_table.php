<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftOrderingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stones', function(Blueprint $table)
		{
			$table->integer('order')->unsigned();
		});

		Schema::table('stones_photos', function(Blueprint $table)
		{
			$table->integer('order')->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stones', function( Blueprint $table)
		{
    		$table->dropColumn('order');
		});

		Schema::table('stones_photos', function( Blueprint $table)
		{
    		$table->dropColumn('order');
		});
	}

}
