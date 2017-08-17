<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController1 extends Controller
{
    public function index(Request $request)
    {
        return view('empleado.indexempleado');
    }

    public function add(Request $request)
    {
        return view('empleado.create');
    }

    public function store()
    {}

    public function update()
    {}

    public function delate()
    {}   

}
