<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alimento;
use App\Models\PlatoFuerte;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\Postre;
use App\Models\Sopa;

class AlimentosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $tipo = "Todos";

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingTipo(){
        $this->resetPage();
    }

    public function render()
    {
        switch ($this->tipo) {
            case 'Todos': $alimentos = Alimento::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'PlatoFuerte': $alimentos = PlatoFuerte::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'Bebida': $alimentos = Bebida::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'Ensalada': $alimentos = Ensalada::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'Postre': $alimentos = Postre::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'Sopa': $alimentos = Sopa::where('nombre', 'like', '%' . $this->search . '%')->paginate(10); break;
        }

        return view('livewire.admin.alimentos-index', compact('alimentos'));
    }
}
