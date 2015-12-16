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
	public function wheel()
	{
		$list = Wheel::all()->toArray();
		//dd($wheels);
		return view('pages.list', ['title' => 'Колёса в сборе','list' => $list]);
	}
	public function tire()
	{
		$list = Tire::all()->toArray();
		//dd($wheels);
		return view('pages.list', ['title' => 'Шины на ваш диск', 'list' => $list]);
	}
	public function disk()
	{
		$list = Disk::all()->toArray();
		//dd($wheels);
		return view('pages.list', ['title' => 'Диски на ваш вкус','list' => $list]);
	}
	public function main()
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
	public function other()
	{
		return view('pages.other');
	}


}
