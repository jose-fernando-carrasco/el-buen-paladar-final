<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.mesas.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.mesas.create');
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
            'capacidad' => 'required',
            'ubicacion' => 'required',
        ]);

        $mesas=new Mesa();
        $mesas->capacidad=$request->capacidad;
        $mesas->ubicacion=$request->ubicacion;
        $mesas->status=false;
        $mesas->save();

        return redirect()->route('admin.mesas.index')->with('info', 'La mesa se creó con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        //
        $mesa_id = Mesa::pluck('capacidad', 'ubicacion','id');

        return view('admin.mesas.edit', compact('mesa', 'mesa_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        $request->validate([
            'capacidad' => 'required',
            'ubicacion' => 'required',
        ]);


        $mesa->capacidad=$request->capacidad;
        $mesa->ubicacion=$request->ubicacion;
        $mesa->save();

        return redirect()->route('admin.mesas.edit', $mesa)->with('info', 'La mesa se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        //
        $mesa->delete();
        return redirect()->route('admin.mesas.index')->with('info', 'La mesa se eliminó con éxito');

    }
}
