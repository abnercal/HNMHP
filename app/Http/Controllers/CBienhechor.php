<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use Illuminate\Support\Collection;
use DB;

class CBienhechor extends Controller
{
    public function index(Request $request)
    {
    	$bienhechor=DB::table('persona as p')
    	->join('status as sts','p.idstatus','=','sts.idstatus')
    	->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
    	->join('donacion as don','p.idpersona','=','don.idpersona')
    	->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.correo','don.fechadonacion','sts.nombre as snombre')
 		->where('sts.nombre','=','Activo')
 		->where('tp.tipopersona','=','Bienhechor')
 		->paginate(20);

 		return view('bienechor.index',["bienhechor"=>$bienhechor]);
    }
}
