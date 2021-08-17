<?php

namespace App\Http\Livewire\Admin;

use App\Models\Mesa;
use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Models\Alimento;
use App\Models\PlatoFuerte;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\Postre;
use App\Models\Sopa;
use phpDocumentor\Reflection\Types\Null_;

class PedidosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    public $search;
    public $tipo = "Todos";

    public $activo;

    public $pedido;

    public $pedidoLlevar;

    public $vacio = "si";
    public $filtrar = "Mesas";

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingTipo()
    {
        $this->resetPage();
    }
    public function updatingFiltrar()
    {
        $this->reset('pedidoLlevar');
        $this->reset('pedido');
        $this->reset('tipo');
        $this->reset('vacio');
        $this->reset('activo');
    }



    public function mesa(Mesa $mesa)
    {
        $this->activo = $mesa->id;
        /* $this->reset('hayPedido'); */
        $this->reset('pedido');
        /* $n = Pedido::whereDate('fecha', today())->where('estado', 'Activo')->where('mesa', $this->activo)->where('estado', 'Activo')->get();
        if (isset($n[0])) {
            $this->hayPedido = true;
        } */
    }

    public function editar(Pedido $pedido)
    {

        $this->pedido = $pedido;

        $productos = $this->pedido->alimentos()->pluck('alimento_id');
        if (isset($productos[0])) {
            $this->vacio = "no";
        } else {
            $this->vacio = "si";
        }
    }

    public function quitar(Alimento $alimento)
    {
        if ($this->pedido) {
            $this->pedido->alimentos()->detach($alimento->id);
            $productos = $this->pedido->alimentos()->pluck('alimento_id');
            if (isset($productos[0])) {
            } else {
                $this->vacio = "si";
            }
        } else {
            $this->pedidoLlevar->alimentos()->detach($alimento->id);
            $productos = $this->pedidoLlevar->alimentos()->pluck('alimento_id');
            if (isset($productos[0])) {
            } else {
                $this->vacio = "si";
            }
        }
    }
    public function agregar(Alimento $alimento)
    {

        if ($this->pedido) {
            $this->pedido->alimentos()->attach($alimento->id, ['cantidad' => 10, 'precio' => 5]);
            $productos = $this->pedido->alimentos()->pluck('alimento_id');
            if (isset($productos[0])) {
                $this->vacio = "no";
            }
        } else {
            $this->pedidoLlevar->alimentos()->attach($alimento->id, ['cantidad' => 10, 'precio' => 5]);
            $productos = $this->pedidoLlevar->alimentos()->pluck('alimento_id');
            if (isset($productos[0])) {
                $this->vacio = "no";
            }
        }
    }
    public function nuevo()
    {

        $nuevo =  Pedido::create([
            'fecha' => date('Y-m-d H:i'),
            'estado' => 'Activo',
            'mesa' => $this->activo,
        ]);
        Mesa::where('id', $this->activo)->update(['mesaable_id' => $nuevo->id, 'mesaable_type' => 'App\Models\Pedido']);
    }
    public function cancelar(Pedido $pedido)
    {


        if ($pedido->estado == "Llevar") {
            Pedido::where('id', $pedido->id)->update(['estado' => 'Cancelado']);
            $this->reset('pedidoLlevar');
        } else {
            Pedido::where('id', $pedido->id)->update(['estado' => 'Cancelado']);

            $n = Pedido::whereDate('fecha', today())->where('estado', 'Activo')->where('mesa', $this->activo)->where('estado', 'Activo')->get();
            if (isset($n[0])) {
                foreach ($n as $s) {
                    Mesa::where('id', $this->activo)->update(['mesaable_id' => $s->id, 'mesaable_type' => 'App\Models\Pedido']);
                }
            } else {
                Mesa::where('id', $this->activo)->update(['mesaable_id' => Null, 'mesaable_type' => Null]);
            }
            $this->reset('pedido');
        }

    }
    //Llevar
    public function nuevoLlevar()
    {
        $nuevo =  Pedido::create([
            'fecha' => date('Y-m-d H:i'),
            'estado' => 'Llevar',
        ]);
    }
    public function editarLlevar(Pedido $pedido)
    {
        $this->pedidoLlevar = $pedido;
        $productos = $this->pedidoLlevar->alimentos()->pluck('alimento_id');
        if (isset($productos[0])) {
            $this->vacio = "no";
        } else {
            $this->vacio = "si";
        }
    }


    public function render()
    {
        $mesas = Mesa::all();
        $pedidos = Pedido::whereDate('fecha', today())->where('estado', 'Activo')->whereIn('mesa', [$this->activo])->get();
        if ($this->filtrar == "Mesas") {
            if (isset($this->pedido)) {


                $arrayAlimentos = $this->pedido->alimentos()->pluck('alimento_id');

                switch ($this->tipo) {
                    case 'Todos':
                        $alimentoTodos = Alimento::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'PlatoFuerte':
                        $alimentoTodos = PlatoFuerte::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Bebida':
                        $alimentoTodos = Bebida::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Ensalada':
                        $alimentoTodos = Ensalada::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Postre':
                        $alimentoTodos = Postre::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Sopa':
                        $alimentoTodos = Sopa::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                }

                if ($this->vacio == "si") {
                    return view('livewire.admin.pedidos-index', compact('pedidos', 'mesas', 'alimentoTodos'));
                } else {
                    $alimentos = Alimento::WhereIn('id', $arrayAlimentos)->get();
                    return view('livewire.admin.pedidos-index', compact('pedidos', 'mesas', 'alimentos', 'alimentoTodos'));
                }
            } else {
                return view('livewire.admin.pedidos-index', compact('pedidos', 'mesas'));
            }
        } else { /* LLevar */
            $pedidos = Pedido::whereDate('fecha', today())->where('estado', 'Llevar')->paginate(10);
            if (isset($this->pedidoLlevar)) {
                $arrayAlimentos = $this->pedidoLlevar->alimentos()->pluck('alimento_id');
                switch ($this->tipo) {
                    case 'Todos':
                        $alimentoTodos = Alimento::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'PlatoFuerte':
                        $alimentoTodos = PlatoFuerte::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Bebida':
                        $alimentoTodos = Bebida::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Ensalada':
                        $alimentoTodos = Ensalada::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Postre':
                        $alimentoTodos = Postre::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                    case 'Sopa':
                        $alimentoTodos = Sopa::where('nombre', 'like', '%' . $this->search . '%')->WhereNotIn('id', $arrayAlimentos)->paginate(10);
                        break;
                }
                if ($this->vacio == "si") {
                    return view('livewire.admin.pedidos-index', compact('pedidos', 'alimentoTodos'));
                } else {
                    $alimentos = Alimento::WhereIn('id', $arrayAlimentos)->get();
                    return view('livewire.admin.pedidos-index', compact('pedidos', 'alimentos', 'alimentoTodos'));
                }
            } else {

                return view('livewire.admin.pedidos-index', compact('pedidos'));
            }
        }
    }
}
