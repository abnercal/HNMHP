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
            
var cont = 0;


function agregar(){

        idtipoantecedente =$("#idtipoantecedente option:selected").val(); 
        tipoantecedente =$("#idtipoantecedente option:selected").text();
        fechavencimiento = $('#expiration_date').val();

        var item  = '<tr class="even gradeA" id="tipoantecedente'+cont+'">';
            item +='<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>';
            item += '<td><input type="hidden" name="idtipoantecedente[]" value="'+idtipoantecedente+'">'+tipoantecedente+'</td>';
            item += '<td><input type="hidden" name="idtipoantecedente[]" value="'+fechavencimiento+'">'+fechavencimiento+'</td><tr>';

        $('#detalleA').append(item);
    }

    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        });
    });

    function evaluar(){
        if (cont>0){
            $("#btnGuardarEmpleado").show();
        }
        else{
            $("#btnGuardarEmpleado").hide();
        }
    }

    function eliminar(index){
       $("#tipoantecedente" + index).remove();
       cont--;
       evaluar();
   }


    $(document).on('click','.btn-btnGuardarEmpleado',function(e){
        var itemsData=[];
        var result = [];
        alert('prue');

        $('#detalleA tr').each(function(){
            var notificar = $(this).find('td').eq(1).html();
            var mensaje = $(this).find('td').eq(2).html();

            valor = new Array(notificar,mensaje);
            itemsData.push(valor);
        });
    });


     $(document).on('click','.btn-guardarAsecenso',function(e){
                var itemsData=[];
                var miurl = "addasecenso";

                $('#detalle7 tr').each(function(){
                    var jefe = $(this).find('td').eq(2).html();
                    var notificar = $(this).find('td').eq(3).html();
                    valor = new Array(jefe,notificar);
                    itemsData.push(valor);
                });

                var formData = {
                    idpuesto: $('#idpuesto').val(),
                    idempleado: $('#idempleado').val(),
                    fecha: $('#dato1').val(),
                    salario: $('#salario').val(),
                    descripcion: $('#descripcion').val(),
                    idafiliado: $('#idafiliado').val(),
                    idcaso: $('#idcaso').val(),
                    items: itemsData,
                };
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
                    //beforeSend: function(){ $f.data('locked', true);  // (2)
                    //},

                    success: function (data) {
                        swal({ 
                            title:"Envio correcto",
                            text: "Gracias",
                            type: "success"
                        },
                        function(){
                            window.location.href="/empleado/listado"
                        });                                
                    },
                    error: function (data) {
                        $('#loading').modal('hide');
                        var errHTML="";
                        if((typeof data.responseJSON != 'undefined')){
                            for( var er in data.responseJSON){
                                errHTML+="<li>"+data.responseJSON[er]+"</li>";
                            }
                        }else{
                            errHTML+='<li>Error al borrar el &aacute;rea de atenci&oacute;n.</li>';
                        }
                        $("#erroresContent").html(errHTML); 
                        $('#erroresModal').modal('show');
                    },
                    //complete: function(){ $f.data('locked', false);  // (3)
                     //}
                });             
            });
