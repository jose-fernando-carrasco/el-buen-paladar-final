<?php

namespace App\Http\Livewire\Admin\Menu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alimento;
use App\Models\PlatoFuerte;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\Postre;
use App\Models\Sopa;

class AlimentosShow extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $tipo = "Todos";
    public $menu;
    public $productos;

    protected $listeners = ['render'];

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingTipo(){
        $this->resetPage();
    }

    public function agregar(Alimento $alimento){
        $this->menu->alimentos()->attach($alimento->id, ['cantidad' => 10]);

        $this->emit('render');

    }

    public function render()
    {
        $this->productos = $this->menu->alimentos()->pluck('alimento_id');

        switch ($this->tipo) {
            case 'Todos': $alimentos = Alimento::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
            case 'PlatoFuerte': $alimentos = PlatoFuerte::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
            case 'Bebida': $alimentos = Bebida::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
            case 'Ensalada': $alimentos = Ensalada::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
            case 'Postre': $alimentos = Postre::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
            case 'Sopa': $alimentos = Sopa::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $this->productos)->paginate(10); break;
        }
        return view('livewire.admin.menu.alimentos-show', compact('alimentos'));
    }
}
