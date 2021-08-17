<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.usuarios.index');
    }



    public function edit(User $usuario)
    {
        $roles = Role::all();

        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }


    public function update(Request $request,User $usuario)
    {
        $usuario->roles()->sync($request->roles);
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:rfc',

        ]);
        $usuario->update($request->all());
        return redirect()->route('admin.usuarios.edit', compact('usuario'))->with('info', 'El usuario se actualizo con exito');
    }


    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('info', 'El usuario se elimino con exito');
    }
}
