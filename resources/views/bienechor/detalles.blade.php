@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
        <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    @endsection

@section ('contenido')
<div class="tabs-container" id="contentsecundario">
	<div class="row">

	            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	                  <h3 class="text-center">Historial donaciones de Bienhechor</h3>
	                    <h4>Nombre Bienhechor:&nbsp;&nbsp;{{$bienhechor->nombre.' '.$bienhechor->apellido}}</h4>
	                    <h4>Teléfono:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->telefono}}</h4>
	                    <h4>Correo electronico:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->correo}}</h4>
	                    <h4>Dirección:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->direccion}}</h4>
	                    <h4>Nit:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$bienhechor->nit}}</h4>
	                    <h4>Tipo de Bienhechor:&nbsp;&nbsp;&nbsp;{{$bienhechor->permanente}}</h4>
	            	</div>
	</div>
	<div class="row"><br><br>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover "> 
                    <thead>
                        <th style="width: 2%">Id</th>
                        <th style="width: 10%">Tipo de donación</th>
                        <th style="width: 10%">Monto(monetario)</th>
                        <th style="width: 10%">fecha donativo</th>
                        <th style="width: 35%">Descripción</th>
                        <th style="width: 15%">Opciones</th>
                    </thead>
                    <tbody id="listbienhechor">
                        @foreach ($donaciones as $don)
                            <tr class="even gradeA">
                                <td>{{$don->idbienhechor}}</td>
                                <td>{{$don->donaciontipo}}</td>
                                <td>{{$don->monto}}</td>
                                <td>{{$don->fechadonacion}}</td>
                                <td>{{$don->descripcion}}</td>
                                <td>
                                    <button class="btn  btn-warning btn-md btneditb" title="Editar"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-md btneliminarb" id="FWEF" title="Eliminar" ><i class="fa fa-remove"></i></button> 	
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>           
    </div>

</div>
@endsection

@section('fin')
<meta name="_token" content="{!! csrf_token() !!}" />

@parent
<script src="{{asset('assets/js/bienhechor/bienhechor.js')}}"></script>
<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#fechadona').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
                
        });

        $("#formAgregar").validate({
                 rules: {
                    email: {
                        required: true,
                        email: true
                    }
                 }
             });
    });
</script>
@endsection