<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Pedido;
use Illuminate\Support\Carbon;
use App\Models\Alimento;

use function PHPUnit\Framework\isEmpty;

class PedidoController extends Controller
{

    public function index()
    {
        /* $n =Pedido::whereDate('fecha', today())->where('estado', 'Activo')->where('mesa', 7)->where('estado', 'Activo')->get();
        if (isset($n[0])) {
            foreach($n as $s){
                Mesa::where('id', 7)->update(['mesaable_id' => $s->id, 'mesaable_type' => 'App\Models\Pedido']);
            }

        } else {
            Mesa::where('id', 7)->update(['mesaable_id' => Null, 'mesaable_type' => Null]);
        }
        return $n; */
        return view('admin.pedidos.index');
    }

}
