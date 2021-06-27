<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $users;

    public function render()
    {
        $search='%'.$this->search.'%';
        $this->users = User::where('name','like',$search)->orderBy('name','asc')->get();
        return view('livewire.search');
    }
    
    public function close()
    {
        $this->reset('search');
    }
}
