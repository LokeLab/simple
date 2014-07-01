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

		 DB::table('users')->insert(
			array(
				'username' => 'admin@reportavpn.com',
				'email' => 'admin@reportavpn.com',
				'name' => 'Admin',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 1,
				'active' => 1,		
				'deleted' => 0		
				));

		 DB::table('users')->insert(
			array(
				'username' => 'developer@reportavpn.com',
				'email' => 'developer@reportavpn.com',
				'name' => 'developer',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 2,
				'active' => 1,		
				'deleted' => 0		
				));


		 DB::table('users')->insert(
			array(
				'username' => 'angel2@reportavpn.com',
				'email' => 'angel2@reportavpn.com',
				'name' => 'angel2',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 3,
				'active' => 1,		
				'deleted' => 0		
				));

		 DB::table('users')->insert(
			array(
				'username' => 'angelav@reportavpn.com',
				'email' => 'angelav@reportavpn.com',
				'name' => 'angelav',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 4,
				'active' => 1,		
				'deleted' => 0		
				));

		 DB::table('users')->insert(
			array(
				'username' => 'angelpn@reportavpn.com',
				'email' => 'angelpn@reportavpn.com',
				'name' => 'angelpn',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 5,
				'active' => 1,		
				'deleted' => 0		
				));

		 DB::table('users')->insert(
			array(
				'username' => 'tech@reportavpn.com',
				'email' => 'tech@reportavpn.com',
				'name' => 'tech',
				'surname' => 'User',
				'password' => Hash::make('!password!'),
				'role' => 6,
				'active' => 1,		
				'deleted' => 0		
				));

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
