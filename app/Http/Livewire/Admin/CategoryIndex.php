<?php

namespace App\Http\Livewire\Admin;

use App\Models\Saucer_Type;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $categorys = Saucer_Type::where('name','ilike',['%' . $this->search . '%'])->paginate(5);
        return view('livewire.admin.category-index',compact('categorys'));
    }
}
