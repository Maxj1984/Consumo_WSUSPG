document.addEventListener('DOMContentLoaded', function() {

   

    document.getElementById('fecha').valueAsDate = new Date();

    //Boton que muestra el diálogo de agregar producto
    $('#btnAgregarProducto').click(function() {
      LimpiarFormulario();
      $("#ModalProducto").modal();
    });

    //Limpia el formulario que se carga en la ventana emergente
    function LimpiarFormulario() {
      $('#codigo').val('');
      $('#descripcion').val('');
      $('#cantidad').val('');
      $('#valor_unitario').val('');
    }

    function guardar(){
        var _cod = document.getElementById("codigo").value;
        var _cat = document.getElementById("cantidad").value;
        var _valoruni = document.getElementById("valor_unitario").value;
        var _descrip = document.getElementById("descripcion").value;
        var _montodescrip=(_cat*_valoruni);
        var fila="<tr><td class='codigo'>"+_cod+"</td><td class='descripcion'>"+_descrip+"</td><td class='cantidad' type='number'>"+_cat+"</td><td type='number' class='valor_unitario'>"+_valoruni+"</td></tr>"+"</td><td type='number' class='Monto'>"+_montodescrip+"</td></tr>";

        var btn = document.createElement("TR");
        btn.innerHTML=fila;
        document.getElementById("DetalleFactura").appendChild(btn);
      }     

    function SumaTotales() {
      var sum = 0;
        $("td.Monto").each(function(){
            sum += parseFloat( $( this ).text() );
            
     // console.log(sum);
        });
    
      //  console.log(sum);
        $("#montofactura").val(sum);
      

    }


    //Boton que agrega el producto al detalle
    $('#btnConfirmarAgregarProducto').click(function() {
      guardar();
      SumaTotales();
      $("#ModalProducto").modal('hide');
      if ($("#cantidad").val() == "") {
        alert('no puede estar vacío la cantidad de productos.');
        return;
      }
    });

    //Boton grabar la factura en el ws de factura
    $('#btnGrabar').click(function() {
      //se capturan los datos input del cliente
      var cliente = document.getElementById('cliente').value;
      var direccion = document.getElementById('direccion').value;
      var fecha = document.getElementById('fecha').value;
      var nit = document.getElementById('nit').value;
      var montofactura = document.getElementById('montofactura').value;
  
      var Encabezado = {'cliente':cliente,'direccion':direccion,'fecha':fecha,'nit':nit, 'monto':montofactura};
      
      let Detalle = [];

        document.querySelectorAll('.table.table-striped tbody tr').forEach(function(e){
          let fila = {
            codigo: e.querySelector('.codigo').innerText,
            descripcion: e.querySelector('.descripcion').innerText,
            cantidad: e.querySelector('.cantidad').innerText,
            valor_unitario: e.querySelector('.valor_unitario').innerText,
            Monto: e.querySelector('.Monto').innerText
          };
          Detalle.push(fila);
        });
      //console.log(Encabezado); //validar si se crea el array de encabezado
      var datos_fact = {Encabezado,Detalle};
      var datos= JSON.stringify(datos_fact);


      var http = new XMLHttpRequest();
      var url = "https://apiguate.store/Facturas/index.php";
      
      http.open("POST", url, true);
      http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      

      http.onreadystatechange = function() {
          if(http.readyState == 4 && http.status == 200) { 
            //aqui obtienes la respuesta de tu peticion
            alert(http.responseText);
          }
      }
      http.send(datos);


    
  



  });
});
