<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Persona;
use Illuminate\Support\Collection;
use DB;
use Validator;

class CBienhechor extends Controller
{
    public function index(Request $request)
    {
    	$bienhechor=DB::table('persona as p')
    	->join('status as sts','p.idstatus','=','sts.idstatus')
    	->join('tipopersona as tp','tp.idtipopersona','=','p.idtipopersona')
    	->select('p.idpersona','p.nombre','p.apellido','p.telefono','p.direccion','p.correo','sts.nombre as snombre')
 		//->where('sts.nombre','=','Activo')
 		->where('tp.idtipopersona','=',2)
 		->get();

 		$tipop=DB::table('tipopersona as tp')->where('tp.tipopersona','=','Bienhechor')->get();
 		return view('bienechor.index',["bienhechor"=>$bienhechor,"tipop"=>$tipop]);
    }

    public function nuevobienhechor(Request $request)
    {
    	//dd('prueba');
    	$this->validabienhechor($request);

    	$bienhe=new Persona;
    	$bienhe-> nombre=$request->get('nombreb');
    	$bienhe-> apellido=$request->get('apellidob');
    	$bienhe-> direccion=$request->get('direccion');
    	$bienhe-> telefono=$request->get('telefono');
    	$bienhe-> idtipopersona=$request->get('tipopersona');
    	$bienhe-> nit=$request->get('nit');
    	$bienhe-> correo=$request->get('correo');
    	$bienhe-> idstatus='1';
        $bienhe-> permanente=$request->get('tipobienhechor');
        $bienhe->save();
        //dd($bienhe);
        return response()->json($bienhe);
    }
    public function validabienhechor($request){
            $rules=[
            'nombreb' => 'required',
            'telefono' => 'required',

            ];
            $messages=[
            'required' => 'Debe ingresar :attribute.',
            ];
            $this->validate($request, $rules,$messages);        
        }
}
