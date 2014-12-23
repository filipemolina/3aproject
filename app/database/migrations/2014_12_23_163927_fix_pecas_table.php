<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixPecasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pecas', function(Blueprint $table)
		{
			$table->integer('campanha_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pecas', function(Blueprint $table)
		{
			$table->dropColumn('campanha_id');
		});
	}

}
