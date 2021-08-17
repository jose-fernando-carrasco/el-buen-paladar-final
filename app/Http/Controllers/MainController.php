<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Mesa;

class MainController extends Controller
{
   /*  public function login(){

        return view('auth.autentificarse');
    } */
    public function platillos(){


        return view('main.platillos');
    }
    public function bebidas(){


        return view('main.bebidas');
    }
    public function postres(){


        return view('main.postres');
    }
    public function especiales(){


        return view('main.especiales');
    }
    public function reservas(){

        $mesas = Mesa::where('status','=','false')->get();

        return view('main.reservas',compact('mesas'));
    }
    public function historial(){


        return view('main.historial');
    }

}
