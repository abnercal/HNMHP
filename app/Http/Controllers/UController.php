<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;

use App\User;  
use App\Empleado;
use App\Persona;
use App\TipoPersona;


use DB;
use Validator;
use Illuminate\Http\File;

use Carbon\Carbon;  // para poder usar la fecha y hora
use Response;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Intervention\Image\Facades\Image as Image;

class UController extends Controller
{
    public function contenedor(Request $request)
        {
            return view('seguridad.usuario.contenedor');
        }
        public function index(Request $request)
        {
        	if($request)
        	{
                $usuarios = User::name($request->get('name'))->orderBy('id','DESC')->paginate(15);
                $roles=Role::all();
                return view('seguridad.usuario.index',compact('usuarios','roles'));  
        	}
        }

        public function buscar_usuarios($rol,$dato="")
        {
            $usuarios= User::Busqueda($rol,$dato)->paginate(15);  
            $roles=Role::all();
            $rolsel=$roles->find($rol);
            return view('seguridad.usuario.index')
            ->with("usuarios", $usuarios )
            ->with("rolsel", $rolsel )
            ->with("roles", $roles );       
        } 

        public function add()
        {
            //return view("seguridad.usuario.create",["personas"=>$personas,"articulos"=>$articulos]);
        	//$empleados=DB::table('persona')->where('tipo_persona','=','empleado')->get();
        	//return view("seguridad.usuario.create",["empleados"=>$empleados])
        	$usuario = user::all();
        	return view("seguridad.usuario.create",["usuario"=>$usuario]);
        }
        public function store(UFormRequest $request)
        {
        	$usuario=new User;
        	$usuario->name=$request->get('name');
        	$usuario->email=$request->get('email');
        	$usuario->password=bcrypt($request->get('password'));
        	$usuario->identificacion=$request->get('identificacion');
        	$usuario->save();
        	return Redirect::to('seguridad/usuario');		
        }

        public function editar_usuario($id)
        {
            $usuario=User::find($id);
            $roles=Role::all();
            return view("seguridad.usuario.editarusuario")
            ->with("usuario",$usuario)
            ->with("roles",$roles);
        }

        public function asignar_rol($idusu,$idrol){
            $usuario=User::find($idusu);
            $usuario->assignRole($idrol);

            $usuario=User::find($idusu);
            $rolesasignados=$usuario->getRoles();
            return json_encode ($rolesasignados); 
        }

        public function quitar_rol($idusu,$idrol){
            $usuario=User::find($idusu);
            $usuario->revokeRole($idrol);
            $rolesasignados=$usuario->getRoles();
            return json_encode ($rolesasignados);
        }

        public function form_nuevo_rol(){
            //carga el formulario para agregar un nuevo rol
            $roles=Role::all();
            return view("seguridad.usuario.form_nuevo_rol")->with("roles",$roles);
        }

        public function crear_rol(Request $request){
            $rol=new Role;
            $rol->name=$request->input("rol_nombre") ;
            $rol->slug=$request->input("rol_slug") ;
            $rol->description=$request->input("rol_descripcion") ;
            if($rol->save())
            {
                return view("mensajes.msj_rol_creado")->with("msj","Rol agregado correctamente") ;
            }
            else
            {
                return view("mensajes.mensaje_error")->with("msj","...Hubo un error al agregar ;...") ;
            }
        }
        public function borrar_rol($idrole){
            $role = Role::find($idrole);
            $role->delete();
            return "ok";
        }
        public function update(UsuarioFormRequest $request, $id)
        {
            $usuario=User::findOrFail($id);
        	$usuario->name=$request->get('name');
        	$usuario->email=$request->get('email');
        	$usuario->password=bcrypt($request->get('password'));
        	$usuario->id_persona=$request->get('id_persona');
        	$usuario->update();
        	return Redirect::to('seguridad/usuario');
        }
        	
        public function destroy($id)
        {
        	$usuario =DB::table('users')->where('id','=',$id)->delete();
        	return Redirect::to('seguridad/usuario');
        }

        public function cambiar_password(Request $request){
                $this->validateRequestPassword($request);
                $id=$request->get('idusuario');
                $usuario=User::find($id);
                $password=$request->input("password");
                $usuario->password=bcrypt($password);
                $r=$usuario->save();

                if($r){
                    return response()->json($usuario);
                }
                else
                {
                    return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
                }
        }
}
