<?php

namespace App\Http\Livewire\Payment;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
    public $details;
    public $items;
    public $propina ="";
    public $subtotal=[];
    public $total=[];
    public $client=[[]];
    
    public function changeState($items)
    {
        foreach($items as $item){
            $item = Item::where('id',$item)->first();
            $item->state_id = 5;
            $item->save();
        }
        $this->render();
;    }

    public function render()
    {
        $this->details = collect([]);
        $items=Item::all()->where('state_id',4);
        foreach($items as $item)
        {
            $this->details->push($item->order->details);
        }
        $this->details = $this->details->unique();
        $this->details = $this->details->values()->all();
        $this->items = $items;
        return view('livewire.payment.index');
    }
}
