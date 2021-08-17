<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Cuenta;
use App\Models\Mesa;
use App\Models\Pedido;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Null_;

class CuentasIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $search;

    public $cuenta1;
    public $activo;
    public $suma;
    public $llevar;


    public function updatingSearch()
    {
        $this->resetPage();
        $this->reset('cuenta1');
    }

    public function crear(Mesa $mesa)
    {
        $this->activo = $mesa;
        $cuenta = Cuenta::create(['fecha' => date('Y-m-d H:i'), 'tipo' => 'Mesa']);

        $pedidos = Pedido::whereDate('fecha', today())->where('estado', 'Activo')->where('mesa', $mesa->id)->get();
        foreach ($pedidos as $pedido) {
            Pedido::where('id', $pedido->id)->update(['cuenta_id' => $cuenta->id, 'estado' => 'Finalizado']);
        }
        Mesa::where('id', $mesa->id)->update(['mesaable_id' => Null, 'mesaable_type' => Null]);
    }

    public function ver(Cuenta $cuenta)
    {
        $this->cuenta1 = $cuenta;
        $array = [];
        $suma = 0;
        $pedidos = $this->cuenta1->pedidos()->get();
        foreach ($pedidos as $pedido) {
            $array1 = $pedido->alimentos()->get();
            array_push($array, $array1);
        }
        foreach ($array as $alimentos) {
            foreach ($alimentos as $alimento) {
                $suma = $suma + intval($alimento->precio);
            }
        }
        $this->suma = $suma;
        Cuenta::where('id', $cuenta->id)->update(['total' => $suma]);
    }

    public function agregarllevar(){

        $cuenta = Cuenta::create(['fecha' => date('Y-m-d H:i'), 'tipo' => 'Llevar']);
        $pedido = Pedido::where('id', $this->llevar)->first();
        Pedido::where('id', $pedido->id)->update(['cuenta_id' => $cuenta->id, 'estado' => 'Finalizado']);
        $this->reset('llevar');
    }

    public function render()
    {

            $cuentas = Cuenta::whereDate('created_at', today())->where('id', 'like', '%' . $this->search . '%')
                                        ->where('tipo', '!=', 'Cancelado')->latest()->paginate(10);
            $mesas = Mesa::whereNotNull('mesaable_id')->get();
            if (isset($this->cuenta1)) {
                $array = [];

                $pedidos = $this->cuenta1->pedidos()->get();

                foreach ($pedidos as $pedido) {
                    $array1 = $pedido->alimentos()->get();
                    array_push($array, $array1);
                }

                return view('livewire.admin.cuentas-index', compact('cuentas', 'array', 'mesas'));
            } else {

                return view('livewire.admin.cuentas-index', compact('cuentas', 'mesas'));
            }

    }
}
