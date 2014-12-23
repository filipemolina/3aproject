<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampanhasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campanhas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->dateTime('data_inicial');
			$table->dateTime('data_final');
			$table->integer('empresa_id');
			$table->timestamps();
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
		Schema::drop('campanhas');
	}

}
