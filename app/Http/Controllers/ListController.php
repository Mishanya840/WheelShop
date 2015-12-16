<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Wheel;
use Illuminate\Http\Request;

class ListController extends Controller {

	/**
	 *
	 */
	public function wheel()
	{
		$wheels = Wheel::all()->toArray();
		//dd($wheels);
		return view('pages.wheel', ['wheels' => $wheels]);
	}


}
