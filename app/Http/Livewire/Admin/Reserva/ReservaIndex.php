<?php

namespace App\Http\Livewire\Admin\Reserva;

use App\Models\Reserva;
use Livewire\Component;
use Livewire\WithPagination;
class ReservaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $reservas=Reserva::where('nombre', 'like', '%' . $this->search . '%')
        ->paginate(10);
        return view('livewire.admin.reserva.reserva-index',compact('reservas'));
    }
 
}
