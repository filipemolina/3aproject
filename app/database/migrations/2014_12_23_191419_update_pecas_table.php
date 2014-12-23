<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePecasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pecas', function(Blueprint $table)
		{
			$table->text('mensagem')->nullable()->after('campanha_id');
			$table->boolean('aprovado')->default(false);
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
			$table->dropColumn('mensagem');
			$table->dropColumn('aprovado');
		});
	}

}
