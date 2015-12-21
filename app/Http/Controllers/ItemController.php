<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Disk;
use App\Models\Tire;
use App\Models\Wheel;
use Illuminate\Http\Request;

class ItemController extends Controller {


	public function showItem($type, $id, Request $request)
	{
		switch($type){
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
		return view('pages.item', ['item' => $item, 'type' => $type]);

	}

}
