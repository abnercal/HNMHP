function cargarpersona(listado){
	$("#profile").html($("#cargador_empresa").html());
    if(listado==1){var url = "empleado";}
    $.get(url,function(resul){
    $("#profile").html(resul);
    });
}

function cargar_formularioRH(arg){
    var urlraiz=$("#url_raiz_proyecto").val();

    $("#capa_modal").show();
    $("#capa_formularios").show();
    var screenTop = $(document).scrollTop();
    $("#capa_formularios").css('top', screenTop);
    $("#capa_formularios").html($("#cargador_empresa").html());
    //if(arg==1){ var miurl=urlraiz+"/form_nuevo_usuario"; }
    if(arg==1){ var miurl=urlraiz+"/empleado/empleados"; }
    if(arg==2){ var miurl=urlraiz+"/empleado/debaja"; }
    if(arg==3){ var miurl=urlraiz+"/empleado/rechazados";}
    if(arg==4){ var miurl=urlraiz+"/empleado/indexnombramiento"; }

    $.ajax({
      url: miurl
    }).done( function(resul) 
    {
      $("#capa_formularios").html(resul);
    }).fail( function() 
    {
      $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
    }) ;
  }

            function valida(e){
                tecla = e.keyCode || e.which;
                tecla_final = String.fromCharCode(tecla);
                //Tecla de retroceso para borrar, siempre la permite
                if (tecla==8 || tecla==37 || tecla==39 ||tecla==46 ||tecla==9)
                {
                    return true;
                } 
                // Patron de entrada, en este caso solo acepta numeros
                patron =/[0-9]/;
                //patron =/^\d{9}$/;
                return patron.test(tecla_final);
            }
            function anular(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                return (tecla != 13);
            }
            
            function anularEspacios(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                return (tecla == 8);
            }               

            //Se utiliza para que el campo de texto solo acepte letras
            function validaL(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ63";//Se define todo el abecedario que se quiere que se muestre.
                especiales = [8, 37, 39, 46, 9]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.
                tecla_especial = false
                for(var i in especiales) {
                    if(key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if(letras.indexOf(tecla) == -1 && !tecla_especial){
                //alert('Tecla no aceptada');
                    return false;
                }
            }

               
                $('#btnAgregarPer').click(function(){
                    //var idacad=$(this).val();
                    var miurl="listardgenerales";
                    $.get(miurl, function(data){
                        console.log(data);
                        $('#identificacio').val(data.identificacion);
                        $('#idper').val(data.identificacion);
                        $('#nit').val(data.nit);
                        $('#nombre1').val(data.nombre1);
                        $('#nombre2').val(data.nombre2);
                        $('#nombre3').val(data.nombre3);
                        $('#apellido1').val(data.apellido1);
                        $('#apellido2').val(data.apellido2);
                        $('#apellido3').val(data.apellido3);
                        $('#barriocolonia').val(data.barriocolonia);
                        $('#fechanac').val(data.fechanac);
                        $('#dependientes').val(data.numerodependientes);
                        $('#apmensual').val(data.aportemensual);
                        $('#alquilermensual').val(data.alquilermensual);
                        $('#otrosingresos').val(data.otrosingresos);
                        $('#afiliacionigss').val(data.afiliacionigss);
                        $('#gP1').val(data.genero);


                           if(data.genero == "M")
                    {
                        $("input[name=generoP][value='M']").prop("checked",true);
                    }

                    if(data.genero == "F")
                    {
                        $("input[name=generoP][value='F']").prop("checked",true);
                    }

                        $('#inputTitlePer').html("Información general");
                        $('#formModalPer').modal('show');
                        $('#btnGuardarPer').val('update');
                        $('loading').modal('hide');
                    });
                });

                $("#btnGuardarPer").click(function(e){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    var resultado="ninguno";

                    var resultado= $(":input[name=generoP]:checked").val();




                   
                    console.log(resultado);

                    var formData = {
                        idper: $("#idper").val(),
                        identificacion: $("#identificacio").val(),
                        nit: $("#nit").val(),
                        nombre1: $("#nombre1").val(),           
                        nombre2: $("#nombre2").val(),
                        nombre3: $('#nombre3').val(),
                        apellido1: $('#apellido1').val(),
                        apellido2: $('#apellido2').val(),
                        apellido3: $('#apellido3').val(),

                        fechanac : $("#fechanac").val(),
                        estadocivil: $("#idcivil").val(),
                        genero: resultado,
                        dependientes: $("#dependientes").val(),
                        aportemensual: $("#apmensual").val(),
                        vivienda: $("#vivienda").val(),
                        alquilermensual: $("#alquilermensual").val(),
                        otrosingresos: $("#otrosingresos").val(),
                        barriocolonia: $("#barriocolonia").val(),
                        idempleado: $('#idempleado').val(),
                        afiliacionigss: $('#afiliacionigss').val(),
                    };
                    
                    nit = $('#nit').val();
                    nivel=$("#idnivel option:selected").text();
                    var idacad=$('#idempleado').val();
                    var identificacion=$('#identificacio').val();
                    var estadocivil= $("#idcivil option:selected").text();
                    var nombre2=$('#nombre2').val();
                    var nombre3=$('#nombre3').val();
                    var apellido2=$('#apellido2').val();
                    var apellido3=$('#apellido3').val();
                    var afiliacionigss = $('#afiliacionigss').val();
                    var numerodependientes = $('#dependientes').val();
                    var aportemensual = $('#apmensual').val();
                    var otrosingresos = $('#otrosingresos').val();
                    var alquilermensual = $("#alquilermensual").val();

                    var fechanac = $('#fechanac').val();
                    var vivienda=$("#vivienda").val();
                    var genero = "";


                    if(resultado == "M")
                    {
                        genero = "Masculino";
                    }
                    if(resultado == "F")
                    {
                        genero = "Femenino";
                    }

                    var state=$("#btnGuardarPer").val();
                    var type;
                    var my_url;

                    if (state == "update") 
                    {
                        type="PUT";
                        my_url = 'updatedgenerales/'+idacad;
                    }

                    var fingreso12=$("#fechaingreso").val();
                    var fsalida12=$("#fechasalida").val();

                    $.ajax({
                        type: type,
                        url: my_url,
                        data: formData,
                        dataType: 'json',



              
                   success: function (data) {
                            var item  = '<tr class="even gradeA" id="empleado'+data.identificacion+'">';
                                item += '<td>'+identificacion+'</td>';
                                item += '<td>'+nit+'</td>';
                                item += '<td>'+data.nombre1+' '+nombre2+' '+nombre3+' '+data.apellido1+' '+apellido2+' '+apellido3+'</td>';
                                item += '<td>' +estadocivil+ '</td>'+'<td>'+afiliacionigss+'</td>'+'<td>'+genero+'</td>'+'<td>'+data.barriocolonia+'</td>'+'<td>'+fechanac+'</td>';
                                item += '<td>'+numerodependientes+'</td>';
                                item += '<td>'+aportemensual+'</td>';
                                item += '<td>'+vivienda+'</td>';
                                item += '<td>'+alquilermensual+'</td>';
                                item += '<td>'+otrosingresos+'</td><tr>';


                            if (state == "update")
                            {
                                $("#empleadoRH").replaceWith(item);
                                swal({ 
                                    title:"Envio correcto",
                                    text: "Se ha guardado sus datos correctamente",
                                    type: "success"
                                });
                            }

                            $('#formAgregarPer').trigger("reset");
                            $('#formModalPer').modal('hide');
                            
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
                            
                            $("#erroresContentPer").html(errHTML); 
                            $('#erroresModalPer').modal('show');
                        }
                    });
                });
            

