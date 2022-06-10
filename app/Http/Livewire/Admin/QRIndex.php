<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Table;

class QRIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $tables = Table::where('name','ilike',['%' . $this->search . '%'])->orderBy('id')->paginate(5);
        return view('livewire.admin.q-r-index', compact('tables'));
    }
}
