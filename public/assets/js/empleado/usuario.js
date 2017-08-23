$("#btnGuardarUsuario").click(function(e){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var urlraiz=$("#url_raiz_proyecto").val();
    var miurl=urlraiz+"/seguridad/store";
    var itemsData=[];

    $('#rolUsuario tr').each(function(){
        var id = $(this).closest('tr').find('input[type="hidden"]').val();
        valor = new Array(id);
        itemsData.push(valor);
            
    });

    var formData = {
        name: $("#name").val(),
        password: $("#password").val(),
        email: $("#email").val(),
        idpersona: $("#idpersona").val(),
        items: itemsData,
    };

    $.ajax({
        type: "POST",
        url: miurl,
        data: formData,
        dataType: 'json',

        success: function (data) {

            $('#formAgregarUsuario').trigger("reset");
            $('#formModalUsuario').modal('hide');
                            
        },
        error: function (data) {
            $('#loading').modal('hide');
            var errHTML="";
            if((typeof data.responseJSON != 'undefined')){
                for( var er in data.responseJSON){
                    errHTML+="<li>"+data.responseJSON[er]+"</li>";
                }
            }else{
                errHTML+='<li>Error</li>';
            }

            $("#erroresContentEmpleado").html(errHTML); 
            $('#erroresModalEmpleado').modal('show');
        }
    });
});





function  verinfo_usuario(arg){

  var urlraiz=$("#url_raiz_proyecto").val();
  var miurl =urlraiz+"/seguridad/editar_usuario/"+arg+""; 
   

    $("#contentsecundario").show();
    var screenTop = $(document).scrollTop();
    $("#capa_formularios").css('top', screenTop);
  $("#contentsecundario").html($("#cargador_empresa").html());

  $.ajax({
    url: miurl
  }).done( function(resul) 
  {
    $("#contentsecundario").html(resul);
  }).fail( function() 
  {
    $("#contentsecundario").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
  }) ;
}

 
 /*
    $(document).on('click','.btn-btnGuardarEmpleado',function(e){
        var itemsData=[];
        var miurl = "store";
        var urlraiz=$("#url_raiz_proyecto").val();

        $('#detalles tr').each(function(){
            var id = $(this).closest('tr').find('input[type="hidden"]').val();
            var expiration_date = $(this).find('td').eq(2).html();
            valor = new Array(id,expiration_date);
            itemsData.push(valor);
            
        });
        
        var formData = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            direccion: $('#direccion').val(),
            telefono: $('#telefono').val(),
            estadocivil: $('#estadocivil').val(),
            dpi: $('#dpi').val(),
            nit: $('#nit').val(),
            correo: $('#correo').val(),
            fecha_nacimiento: $('#birth_date').val(),
            idtipopersona: $('#idtipopersona').val(),
            fecha_inicio: $('#date_work_start').val(),
            salario: $('#salario').val(),
            idpuesto: $('#idpuesto').val(),

            items: itemsData,};
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: miurl,
            data: formData,
            dataType: 'json',
            
            success: function (data) {
                /*
                swal({
                    title:"Envio correcto",
                    text: "Gracias",
                    type: "success"
                },
                function(){
                    window.location.href="/empleado/listado"
                });*/
/*
                swal({
                    title: "¿Ingresar nuevo usuario?",
                    text: "nuevo registro de un usuario",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si",
                    closeOnConfirm: true,
                    closeOnCancel:false
                },function () {

                    var miurl=urlraiz+"/seguridad/add";
                    var errHTML="";
                    $.ajax({
                        url: miurl
                    }).done( function(resul) 
                    {
                        $("#lisadoEmp").html(resul);
                        $("#idempleado").append(resul);

                        $('#inputTitleUsuario').html("Nuevo ingreo de usuario");
                        $('#formAgregarUsuario').html(resul);
                        $('#formModalUsuario').modal('show');

                    }).fail(function() 
                    {
                        $("#lisadoEmp").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                    });
                });                
            },
            error: function (data) {
                var errHTML="";
                if((typeof data.responseJSON != 'undefined')){
                    for( var er in data.responseJSON){
                        errHTML+="<li>"+data.responseJSON[er]+"</li>";
                    }
                    }else{
                        errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
                    }
                $("#erroresContentEmpleado").html(errHTML); 
                $('#erroresModalEmpleado').modal('show');
            },
        });
    });

*/