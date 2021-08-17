<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Menu;
use App\Models\Sopa;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        return view('admin.menus.index');
    }


    public function create()
    {
        return view('admin.menus.create');
    }


    public function store(Request $request)
    {
        $request->request->add(['user_id'=> strval(auth()->user()->id)]) ;
        /* return $request; */
        $request->validate([
            'nombre' => 'required|max:30',
            'dia' => 'required|max:30',
            'estado' => 'required|in:0,1'
        ]);
        Menu::create($request->all());
        return redirect()->route('admin.menus.index')->with('info', 'El menu se creó con éxito');
    }




    public function edit(Menu $menu)
    {

        /* $alimentos = $menu->alimentos()->pluck('alimento_id');
        $sopas = Sopa::whereIn('id', $alimentos)->get();
        return $alimentos ; */
        return view('admin.menus.edit', compact('menu'));
    }


    public function update(Request $request,Menu $menu)
    {

        $request->validate([
            'nombre' => 'required|max:30',
            'dia' => 'required|max:30',
            'estado' => 'required|in:0,1'
        ]);
        $menu->update($request->all());
        return redirect()->route('admin.menus.edit', $menu)->with('info', 'El menu se actualizo con exito');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('info', 'El menu se eliminó con éxito');
    }
}
