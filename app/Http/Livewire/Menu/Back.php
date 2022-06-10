<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;

class Back extends Component
{
    public $table;

    public $open = false;

    public function render()
    {   

        return view('livewire.menu.back',['table'=>$this->table]);
    }
}
