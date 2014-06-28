<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username',255);
			$table->string('password',255);
			$table->string('access_code',255);
			$table->integer('role');
			

			//personal detail
			$table->string('name',255);
			$table->string('surname',255);
			$table->string('phone',255);
			$table->string('email',1000);
			

			//date 
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			$table->dateTime('lastlogin_at');
			$table->dateTime('last_pwd_changed_at');
			$table->dateTime('last_pwd_change_request_at');

			//user
			$table->integer('user_created');
			$table->integer('user_updated');
			$table->integer('user_deleted');

			//login info
			$table->boolean('external_login');
			$table->string('ext_login_code',255);
			$table->integer('type_external_login');
			$table->integer('try_wrong_login');
			
			// active && delete
			$table->boolean('active');
			$table->boolean('deleted');


			
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
