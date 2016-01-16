<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('disks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 30)->index('title');
			$table->text('description', 400);
			$table->mediumInteger('cost');
			$table->tinyInteger('count');
			$table->tinyInteger('diametr');
			$table->smallInteger('width');
			$table->string('PCD', 5);
			$table->smallInteger('ET');
			$table->string('type', 12);
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
		Schema::drop('disks');
	}

}
