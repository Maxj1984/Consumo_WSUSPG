document.addEventListener('DOMContentLoaded', function() {
    $('#btn-btn-enviar').click(function()
    {
      var numero = document.getElementById('inputNumero').value;
      var nombre = document.getElementById('inputNombre').value;
      var vence = document.getElementById('fecha_vence').value;
      var ccv = document.getElementById('inputCCV').value;
      var monto = document.getElementById('monto').value;
  
      var data = new FormData(); 
      data.append('num_tarjeta',numero);
      data.append('titular',nombre);
      data.append('fecha_vence',vence);
      data.append('ccv',ccv);
      data.append('monto',monto);
      
      fetch('https://guatedata.site/ftpadmin/pasarela/index.php',{ 
        method:'POST',
        body: data 
      })
      .then(function(response){
        return response.text();
      })
  
      .then(function(texto){
        //const obj = JSON.parse(texto);
        console.log(texto);
        alert(texto);      
      });
  
    }
  );
})