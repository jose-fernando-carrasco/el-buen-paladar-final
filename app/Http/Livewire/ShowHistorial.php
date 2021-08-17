<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowHistorial extends Component
{
    public function render()
    {   $array = [];
        $fechas = [];
        $user = User::find(auth()->user()->id);
        $pedidos = $user->pedidos()->where('estado', 'Finalizado')->get();
        foreach($pedidos as $pedido){
            $fecha1 = $pedido->fecha;
            array_push($fechas, $fecha1);
            $alimentos =  $pedido->alimentos()->get();
            array_push($array, $alimentos);
        }
        return view('livewire.show-historial', compact('pedidos', 'array', 'fechas'));
    }
}
