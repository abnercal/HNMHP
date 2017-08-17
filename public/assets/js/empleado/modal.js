function cargarmodalempleado(arg){
	if(arg==1){
		$('#inputTitleUsuario').html("Nuevo ingreo de usuario");
	    $('#formAgregarUsuario').trigger("reset");
	    $('#formModalUsuario').modal('show');
	}
}
