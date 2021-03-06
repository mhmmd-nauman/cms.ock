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
                        $table->integer('status');
                        $table->string('Banner', 255);
                        $table->text('body');//ALTER TABLE `montages` ADD `body` TEXT NOT NULL AFTER `Banner`;
                        $table->integer('MoreStatus');
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
