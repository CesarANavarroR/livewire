<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Saucer;
use App\Models\Saucer_Type;
use App\Models\Table;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($slug){
        $table = Table::all()->where('slug',$slug)->first();
        return view('menu.index',compact('table'));
    }

    public function category(Request $request,$slug)
    {
        if(request('order')){
            $orders = ['actual'=>1,'total'=>request('order')];
            $details = Order_Detail::created([]);
        }else{
            $orders = request('orders');
            $details = request('details');
        }
        $table = Table::all()->where('slug',$slug)->first();
        $Typesaucer = Saucer_Type::all();
        return view('menu.category',compact('orders','table','Typesaucer','details'));
    }

    public function show(Request $request, $slug)
    {
        $orders = request('orders');
        $details = request('details');
        $table = Table::all()->where('slug',$slug)->first();
        $saucers = Saucer::all()->where('saucer_type_id',request('id'));
        $category = Saucer_Type::all()->where('id',request('id'))->first();
        return view('menu.saucer',compact('orders','table','saucers','category','details'));
    }

    public function orden(Request $request,$slug)
    {
        $details = Order_Detail::where('id',request('details'))->first();
        $table = Table::all()->where('slug',$slug)->first();
        $order = request('order');
        if($details && $order){
            return view('menu.miorden',compact('table','details','order'));
        }else{
            return view('menu.index',compact('table'));
        }
    }

    public function storage(Request $request,$slug)
    {
        $details = Order_Detail::where('id',request('details'))->first();
        foreach($details->orders as $order){
            foreach($order->items as $item){
                if($item->state_id<2){
                    $item->state_id = 2;
                    $item->save();
                }
            }
        }
        $order = request('order');
        $details = Order_Detail::where('id',request('details'))->first();
        $table = Table::all()->where('slug',$slug)->first();
        return redirect()->route('menu.miorden.index',compact('table','details','order'));
    }
}
