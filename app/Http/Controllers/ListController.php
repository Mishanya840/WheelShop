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
		$list = Wheel::all();
		foreach($list as $item) {
			$image = $item->images;
		};
		$list->toArray();
		return view('pages.list', ['title' => 'Колёса в сборе', 'type' => 'wheel','list' => $list]);
	}
	public function showTire()
	{
		$list = Tire::all();
		foreach($list as $item) {
			$image = $item->images;
		};
		$list->toArray();
		return view('pages.list', ['title' => 'Шины на ваш диск', 'type' => 'tire','list' => $list]);
	}
	public function showDisk()
	{
		$list = Disk::all();
		foreach($list as $item) {
			$image = $item->images;
		};
		$list->toArray();
		return view('pages.list', ['title' => 'Диски на ваш вкус', 'type' => 'disk','list' => $list]);
	}
	public function showMain()
	{
		$listDisk = Disk::all();
		foreach($listDisk as $item) {
			$imageDisk = $item->images;
		};
		$listDisk->toArray();

		$listTire = Tire::all();
		foreach($listTire as $item) {
			$imageTire = $item->images;
		};
		$listTire->toArray();

		$listWheel = Wheel::all();
		foreach($listWheel as $item) {
			$imageWheel = $item->images;
		};
		$listWheel->toArray();

		return view('pages.main', [
				'title' => [
						'titleDisk' => 'Диски на ваш вкус',
						'titleTire' => 'Шины на ваш диск',
						'titleWheel' => 'Колёса в сборе'
				],
				'list' => [
					'listDisk' => $listDisk->toArray(),
					'listTire' => $listTire->toArray(),
					'listWheel' => $listWheel->toArray()
				]
		]);
	}
	public function showOther()
	{
		return view('pages.other');
	}


}
