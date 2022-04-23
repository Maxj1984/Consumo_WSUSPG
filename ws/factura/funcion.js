$('#enviar').click(regresar);

function regresar() {
    $.ajax({
            url: 'index.php',
            type: 'POST',
            dataType: 'json',
            data:{
                Encabezado: {"nit":$('#nit').val(),"cliente":$('#nombre').val(),"direccion":$('#direccion').val(),"fecha":$('#fecha').val(),"monto":$('#monto').val()},
                Detalle:[{"codigo":"123","descripcion":"Pollo","cantidad":"10","valor_unitario":"30","Monto":"300"},{"codigo":"564","descripcion":"Gasolina","cantidad":"5","valor_unitario":"50","Monto":"500"}],
            }
        }).done(
        function(data){
            $('#salida').append(data);
            $('#Encabezado').val('');
            $('#nit').val('');
            $('#nombre').val('');
            $('#direccion').val('');
        }
    );
}