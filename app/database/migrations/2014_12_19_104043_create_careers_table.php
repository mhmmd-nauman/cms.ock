<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('careers', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('status');
                        $table->text('jobtitle');
                        $table->string('date');
                        $table->text('responsibilities');
                        $table->text('requirements');
                        $table->text('footertext');
			$table->timestamps();
		});	//
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
