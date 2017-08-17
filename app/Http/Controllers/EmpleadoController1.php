<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoPersona;

class EmpleadoController1 extends Controller
{
    public function index(Request $request)
    {
        return view('empleado.indexempleado');
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','!=','2');
        return view('empleado.create')->with("tipopersona", $tipopersona);
    }

    public function store()
    {}

    public function update()
    {}

    public function delate()
    {}   

}
