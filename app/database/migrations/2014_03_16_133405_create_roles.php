<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('description', 255);
			$table->boolean('update');
			$table->primary('id');
		});



		DB::table('roles')->insert(
			array(
				'id' => 1,
				'description' => 'admin', 'update' => 1
				));
		DB::table('roles')->insert(
			array(
				'id' => 2,
				'description' => 'developer', 'update' => 1
				));
		DB::table('roles')->insert(
			array(
				'id' => 3,
				'description' => 'angel 2.0', 'update' => 1
				));
		DB::table('roles')->insert(
			array(
				'id' => 4,
				'description' => 'angel A.V.', 'update' => 1
				));
		DB::table('roles')->insert(
			array(
				'id' => 5,
				'description' => 'angel P.N.', 'update' => 1
				));
		DB::table('roles')->insert(
			array(
				'id' => 6,
				'description' => 'tech', 'update' => 0
				)
			);

		

	}


	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		
		Schema::drop('roles');
	}

}
