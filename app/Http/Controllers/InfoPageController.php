<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\InfoPage;
use Illuminate\Http\Request;

class InfoPageController extends Controller {


	public function index($title)
	{
		$info = InfoPage::where('title',$title)->firstOrFail()->toArray();
		$text = 'text exist';
		if(isset($info)){
			$text = $info['text'];
			$title = $info['header_text'];
		}
		return view('pages.infopage', ['text' => $text, 'header_text' => $title]);
	}


}
