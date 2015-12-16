<?php

use App\Models\Wheel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		for($i=0; $i < 7; $i++){
			$this->call('WheelTableSeeder');
		}
	}

}

class WheelTableSeeder extends Seeder
{
	public function run()
	{
		//DB::table('wheels')->delete();
		Wheel::create([
		'title' => 'pirelli',
		'img' => 'http://presentation/image/logo.png',
		'description' => 'Колёса новые. В отличном состоянии. Хорошие материалы и шипы. В наличии 4 штуки',
		'cost' => '5000',
		'cunt' => '4',
		'diametr' => '16',
		'width' => '55',
		'profile' => '15',
		'winter' => false,
		]);
	}
}
