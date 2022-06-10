<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saucer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'saucer_type_id', 
        'image_url',
        'image_name'
    ];

    public static function created($request)
    {
        $saucer = new Saucer;
        $saucer->name = $request['name'];
        $saucer->description = $request['description'];
        $saucer->price = $request['price'];
        $saucer->saucer_type_id = $request['category'];
        $saucer->image_url = $request['image_url'];
        $saucer->image_name = $request['image_name'];
        $saucer->save();
    }

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }

    public function type(){
        return $this->belongsTo('App\Models\Saucer_Type','saucer_type_id','id');
    }
}
