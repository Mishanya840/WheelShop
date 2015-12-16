<?php

use App\Models\Wheel;
use App\Models\Tire;
use App\Models\Disk;
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
			$this->call('DiskTableSeeder');
			$this->call('TireTableSeeder');
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
		'PCD' => '5*100',
		'ET' => '50',
		'type' => 'Штампованные'
		]);
	}
}

class DiskTableSeeder extends Seeder
{
	public function run()
	{
		//DB::table('wheels')->delete();
		Disk::create([
				'title' => 'MOMO',
				'img' => 'http://presentation/image/momo.jpg',
				'description' => 'Диски новые. В отличном состоянии. Хорошие материалы. В наличии 4 штуки',
				'cost' => '6000',
				'cunt' => '4',
				'diametr' => '16',
				'width' => '55',
				'PCD' => '5*100',
				'ET' => '50',
				'type' => 'Штампованные'
		]);
	}
}

class TireTableSeeder extends Seeder
{
	public function run()
	{
		//DB::table('wheels')->delete();
		Tire::create([
				'title' => 'KAMA',
				'img' => 'http://presentation/image/kama.jpg',
				'description' => 'Резина новая. В отличном состоянии. Хорошие материалы и шипы. В наличии 4 штуки',
				'cost' => '5000',
				'cunt' => '4',
				'diametr' => '16',
				'width' => '55',
				'profile' => '15',
				'winter' => true,
		]);
	}
}
