<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = 'images';

    public function disk()
    {
        $this->belongTo('App\Disk', 'item_id');
    }

    public function tire()
    {
        $this->belongTo('App\Tire', 'item_id');
    }

    public function wheel()
    {
        $this->belongTo('App\Wheel', 'item_id');
    }

}
