<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_details';

    public static function created($request)
    {
        for($slug='',$i=0;$i<8;$i++){
            $slug = $slug . chr(rand(ord(0), ord("z")));
        }
        $order = new Order_Detail;
        $order->slug = $slug;
        $order->save();
        return $order;
    }

    public function orders(){
        return $this->hasMany('App\Models\Order','order_detail_id','id');
    }
}

