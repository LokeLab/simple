<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateProvince extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('province', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('description', 255);
			$table->primary('id');
		});


		Schema::table('city', function(Blueprint $table)
		{
		//FK
			$table->index('province_id');
			$table->foreign('province_id')->references('id')->on('province');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('city', function(Blueprint $table)
		{
			$table->dropForeign('city_province_foreign');
		});
		Schema::drop('province');
	}

}
