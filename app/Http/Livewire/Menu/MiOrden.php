<?php

namespace App\Http\Livewire\Menu;

use App\Models\Item;
use App\Models\Order;
use App\Models\Order_Detail;
use Livewire\Component;

class MiOrden extends Component
{
    public $details;
    public $table;
    public $order;
    public $subtotal = [];
    public $total = "";

    public function delete(Item $item,Order $order)
    {
        if($order->items->count()==1){
            $order->delete();
        }else{
            $item->delete();
        }
        $this->render();
    }

    public function render()
    {
        $this->details = Order_Detail::where('id',$this->details->id)->first();
        return view('livewire.menu.mi-orden');
    }
}
