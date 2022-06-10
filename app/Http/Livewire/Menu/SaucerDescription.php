<?php

namespace App\Http\Livewire\Menu;

use App\Models\Item;
use App\Models\Order;
use Livewire\Component;

class SaucerDescription extends Component
{
    public $saucer;
    public $order;
    public $table;
    public $details;
    public $index;
    public $saucers;
    public $open = false;
    public $note ='';
    public $limit;

    public function save($saucer){
        $pedido = Order::where('order_detail_id',$this->details)->where('name',$this->order);
        if($pedido->count()>0){
            $pedido = $pedido->first();
            $item = new Item;
            $item->note = $this->note;
            $item->state_id = 1;
            $item->saucer_id = $saucer;
            $item->order_id = $pedido->id;
            $item->save();
        }else{
            $order = new Order;
            $order->name = $this->order;
            $order->table_id = $this->table->id;
            $order->order_detail_id = $this->details;
            $order->save();

            $item = new Item;
            $item->note = $this->note;
            $item->state_id = 1;
            $item->saucer_id = $saucer;
            $item->order_id = $order->id;
            $item->save();
        }
        $this->reset(['open','note']);
    }

    public function increment(){
        if($this->index<($this->limit-1)){
            $this->index++;
        }
        else{
            $this->index=0;
        }
    }

    public function decrement(){
        if($this->index>0){
            $this->index--;
        }
        else{
            $this->index=$this->limit-1;
        }
    }

    public function render()
    {
        return view('livewire.menu.saucer-description');
    }
}
