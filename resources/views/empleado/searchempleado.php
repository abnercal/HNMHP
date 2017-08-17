    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Listado de empleados y practicantes </h3>
            <div class="navbar-form navbar-left pull-rigth">
                                <input type="text" class="form-control" id="searchText" name="searchText" placeholder="Buscar..."> 

           
                <button type="button" class="btn btn-default" onclick="buscarempleado();">Buscar</button>
            </div>

            <div class="navbar-form navbar-left pull-rigth">
                    <button class="btn btn-primary btn-addB" title="Nuevo Empleado">Nuevo Empleado</button>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript"> $(document).ready(function() {

            $(".select2").select2();

            $('#searchText').keypress(function(e){   
               if(e.which == 13){      
                 buscarempleado();      
               }   
              });    
            
        });</script>