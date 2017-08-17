@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')
    <div class="tab-pan active" id="contentsecundario">
 
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @include('bienechor.search')
            </div>
            <div><br></div>   
        </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div><br></div>
                    <div class="margin" id="botones_control">
                        <button class="btn btn-primary btn-addB" title="Nuevo Bienechor">Nuevo Bienhechor</button>
                    </div>
                    <div><br></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover"> 
                            <thead>
                                <th style="width: 5%">Id</th>
                                <th style="width: 20%">Nombre completo</th>
                                <th style="width: 20%">Dirección</th>
                                <th style="width: 20%">Teléfono</th>
                                <th style="width: 10%">Opciones</th>
                            </thead>
                            @foreach ($bienhechor as $em)
                                <tr class="even gradeA">
                                    <td>{{$em->idpersona}}</td>
                                    <td>{{$em->nombre.' '.$em->apellido}}</td>
                                    <td>{{$em->direccion}}</td>
                                    <td>{{$em->telefono}}</td>
                                    <td>
                                        <button class="btn btn-primary" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>
                                        <button class="btn btn-danger" id="FWEF" value="" title="Despedir" ><i class="fa fa-remove"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

               </div>           
            </div>

            <!--
            <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div> 

            </div>
            -->

            <div class="col-lg-12">
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <input type="hidden" name="idemple" id="idemple">
                            <input type="hidden" name="identifica" id="identifica">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="inputTitle"></h4>
                            </div>

                        <form role="form" id="formAgregar">
                            <div class="modal-header">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Nombre</label>
                                    <input id="nombreb" type="text" class="form-control" aria-describedby="basic-addon1">   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Apellido</label>
                                    <input id="apellidob" type="text" class="form-control" aria-describedby="basic-addon1">   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Correo</label>
                                    <input type="email" id="correo" maxlength="40" class="form-control" required>   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Teléfono</label>
                                    <input id="telefono" type="text" class="form-control" maxlength="8" aria-describedby="basic-addon1" onkeypress="return valida(event)">   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Nit</label>
                                    <input id="nit" type="text" class="form-control" maxlength="9" aria-describedby="basic-addon1">   
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Dirección</label>
                                    <input type="text" id="direccion" class="form-control">
                                </div>
                                
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">    
                                    <div class="form-group">
                                        <label>Tipo de bienhechor *</label>
                                        <select name="tipobienhechor" id="tipobienhechor" class="form-control">
                                            <option value="Permanente">Permanente</option>
                                            <option value="Ocasional">Ocasional</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" style="display: none;">    
                                    <div class="form-group">
                                        <label>Persona</label>
                                        <select name="tipopersona" id="tipopersona" class="form-control">
                                            @foreach($tipop as $tp)
                                                <option value="{{$tp->idtipopersona}}">{{$tp->tipopersona}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                          </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                            <input type="hidden" name="idE" id="idE" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="erroresModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Errores</h4>
          </div>

          <div class="modal-body">
            <ul style="list-style-type:circle" id="erroresContent"></ul>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('fin')
<meta name="_token" content="{!! csrf_token() !!}" />
@parent
<script src="{{asset('assets/js/bienhechor.js')}}"></script>
    
@endsection



