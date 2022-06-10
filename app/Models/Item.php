<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public static function created($request)
    {
        $item = new Item;
        $item->note = request('note');
        $item->saucer_id = request('saucer');
        $item->order_id = request('order');
        $item->save();
    }

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    public function saucer(){
        return $this->belongsTo('App\Models\Saucer','saucer_id','id');
    }

    public function state(){
        return $this->belongsTo('App\Models\State');
    }
}
