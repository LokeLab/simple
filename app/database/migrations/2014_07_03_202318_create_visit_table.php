<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visit', function(Blueprint $table)
		{
			$table->increments('id');


			$table->datetime('visit_at');
			$table->integer('typevisit');

			$table->string('name',255);
			$table->string('surname',255);
			$table->string('plan',5);
			$table->integer('role');
			$table->string('role_description',255);
			$table->string('user_manager',100);
			$table->string('user_agente',100);
			$table->string('user_developer',100);
			$table->string('local',255);
			$table->string('local_definition',1000);
			$table->string('code',30);
			$table->string('address',300);
			$table->string('city',100);
			$table->string('furniture',10);
			$table->string('code_team_sell_out',10);
			$table->string('code_mr',10);
			$table->integer('aperitif_auto');
			$table->string('aperitif_auto_fq',20);
			$table->integer('advocacy');
			$table->string('advocacy_fq',20);
			$table->integer('s_consumer');
			$table->string('s_consumer_fq',20);
			$table->integer('l_advocacy');
			$table->string('l_advocacy_fq',20);
			$table->integer('first_visit');
			$table->integer('pot');
			$table->integer('re');
			$table->integer('qsmr');
			$table->integer('qscc');
			$table->integer('case_1');
			$table->integer('case_2');
			$table->integer('case_3');
			$table->integer('case_4');
			$table->integer('case_5');
			$table->integer('case_6');
			$table->integer('case_7');
			$table->integer('case_8');
			$table->integer('case_9');
			$table->integer('case_10');
			$table->integer('case_11');
			$table->integer('case_12');
			$table->integer('case_13');
			$table->integer('case_14');
			$table->integer('case_15');
			$table->integer('case_16');
			$table->integer('case_17');
			$table->integer('case_18');
			$table->string('description_ma',20);
			$table->string('description_ma2',20);

			
			$table->integer('case_19');
			$table->integer('case_21');
			$table->integer('case_22');
			$table->integer('case_23');
			$table->integer('case_24');
			$table->integer('nbarman');
			$table->string('description_msa',20);
			$table->string('description_msa2',20);
			$table->integer('cons_1');
			$table->integer('cons_2');
			$table->integer('cons_3');
			$table->integer('cons_4');
			$table->integer('cons_5');
			$table->integer('cons_6');
			$table->integer('cons_7');
			$table->integer('cons_8');
			$table->integer('cons_9');
			$table->integer('cons_10');
			$table->integer('cons_11');
			$table->string('cons_ma2',20);
			
			$table->integer('cons_12');
			$table->integer('cons_13');
			$table->integer('cons_14');
			$table->integer('cons_15');
			$table->integer('cons_16');
			$table->integer('cons_17');
			$table->integer('cons_18');
			$table->integer('cons_19');
			$table->integer('mcons_1');
			$table->integer('mcons_2');
			$table->integer('mcons_3');
			$table->integer('mcons_4');
			$table->integer('mcons_5');
			$table->integer('mcons_6');
			$table->integer('mcons_7');
			$table->integer('mcons_8');
			$table->integer('mcons_9');
			$table->integer('mcons_10');
			$table->integer('mcons_11');
			$table->integer('mcons_12');
			$table->integer('mcons_13');
			$table->integer('mcons_14');
			$table->integer('mcons_15');
			$table->integer('mcons_16');
			$table->integer('mcons_17');
			$table->integer('mcons_18');
			$table->integer('mcons_19');
		
		
			$table->integer('qsmr2');
			$table->integer('qscc2');

			$table->string('note_visit',2000);


			//date 
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->dateTime('deleted_at');
			
			//user
			$table->integer('user_created');
			$table->integer('user_updated');
			$table->integer('user_deleted');
			
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
		Schema::drop('visit');
	}

}
