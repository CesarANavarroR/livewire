<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saucer_Type extends Model 
{
    use HasFactory;
    protected $table = 'saucer_types';

    protected $fillable = [
        'name',
        'image_url',
        'image_name'
    ];

    public static function created($request)
    {
        $saucerT = new Saucer_Type;
        $saucerT->name = $request['name'];
        $saucerT->image_url = $request['image_url'];
        $saucerT->image_name = $request['image_name'];
        $saucerT->save();
    }
 
    public function saucers(){
        return $this->hasMany('App\Models\Saucer','id','saucer_type_id');
    }
}
