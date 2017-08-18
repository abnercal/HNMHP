@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')

<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="active" data-toggle="tab" aria-expanded="false">
            <a data-toggle="tab" aria-expanded="false" onclick="cargar_formulario(4);">
                <span class="visible-xs"><i class="md md-perm-contact-cal"></i></span>
                <span class="hidden-xs">Solicitados</span>
            </a>
        </li>
    </ul>
    <div class="tab-content" id="contentsecundario">
        <div id="tab-1" class="tab-pane active">
            <div class="panel-body">
				<div class="tab-pan active" id="contentsecundario">
				    @if(isset($usuarios))

				        <div class="row">
				        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                @include('seguridad.usuario.search')

				        	</div>
				            <div><br></div>
				   
				        </div>

				        @if(count($usuarios) > 0)

				            <div class="row">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div><br></div>
				                    <div class="margin" id="botones_control">
				                        @role('informatica')

				                        <a href="usuario/create" class="btn btn-xs btn-primary">Agregar Usuarios</a>
				                        <!--<a href="{{ url("/listado_usuarios") }}" class="btn btn-xs btn-primary" >Listado Usuarios</a> -->
				                        <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Roles</a> 
				                        <!--<a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Permisos</a>-->
				                        @endrole
				                    </div>
				                    <div><br></div>
				                </div>
				            </div>

				            <div class="ibox-content">
                    			<div class="table-responsive">
                        			<table class="table table-striped table-bordered table-hover dataTables-example" >
				                            <thead >
				                                <th class="success" style="width: 5%">Id</th>
				                                <th class="success" style="width: 20%">Nombre</th>
				                                <th class="success" style="width: 20%">Email</th>
				                                <th class="success" >Roles</th>
				                                <th class="success" style="width: 5%">Opciones</th>
				                            </thead>

				                                @foreach ($usuarios as $usu)
				                                    <tr>
				                                        <td>{{$usu->id}}</td>
				                                        <td class="mailbox-messages mailbox-name"><a style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $usu->name  }}</a></td>
				                                        <td style="width: 20%s">{{$usu->email}}</td>
				                                        <td><span class="label label-success">
				                                        @foreach($usu->getRoles() as $roles)
				                                            {{  $roles.","  }}
				                                        @endforeach
				                                        </span></td>
				                                        <td style="width: 5%">
				                                            <button class="btn  btn-default btn-xs" onclick="verinfo_usuario({{$usu->id }})"><i class="fa fa-pencil"></i></button>
				                                            <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal" class="on-default remove-row"><i class="fa fa-trash-o danger"></i></a>
				                                        </td>                     
				                                    </tr>
				                                    @include('seguridad.usuario.modal')
				                                @endforeach
				                    </table>
				                {{$usuarios->render()}}
				                </div>
				            </div>           
				        @else
				            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 
				        @endif
				    @endif
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('fin')
    @parent
        <meta name="_token" content="{!! csrf_token() !!}" />

@endsection