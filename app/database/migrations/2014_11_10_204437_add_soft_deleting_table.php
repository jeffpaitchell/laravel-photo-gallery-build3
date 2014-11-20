<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stones', function(Blueprint $table)
		{
			$table->softDeletes();
		});

		Schema::table('stones_photos', function(Blueprint $table)
		{
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('stones', function(Blueprint $table)
		{
			$table->dropColumn('deleted_at');
		});

		Schema::table('stones_photos', function(Blueprint $table)
		{
			$table->dropColumn('deleted_at');
		});
	}

}
