<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::where('name','ilike',['%' . $this->search . '%'])->where('name','!=','root')->paginate(5);
        return view('livewire.admin.role-index',compact('roles'));
    }
}
