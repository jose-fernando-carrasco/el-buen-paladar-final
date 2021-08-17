<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OfertaEspecial;

class EspecialController extends Controller
{
    public function index()
    {
        return view('admin.especiales.index');
    }


    public function create()
    {
        return view('admin.especiales.create');
    }


    public function store(Request $request)
    {
        $request->request->add(['user_id'=> strval(auth()->user()->id)]) ;
        $request->request->add(['fecha_inicio'=> date('Y-m-d')]) ;
        /* return $request; */
        $request->validate([
            'nombre' => 'required|max:30',
            'estado' => 'required|in:0,1',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);
        OfertaEspecial::create($request->all());
        return redirect()->route('admin.especiales.index')->with('info', 'El menu especial se creó con éxito');
    }




    public function edit(OfertaEspecial $especiale)
    {

        /* $alimentos = $menu->alimentos()->pluck('alimento_id');
        $sopas = Sopa::whereIn('id', $alimentos)->get();
        return $alimentos ; */
        return view('admin.especiales.edit', compact('especiale'));
    }


    public function update(Request $request,OfertaEspecial $especiale)
    {
        $request->request->add(['fecha_inicio'=> date('Y-m-d')]) ;
        /* return $request; */
        $request->validate([
            'nombre' => 'required|max:30',
            'estado' => 'required|in:0,1',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $especiale->update($request->all());
        return redirect()->route('admin.especiales.edit', $especiale)->with('info', 'La oferta especial se actualizo con exito');
    }

    public function destroy(OfertaEspecial $especiale)
    {
        $especiale->delete();
        return redirect()->route('admin.especiales.index')->with('info', 'El menu especial se eliminó con éxito');
    }
}
