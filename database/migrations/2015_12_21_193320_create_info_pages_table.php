<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *Schema::create('disks', function(Blueprint $table)
	{
	$table->increments('id');
	$table->string('title', 30)->index('title');
	$table->string('img', 250);
	$table->text('description', 400);
	$table->mediumInteger('cost');
	$table->tinyInteger('cunt');
	$table->tinyInteger('diametr');
	$table->smallInteger('width');
	$table->string('PCD', 5);
	$table->smallInteger('ET');
	$table->string('type', 12);
	$table->timestamps();
	});
	 * @return void
	 */
	public function up()
	{
		Schema::create('info_pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 50);
			$table->string('header_text', 70);
			$table->text('text');
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
		Schema::drop('info_pages');
	}

}
