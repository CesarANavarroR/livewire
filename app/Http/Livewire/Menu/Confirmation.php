<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class Confirmation extends Component
{
    public $table;
    public $details;
    public $order;

    public function render()
    {
        return view('livewire.menu.confirmation');
    }
}
