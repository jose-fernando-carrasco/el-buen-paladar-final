<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuenta;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Pedido;

class CuentaController extends Controller
{

    public function index()
    {
       /* $pedido = Pedido::where('id' , 8)->first();
        $pedido->cuenta_id = 11;
        $pedido->save(); */
        /*  $cuenta= Cuenta::create(['fecha' => date('y-m-d H:i')]);

         $pedidos = Pedido::whereDate('fecha', today())->where('estado', 'Activo')->where('mesa', 7)->get();

        foreach($pedidos as $pedido){

            Pedido::where('id', $pedido->id)->update(['cuenta_id' => $cuenta->id]);
        }
        return $pedidos; */



        return view('admin.cuentas.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
