@extends ('layouts.index')

@section('estilos')
    @parent
        <!-- <link href="{{asset('assets/plugins/select2/select2.css')}}" rel="stylesheet" /> -->
    @endsection

@section ('contenido')
         
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
            	<label for="stock">direccion</label>
            	<input type="text" name="direccion"  class="form-control" placeholder="...">
            </div>
    	</div>
        
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">telefono</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">estado civil</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">dpi</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">nit</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">correo</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">fecha nacimiento</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="descripcion">puesto</label>
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
            	<label for="descripcion">Fecha inicio labores</label>
            	<input type="text" name="telefono"  class="form-control" placeholder="...">
            </div>
    	</div>

    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    	    <div class="form-group">
            	<label for="imagen">Imagen</label>
            	<input type="file" name="imagen" class="form-control">
            </div>
    	</div>
    	

    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	    <div><br></div>
    		<div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
		</div>
    </div>      
           
            


@endsection

@section('fin')
    @parent
@endsection