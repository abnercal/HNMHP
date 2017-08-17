
            $(document).on('click','.btn-addB',function(){
                    $('#inputTitle').html("Nuevo bienhechor");
                    $('#formAgregar').trigger("reset");
                    //$('#btnGuardar').val('add');
                    $('#formModal').modal('show');
            });


            $("#btnGuardar").click(function(e){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                var miurl;
                var formData;
                var state=$("#btnGuardar").val();
                var type;

                var nombreb=$("#nombreb").val();
                var apellidob=$("#apellidob").val();
                var correo=$("#correo").val();
                var telefono=$("#telefono").val();
                var nit=$("#nit").val();
                var direccion=$("#direccion").val();
                var tipobienhechor=$("#tipobienhechor").val();
                var tipopersona=$("#tipopersona").val();

                //if (state == "add") 
                       // {
                            type="POST";
                          formData = {
                             nombreb:$("#nombreb").val(),
                 apellidob:$("#apellidob").val(),
                 correo:$("#correo").val(),
                 telefono:$("#telefono").val(),
                 nit:$("#nit").val(),
                 direccion:$("#direccion").val(),
                 tipobienhechor:$("#tipobienhechor").val(),
                 tipopersona:$("#tipopersona").val(),
                          };
                          miurl = 'add';
                        //}
                        //console.log(state);

                                        /*if (state == "expec") 
                        {
                          formData = {
                            explaboral: explaboral,
                            observacion: $("#observacion").val(),
                            identificacion: identificacion,
                          };
                          miurl = 'expcomentaro';
                        }*/

                $.ajax({
                    type: type,
                    url: miurl,
                    data: formData,
                    dataType: 'json',

                    success: function (data) {
                   

                      $('#formModal').modal('hide');
                        
                    },
                    error: function (data) {
                        $('#loading').modal('hide');
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                            for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                            }
                        }else{
                            errHTML+='<li>Error al intentar guardar un nuevo registro, intente mas tarde.</li>';
                        }
                        $("#erroresContent").html(errHTML); 
                        $('#erroresModal').modal('show');
                    }
                });
            });




        //Validaciones Letras y numeros
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