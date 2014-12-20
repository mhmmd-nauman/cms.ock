<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventfoldersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventfolders', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('status');
                        $table->string('date');
                        $table->text('eventtittle');
                         $table->text('file');
                        
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('eventfolders');
	}

}
