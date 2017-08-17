@extends ('layouts.index')

@section('estilos')
    @parent


    <link href="{{asset('assets/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/plugins/footable/footable.core.css')}}" rel="stylesheet">


        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')


<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="ibox-content m-b-sm border-bottom">
        <div class="box-header with-border my-box-header">
            <h2 class="box-title"><strong>Agregar nuevo empleado</strong></h2>
        </div>

                <div class="panel-body">     
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" placeholder="..">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Apellido</label>
                                <input type="text" name="apellido" class="form-control" placeholder="...">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="stock">Direccion</label>
                                <input type="text" name="direccion"  class="form-control" placeholder="...">
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Telefono</label>
                                <input type="text" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Estado civil</label>
                                <select name="idpersona" id="idpersona" class="form-control select2" data-live-search="true">
                                    <option value="Soltero">Soltero</option>
                                    <option value="casado">Casado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">DPI</label>
                                <input type="text" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Nit</label>
                                <input type="text" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Correo electronico</label>
                                <input type="email" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Fecha nacimiento</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Puesto</label>
                                <input type="text" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="descripcion">Salario</label>
                                <input type="text" name="telefono"  class="form-control" placeholder="...">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="date_added">Fecha inicio labores</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/04/2014">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">

                            <label>Tipo Persona</label>
                                <select name="idtipopersona" id="idtipopersona" class="form-control select2" data-live-search="true">
                                @if (isset($tipopersona))
                                @foreach($tipopersona as $tip)
                                    <option value="{{$tip->idtipopersona}}">{{$tip->tipopersona}}</option>
                                @endforeach
                                @endif
                                </select>
                        </div>

                        <!--

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" name="imagen" class="form-control">
                            </div>
                        </div>
                        -->

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div><br></div>
                            <div class="form-group">
                                <button class="btn btn-primary"  type="button" id="btnGuardarEmpleado">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>       

@endsection

@section('fin')
    @parent


    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/footable/footable.all.min.js')}}"></script>

    <script>
        $(document).ready(function() {



            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format:"dd/mm/yyyy",
                languaje:"es"
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format:"dd/mm/yyyy",
                languaje:"es"

            });

        });

    </script>


@endsection