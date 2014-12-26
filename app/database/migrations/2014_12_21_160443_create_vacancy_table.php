<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('vacancies', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('name');
                        $table->text('DOB');
                        $table->string('Email');
                        $table->string('ContactNumber');
                        $table->string('MobileNumber');
                        $table->string('EducationLevel');
                        $table->string('Address');
                        $table->string('City');
                        $table->string('State');
                        $table->string('PostalCode');
                        $table->string('Country');
                        $table->string('CV');
                        $table->integer('career_vacancy_id');
			$table->timestamps();
		});	
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
