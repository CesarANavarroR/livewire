<?php

namespace App\Http\Livewire\Kitchen;

use App\Models\Item;
use App\Models\State;
use Livewire\Component;

class Index extends Component
{
    public $status;
    public $items;

    public function changeState($id,$item)
    {
        $item = Item::where('id',$item)->first();
        $item->state_id = $id;
        $item->save();
        $this->render();
;    }

    public function render()
    {
        $this->status = collect([]);
        $first=Item::all()->where('state_id',3);
        $items=Item::all()->where('state_id',2)->union($first);
        foreach($items as $item)
        {
            $this->status->push($item->order->details);
        }
        $this->status = $this->status->unique();
        $this->status = $this->status->values()->all();
        $this->items = $items;
        return view('livewire.kitchen.index');
    }
}
