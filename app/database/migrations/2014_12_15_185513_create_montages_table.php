<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMontagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('montages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
                        $table->string('title', 255);
                        $table->string('status', 255);
                        $table->string('Banner', 255);
                        $table->string('MoreStatus', 255);
                        $table->string('url', 255);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('montages');
	}

}
