<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disk extends Model {

    protected $table = 'disks';

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'item_id')->where('type','disk');
    }

}
