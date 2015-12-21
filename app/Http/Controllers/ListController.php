<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disk;
use App\Models\Tire;
use App\Models\Wheel;
use Illuminate\Http\Request;

class ListController extends Controller {

	/**
	 *
	 */
	public function showWheel()
	{
		$list = Wheel::all()->toArray();
		//dd($wheels);
		return view('pages.list', ['title' => 'Колёса в сборе', 'type' => 'wheel','list' => $list]);
	}
	public function showTire()
	{
		$list = Tire::all()->toArray();
		//dd(Tire::findOrFail(2));
		return view('pages.list', ['title' => 'Шины на ваш диск', 'type' => 'tire','list' => $list]);
	}
	public function showDisk()
	{
		$list = Disk::all()->toArray();

		//dd(Disk::findOrFail(2));
		return view('pages.list', ['title' => 'Диски на ваш вкус', 'type' => 'disk','list' => $list]);
	}
	public function showMain()
	{
		$listDisk = Disk::all()->toArray();
		$listTire = Tire::all()->toArray();
		$listWheel = Wheel::all()->toArray();
		//dd($wheels);
		return view('pages.main', [
				'title' => [
						'titleDisk' => 'Диски на ваш вкус',
						'titleTire' => 'Шины на ваш диск',
						'titleWheel' => 'Колёса в сборе'
				],
				'list' => [
					'listDisk' => $listDisk,
					'listTire' => $listTire,
					'listWheel' => $listWheel
				]
		]);
	}
	public function showOther()
	{
		return view('pages.other');
	}


}
