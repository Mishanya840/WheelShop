<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model {

    protected $table = 'tires';

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'item_id')->where('type','tire');
    }
}
