<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wheel extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wheel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','title','img','description','cost','cunt',
        'diametr','width','profile','winter','created_at','updated_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
