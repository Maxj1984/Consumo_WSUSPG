
document.addEventListener('DOMContentLoaded', function() {
$('#btnRegistro').click(function() {
    LimpiarFormulario();
    $("#ModalRegistro").modal();
  });
});

document.addEventListener('DOMContentLoaded', function() {
    $('#btnCambio').click(function() {
        LimpiarFormulario();
        $("#ModalCambio").modal();
      });
    });


function LimpiarFormulario() {
    $('#nombre').val('');
    $('#apellidos').val('');
    $('#correo').val('');
    $('#contrasena').val('');
    
  }



//  const Url = 'https://comagt.com/login.php'; //para almacenar el link para el web service

document.addEventListener('DOMContentLoaded', function() {
  $('#btnLogin').click(function()
  {
    var login = document.getElementById('login_usuario').value; //capturo los datos de mi input para enviar con post al web service
    var pass = document.getElementById('login_pass').value;

    var data = new FormData(); //almacena una informacion con indice y valor
    data.append('login_usuario',login); //se almacena el valor dentro de data para enviar via post
    data.append('login_pass',pass);
    /*console.log(login);
    console.log(pass);*/
    //permite invocar el werb service
   // fetch('http://localhost/valid_usuario/login.php',{ //esta linea se debe comentar, para que cargue el link del web service, para pruebas en localhost dejar habilitado
     fetch('https://comagt.com/login.php',{ //al cargar al host, se debe habilitar esta linea quitando el comentario, para que funcione
      method:'POST', //se define el metodo para enviar la info
      body: data //lleva los datos que se enviaran al web service
    })
    // .then ayuda a capturar la respuesta del web service
    .then(function(response){
      return response.text(); //devuelve la respuesta en texto plano
    })

    .then(function(texto){//el nombre texto puede ser cualquier variable, servira para almacernar el response que se obtenga
      const obj = JSON.parse(texto);
      //console.log(texto); // devuelve el valor obtenido del web service en la consola
      var mensaje= obj.mensaje;
      alert(mensaje);
      
      //alert(texto);
      
    });

  }
);
})


document.addEventListener('DOMContentLoaded', function() {
  $('#btnActualizaPass').click(function()
  {
    var login = document.getElementById('usuario').value;
    var oldpass = document.getElementById('contrasena_vieja').value;
    var newlogin = document.getElementById('NewPass').value;
    var confirnewpass = document.getElementById('ConfirmNewPass').value;

    var data = new FormData(); 
    data.append('usuario',login);
    data.append('contrasena_vieja',oldpass);
    data.append('NewPass',newlogin);
    data.append('ConfirmNewPass',confirnewpass);
    
    fetch('https://comagt.com/login.php',{ //esta linea se debe comentar, para que cargue el link del web service, para pruebas en localhost dejar habilitado
      //fetch('http://localhost/valid_usuario/login.php',{ //al cargar al host, se debe habilitar esta linea quitando el comentario, para que funcione
      method:'POST',
      body: data 
    })
    .then(function(response){
      return response.text();
    })

    .then(function(texto){
      const obj = JSON.parse(texto);
      var mensaje= obj.mensaje;
      alert(mensaje);      
    });

  }
);
})


document.addEventListener('DOMContentLoaded', function() {
  $('#btnAgregarRegistro').click(function()
  {
    var nomb = document.getElementById('nombre').value;
    var apell = document.getElementById('apellidos').value;
    var mail = document.getElementById('correo').value;
    var password = document.getElementById('contrasena').value;

    var data = new FormData(); 
    data.append('nombre',nomb);
    data.append('apellidos',apell);
    data.append('correo',mail);
    data.append('contrasena',password);
    
    fetch('https://comagt.com/login.php',{ //esta linea se debe comentar, para que cargue el link del web service, para pruebas en localhost dejar habilitado
      //fetch('http://localhost/valid_usuario/login.php',{ //al cargar al host, se debe habilitar esta linea quitando el comentario, para que funcione
      method:'POST',
      body: data 
    })
    .then(function(response){
      return response.text();
    })

    .then(function(texto){
      const obj = JSON.parse(texto);
      var mensaje= obj.mensaje;
      alert(mensaje);      
    });

  }
);
})