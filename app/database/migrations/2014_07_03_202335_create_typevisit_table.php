<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypevisitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('typevisit', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('description');
			$table->timestamps();
		});

		DB::table('typevisit')->insert(
			array(
				'id' => 1,
				'description' => 'Advocacy'
				));

		DB::table('typevisit')->insert(
			array(
				'id' => 2,
				'description' => 'Consumer'
				));

		DB::table('typevisit')->insert(
			array(
				'id' => 3,
				'description' => 'Autogestito'
				));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('typevisit');
	}

}
