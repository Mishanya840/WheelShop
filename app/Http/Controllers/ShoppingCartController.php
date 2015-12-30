<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function addToCart(Request $request)
	{
		$data = $request->all();
		if($request->ajax())
		{
			if($data['count']>0) {
				if ($request->hasCookie('goods')) {
					$request_array = json_decode($request->cookie('goods'), 2);
					$coincidence = false;
					foreach ($request_array as &$product) {
						if ($product['id'] == $data['id'] && $product['type'] == $data['type']) {
							$product['count'] += $data['count'];//если такой товар уже есть, просто увеличить кол-во;
							$coincidence = true;
							break;
						}
					}
					if ($coincidence == false) {
						array_push($request_array, array('id' => $data['id'], 'type' => $data['type'], 'count' => (int)$data['count']));
					}
					$cookie_json = json_encode($request_array);
					$msg = 'true';
				} else {
					$cookie_json = json_encode(array(
							array('id' => $data['id'], 'type' => $data['type'], 'count' => (int)$data['count'])
					));
					//$cookie_json = [{"id":"38","type":"wheel","count":4},{"id":"38","type":"wheel","count":6},{"id":"2","type":"tire","count":8},{"id":"2","type":"tire","count":2},{"id":"2","type":"disk","count":5},{"id":"2","type":"disk","count":56},{"id":"7","type":"disk","count":4},{"id":"1","type":"tire","count":1},{"id":"29","type":"wheel","count":9},{"id":"38","type":"wheel","count":6}];
					$msg = 'false';
				}

				$response = Response('goods');
				$response->withCookie(cookie()->forever('goods', $cookie_json));
			}
		}
		return $response;
	}
	public function countCartAjax(Request $request)
	{
		if($request->ajax()) {
			$result = $this->countCart($request);
		}
		return $result;
	}

	public function countCart(Request $request)
	{
		if( $request->hasCookie('goods') ){
			$request_array = json_decode($request->cookie('goods'),2);
			$result = count($request_array);
		}else{
			$result = 0;
		}
		return $result;
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\View\View
     */
	public function showCart(Request $request)
	{
		if( $request->hasCookie('goods') ){
			$request_array = json_decode($request->cookie('goods'),2);
			$data = ($request_array);//данные из Cookie

			$item = new ItemController;
			$result = [];
			foreach($data as $value){
				$item_data = $item->getItem($value['type'], $value['id'])->toArray();//данные из БД
				$item_data['typeItem'] = $value['type'];
				$item_data['count'] = $value['count'];
				array_push($result,$item_data);
			}

		}else{
			$data = 'Сookie отсутствует';
		}



		$totalCount = $this->countCart($request);
		return view('pages.showCart',['data' => $result, 'totalCount' => $totalCount]);
	}

	public function deleteItemOnCart(Request $request)
	{
		$data = $request->all();
		if($request->ajax())
		{
				if ($request->hasCookie('goods')) {
					$request_array = json_decode($request->cookie('goods'), 2);

					foreach ($request_array as &$product) {
						if ($product['id'] == $data['id'] && $product['type'] == $data['type']) {
							unset($product['id']);
							return $request_array;
							break;
						}
					}

					$cookie_json = json_encode($request_array);
				}
				$response = Response('goods');
				$response->withCookie(cookie()->forever('goods', $cookie_json));

		}
		return $response;
	}




}
