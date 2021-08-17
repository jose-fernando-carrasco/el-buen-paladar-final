<?php

namespace App\Http\Livewire\Admin\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alimento;
use App\Models\PlatoFuerte;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\Postre;
use App\Models\Sopa;

class MenusEdit extends Component
{
    use WithPagination;

    protected $listeners = ['render'];

    protected $paginationTheme = "bootstrap";

    public $search1= "";
    public $tipo1 = "Todos";

    public $menu;
    public $productos;


    public function updatingSearch1(){
        $this->resetPage();
    }
    public function updatingTipo1(){
        $this->resetPage();
    }

    public function quitar(Alimento $alimento){
        $this->menu->alimentos()->detach($alimento->id);
        $this->emit('render');
    }


    public function render()
    {
        $this->productos = $this->menu->alimentos()->pluck('alimento_id');

        switch ($this->tipo1) {
            case 'Todos': $alimentosMenu = Alimento::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'PlatoFuerte': $alimentosMenu = PlatoFuerte::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Bebida': $alimentosMenu = Bebida::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Ensalada': $alimentosMenu = Ensalada::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Postre': $alimentosMenu = Postre::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
            case 'Sopa': $alimentosMenu = Sopa::where('nombre', 'like', '%' . $this->search1 . '%')->WhereIn('id', $this->productos)->paginate(10); break;
        }


        return view('livewire.admin.menu.menus-edit', compact('alimentosMenu'));
    }
}
