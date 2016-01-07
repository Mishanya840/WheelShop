<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Disk;
use App\Models\Tire;
use App\Models\Wheel;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index()
    {
        return view('admin.main');
    }

    /**
     * @param Request $request
     * @return int
     */
    public function addItem(Request $request)
    {
        try {
            $data = $request->all();
            $uploaddir = 'image/';
            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                switch ($data['typeItem']) {
                    case 'wheel':
                        $model = new Wheel;
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->profile = $data['profile'];
                        $model->width = $data['width'];
                        $model->winter = (boolean)isset($data['winter']);
                        $model->PCD = $data['PCD'];
                        $model->ET = $data['ET'];
                        $model->type = $data['type'];
                        $model->save();
                        break;
                    case 'tire':
                        $model = new Tire;
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->width = $data['width'];
                        $model->profile = $data['profile'];
                        $model->winter = isset($data['winter']);
                        $model->save();
                        break;
                    case 'disk':
                        $model = new Disk;
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->width = $data['width'];
                        $model->PCD = $data['PCD'];
                        $model->ET = $data['ET'];
                        $model->type = $data['type'];
                        $model->save();
                        break;
                }
                $uploadfile = $uploaddir . $data['typeItem'] . "/" . ($model->id) . '_' . basename($_FILES['image']['name'][$i]);
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadfile);
                //добавить в БД
                $model->img = 'http://presentation/' . $uploadfile;
                $model->save();
                $msg = 'true';
            }
        }catch (Exception $e){
            $msg = 'false';
        }
        return view('admin.main',['msg' => $msg]);
    }



    public function changeItem(Request $request){
        try {
            $data = $request->all();

            foreach($data as &$value){//удалим пробелы, табы и прочее с начала и конца
                if(is_string($value)){
                    $value = trim($value);
                }
            }
            $uploaddir = 'image/';

            switch ($data['typeItem']) {
                    case 'wheel':
                        $model = Wheel::find($data['id']);
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->profile = $data['profile'];
                        $model->width = $data['width'];
                        $model->winter = (boolean)isset($data['winter']);
                        $model->PCD = $data['PCD'];
                        $model->ET = $data['ET'];
                        $model->type = $data['type'];
                        $model->save();
                        break;
                    case 'tire':
                        $model = Tire::find($data['id']);
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->width = $data['width'];
                        $model->profile = $data['profile'];
                        $model->winter = (boolean)isset($data['winter']);
                        $model->save();
                        break;
                    case 'disk':
                        $model = Disk::find($data['id']);
                        $model->title = $data['title'];
                        $model->description = $data['description'];
                        $model->cost = $data['cost'];
                        $model->count = $data['count'];
                        $model->diametr = $data['diametr'];
                        $model->width = $data['width'];
                        $model->PCD = $data['PCD'];
                        $model->ET = $data['ET'];
                        $model->type = $data['type'];
                        $model->save();
                        break;
                }
            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {//TODO for для добавления только фоток а не для всего подряд

                if ($_FILES['image']['size'][$i] > 0) {
                    $uploadfile = $uploaddir . $data['typeItem'] . "/" . ($model->id) . '_' . basename($_FILES['image']['name'][$i]);
                    move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadfile);
                    //добавить в БД
                    $model->img = 'http://presentation/' . $uploadfile;
                    $model->save();
                    $msg = 'true';
                }
            }
        }catch (Exception $e){
            $msg = 'false';
        }
        return redirect('/'. $data['typeItem'] . '/' . $data['id'])->with(['type' => $data['typeItem'], 'item' => $model]);
    }
}