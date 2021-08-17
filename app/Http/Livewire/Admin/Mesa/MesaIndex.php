<?php

namespace App\Http\Livewire\Admin\Mesa;

use App\Models\Mesa;
use Livewire\Component;
use Livewire\WithPagination;
class MesaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $activo1;
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
       $mesas=Mesa::all();
        return view('livewire.admin.mesa.mesa-index',compact('mesas'));
    }
}
