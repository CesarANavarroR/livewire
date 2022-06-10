<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'state_id',
        'table_id',
        'order_detail_id'
    ];

    public static function created($request)
    {
        $order = new Order;
        $order->name = request('order');
        $order->state_id = request('state');
        $order->table_id = request('table');
        $order->order_detail_id = request('detail');
        $order->save();
        return $order;
    }

    public function details(){
        return $this->belongsTo('App\Models\Order_Detail','order_detail_id','id');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function items(){
        return $this->hasMany('App\Models\Item','order_id','id');
    }

    public function table(){
        return $this->belongsTo('App\Models\Table','table_id','id');
    }
}
