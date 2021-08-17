<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Reserva;
use App\Notifications\reservanotify;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view('admin.reservas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'mesas' => 'required',
            'id' => 'required',
            'nombre' => 'required',
       ]);


       $reserva=Reserva::create([
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'nombre' => $request->nombre,
        'user_id' => $request->id,
         ]);


       foreach($request->mesas as $mesa){
            $mesas=Mesa::find($mesa);
               $mesas->mesaable_id=$reserva->id;
               $mesas->mesaable_type=Reserva::class;
               $mesas->save();
       }

      return redirect()->back()->with('info','Espere la notificacion de su reserva');


    }
    public function activar(Reserva $reserva){
           foreach($reserva->mesas()->pluck('id') as $reser){
               $reservas=Mesa::find($reser);
               $reservas->status=true;
               $reservas->save();
           }
           auth()->user()->notify(new reservanotify($reserva));
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
        $this->activar($reserva);

        return redirect()->route('admin.reservas.index')->with('info', 'Reserva Confirmada con exito');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reservas)
    {
        //
        $reservas->delete();
        return redirect()->route('admin.reservas.index')->with('info', 'La reserva se eliminó con éxito');

    }
}

