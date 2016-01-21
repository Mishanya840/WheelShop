<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disk;
use App\Models\Tire;
use App\Models\Wheel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ItemController extends Controller {

	public function getItem($type, $id)
	{
		$item = null;
		switch ($type) {
			case 'disk':
				$item = Disk::findOrFail($id);
				break;
			case 'tire':
				$item = Tire::findOrFail($id);
				break;
			case 'wheel':
				$item = Wheel::findOrFail($id);
				break;
			default:
				abort(503, 'Erroe type on rout');
		}
		$image = $item->images;
		return $item;
	}


	/**
	 * @param $type
	 * @param $id
	 * @param Request $request
	 * @return \Illuminate\View\View
     */
	public function showItem($type, $id, Request $request)
	{

		$item = $this->getItem($type,$id);
		$image = $item->images;//->where('type', $type);
		return view('pages.item', ['item' => $item, 'type' => $type]);

	}

	/**
	 * @param $type
	 * @param $id
	 * @param Request $request
	 * @return \Illuminate\View\View
     */
	public function adminShowItem($type, $id, Request $request)
	{
		$item = $this->getItem($type,$id);
		$image = $item->images;
		return view('admin.item', ['item' => $item, 'type' => $type, 'id' => $id]);

	}
}
