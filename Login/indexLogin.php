<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body class='' >
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../">Tecnologias Web</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <div class="navbar-nav">
    <!--<div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>-->
  </div>
</header>

<div class="sidenav">
         <div class="login-main-text">
            <h2>Applicación de <br>Página Login</h2>
            <p>validación de Login</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="post" action="" id="formLogin">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" id="login_usuario" name="login_usuario" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" id="login_pass" name="login_pass" class="form-control" placeholder="Password" autocomplete="off">
                  </div>
                  <button type="submit" id="btnLogin" class="btn btn-black">Login</button>
                  <button type="button" id="btnRegistro" class="btn btn-secondary">Registrarse</button>
                  <button type="button" id="btnCambio" class="btn btn-secondary">Actualizar Contraseña</button>    
               </form>
              
            </div>
         </div>
      </div>



<!--para registro de nuevos usuarios-->
<div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <form method="post" action="" id="formModalRegistro">
                </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                            <label>Nombres:</label>
                                <input type="" id="nombre" name="nombre" class="form-control">
                                <label>Apellidos:</label>
                                <input type="" name="apellidos" id="apellidos" class="form-control">
                                <label>Correo:</label>
                                <input type="" name="correo" id="correo" class="form-control">
                                <label>Contraseña:</label>
                                <input type="password" name="contrasena" id="contrasena" class="form-control" autocomplete="off">
                            </div>
                        

                    </div>
            
                    <div   div class="modal-footer">
                    <button type="submit" id="btnAgregarRegistro" class="btn btn-success">Agregar datos de Usuario</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>


<!--para actualizar contraseña de usuarios existentes-->
<div class="modal fade" id="ModalCambio" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <form method="post" action="" id="formModalCambio">
                </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label>Usuario:</label>
                                <input type="" name="usuario" id="usuario" class="form-control">
                                <label>Contraseña Actual:</label>
                                <input type="password" name="contrasena_vieja" id="contrasena_vieja" class="form-control" autocomplete="off">
                                <label>Nueva Contraseña:</label>
                                <input type="password" id="NewPass" name="NewPass" class="form-control" autocomplete="off">
                                <label>Confirmar Nueva Contraseña:</label>
                                <input type="password" name="ConfirmNewPass" id="ConfirmNewPass" class="form-control" autocomplete="off">
                                
                            </div>
                        

                    </div>
            
                    <div   div class="modal-footer">
                    <button type="submit" id="btnActualizaPass" class="btn btn-success">Actualizar Contraseña</button>
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="./consume_login.js"></script>

<Style>
body {
    font-family: "Lato", sans-serif;
}

.main-head{
    height: 150px;
    background: #FFF;
   
}
.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}
.main {
    padding: 0px 10px;
}
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}
@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}
@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}
.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}
.login-main-text h2{
    font-weight: 300;
}
.btn-black{
    background-color: #000 !important;
    color: #fff;
}</Style>
</html>