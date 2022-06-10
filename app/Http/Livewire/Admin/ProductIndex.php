<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Saucer;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Saucer::where('name','ilike',['%' . $this->search . '%'])->orderBy('id')->paginate(5);
        return view('livewire.admin.product-index',compact('products'));
    }
}
