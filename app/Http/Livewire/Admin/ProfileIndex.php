<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\WithPagination;

class ProfileIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name','ilike',['%' . $this->search . '%'])->orderBy('id')->paginate(5);
        return view('livewire.admin.profile-index',compact('users'));
    }
}
