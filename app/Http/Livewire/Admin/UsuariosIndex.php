<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cajero;
use App\Models\Cliente;
use App\Models\Gerente;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    /* public $tipo = "todos";  */

    public function updatingSearch(){
        $this->resetPage();
    }
   /*  public function updatingTipo(){
        $this->resetPage();
    } */

    public function render()
    {

        /* switch ($this->tipo) { */
            $usuarios = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        /*     case 'cliente': $usuarios = Cliente::where('name', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'cajero': $usuarios = Cajero::where('name', 'like', '%' . $this->search . '%')->paginate(10); break;
            case 'gerente': $usuarios = Gerente::where('name', 'like', '%' . $this->search . '%')->paginate(10); break;
        } */

        return view('livewire.admin.usuarios-index', compact('usuarios'));
    }
}
