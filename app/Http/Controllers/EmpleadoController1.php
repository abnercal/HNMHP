<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoPersona;
use App\Puesto;
use App\TipoAntecedente;

class EmpleadoController1 extends Controller
{
    public function index(Request $request)
    {
        return view('empleado.indexempleado');
    }

    public function add(Request $request)
    {
        $tipopersona = TipoPersona::all()->where('idtipopersona','!=','2');
        $puesto = Puesto::all();
        $tipoantecedente = TipoAntecedente::all();
        //return view('empleado.create')->with("tipopersona", $tipopersona);
        return view('empleado.create',["tipopersona"=>$tipopersona,"puesto"=>$puesto,"tipoantecedente"=>$tipoantecedente]);

    }

    public function store()
    {}

    public function update()
    {}

    public function delate()
    {}   

}
