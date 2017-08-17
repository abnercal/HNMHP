@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')

<div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> This is tab</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">This is second tab</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
                                        existence in this spot, which was created for the bliss of souls like mine.</p>

                                    <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
                                        the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <strong>Donec quam felis</strong>

                                    <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                    <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                </div>
                            </div>
                        </div>
                    </div>

    <div class="tabs-container" id="contentsecundario">
 
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
                        <button class="btn btn-primary btn-addB" title="Nuevo Bienechor">Nuevo Paciente</button>
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
                                <th style="width: 20%">Nombre</th>
                                <th style="width: 20%">Email</th>
                                <th>tipo_donador</th>
                                <th style="width: 10%">Opciones</th>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>Abner Calvac</td>
                                <td>bcavalc@gmail.com</td>
                                <td>Permanente</td>
                                <td>
                                    <button class="btn btn-primary" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>
                                    <button class="btn btn-danger" id="FWEF" value="" title="Despedir" ><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Luis Alberto López</td>
                                <td>llopez@gmail.com</td>
                                <td>Ocasional</td>
                                <td>
                                    <button class="btn btn-primary" title="Detalles"><i class="glyphicon glyphicon-zoom-in"></i></button>
                                    <button class="btn btn-danger" id="FWEF" value="" title="Despedir" ><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
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

                        <form role="form" id="form">
                            <div class="modal-header">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Identificación</label>
                                    <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Nit</label>
                                    <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Nombre</label>
                                    <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Apellido</label>
                                    <input id="nombreC" type="text" class="form-control" name="dias" aria-describedby="basic-addon1">   
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="control-label">Fecha ingreso</label>
                                    <input type="text" id="fecha_inicio" class="form-control" name="fechainicio">
                                </div>

                                <div class="modal-header">
                                    <label>Tipo de bienechor</label><br>
                                    <select id="select" data-style="btn-info" data-live-search="true">
                                        <option>Permanentes</option>
                                        <option>Ocasionales</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label class="control-label">Dirección</label>
                                    <input type="text" id="fecha_inicio" class="form-control" name="fechainicio">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Descripcion</label>
                                    <textarea class="form-control" placeholder=".........." id="observaciones" rows="3" maxlength="300"></textarea>
                                </div>
                          </div> 
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary btn-adddespedir" id="btnGuardarBaja">Guardar</button>
                            <input type="hidden" name="idE" id="idE" value="0"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden"  id="url_raiz_proyecto" value="{{ url("/") }}" />
    <div id="capa_modal" class="div_modal" style="display: none;"></div>
    <div id="capa_formularios" class="div_contenido" style="display: none;"></div>

@endsection

@section('fin')
    @parent

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click','.btn-addB',function(){
                    $('#inputTitle').html("Agregar nuevo bienechor");
                    $('#formAgregar').trigger("reset");
                    $('#formModal').modal('show');
            });
        });
    </script>
@endsection



