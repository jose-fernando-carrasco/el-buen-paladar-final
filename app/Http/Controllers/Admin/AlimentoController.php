<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Bebida;
use App\Models\Ensalada;
use App\Models\PlatoFuerte;
use App\Models\Postre;
use App\Models\Sopa;
use App\Models\TipoAlimento;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Storage;

class AlimentoController extends Controller
{

    public function index()
    {
        return view('admin.alimentos.index');
    }


    public function create()
    {
        $tipo_alimento_id = TipoAlimento::pluck('nombre', 'id');

        return view('admin.alimentos.create', compact('tipo_alimento_id'));
    }


    public function store(Request $request)
    {


        $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'required|max:300',
            'file' => 'image|max:2048',
            'precio' => 'required|integer|between:1,200'
        ]);

        switch ($request->tipo_alimento_id) {
            case '1': $alimento = PlatoFuerte::create($request->all()); break;
            case '2': $alimento = Bebida::create($request->all()); break;
            case '3': $alimento = Ensalada::create($request->all()); break;
            case '3': $alimento = Postre::create($request->all()); break;
            case '5': $alimento = Sopa::create($request->all()); break;
        }

        if ($request->file('file')) {
            $url = Storage::put('imagenes', $request->file('file'));
            $alimento->update([
                'imagen' => $url
            ]);
        }

        return redirect()->route('admin.alimentos.index')->with('info', 'El alimento se creó con éxito');
    }



    public function edit(Alimento $alimento)
    {
        $tipo_alimento_id = TipoAlimento::pluck('nombre', 'id');

        return view('admin.alimentos.edit', compact('alimento', 'tipo_alimento_id'));
    }


    public function update(Request $request, Alimento $alimento)
    {

        $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'required|max:300',
            'file' => 'image|max:2048',
            'precio' => 'required|integer|between:1,200'
        ]);

        $alimento->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('imagenes', $request->file('file'));

            if ($alimento->imagen) {
                Storage::delete($alimento->imagen);

                $alimento->update([
                    'imagen' => $url
                ]);
            }else{
                $alimento->update([
                    'imagen' => $url
                ]);
            }
        }

        return redirect()->route('admin.alimentos.edit', $alimento)->with('info', 'El alimento se actualizo con exito');
    }


    public function destroy(Alimento $alimento)
    {
        if ($alimento->imagen) {
            Storage::delete($alimento->imagen);
        }
        $alimento->delete();
        return redirect()->route('admin.alimentos.index')->with('info', 'El alimento se eliminó con éxito');
    }
}
