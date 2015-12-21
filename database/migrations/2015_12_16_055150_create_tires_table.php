<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tires', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 30)->index('title');
			$table->string('img', 250);
			$table->text('description', 400);
			$table->mediumInteger('cost');
			$table->tinyInteger('cunt');
			$table->tinyInteger('diametr');
			$table->smallInteger('width');
			$table->float('profile');
			$table->boolean('winter');
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
		Schema::drop('tires');
	}

}
