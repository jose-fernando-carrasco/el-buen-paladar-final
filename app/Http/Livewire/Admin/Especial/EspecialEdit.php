<?php

namespace App\Http\Livewire\Admin\Especial;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alimento;
use App\Models\PlatoFuerte;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\Postre;
use App\Models\Sopa;

class EspecialEdit extends Component
{
    use WithPagination;

    protected $listeners = ['render'];

    protected $paginationTheme = "bootstrap";

    public $search1= "";
    public $tipo1 = "Todos";

    public $especiale;
    public $productos;


    public function updatingSearch1(){
        $this->resetPage();
    }
    public function updatingTipo1(){
        $this->resetPage();
    }

    public function quitar(Alimento $alimento){
        $this->especiale->alimentos()->detach($alimento->id);
        $this->emit('render');
    }
    public function render()
    {
        $this->productos = $this->especiale->alimentos()->pluck('alimento_id');

        switch ($this->tipo1) {
            case 'Todos': $especialMenu = Alimento::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'PlatoFuerte': $especialMenu = PlatoFuerte::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Bebida': $especialMenu = Bebida::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Ensalada': $especialMenu = Ensalada::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Postre': $especialMenu = Postre::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Sopa': $especialMenu = Sopa::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
        }
        return view('livewire.admin.especial.especial-edit', compact('especialMenu'));
    }
}
