<?php
error_reporting(0);//espera que se envien datos por Post
include 'conexion.php';
$pdo = new Conexion();


if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['login_usuario'],$_POST['login_pass'])) //busqueda por correo y pass
    {

        $dat_usuario=$_POST['login_usuario'];
        $dat_contrasena=hash('sha512',$_POST['login_pass']);

        // echo $dat_contrasena.$dat_usuario.("\n"); //esto prueba si se reciben los datos POST
        $sql = $pdo->prepare("SELECT * FROM ws_usuarios where correo=:correo and contrasena=:contrasena and estado='A'");
        $sql->bindValue(':correo', $dat_usuario);
        $sql->bindValue(':contrasena', $dat_contrasena);
        $sql->execute();
        
        //almacena la consulta como 0 o 1
        $conteo=$sql->rowCount();
        
        //valida si el resultado es 0 muestra erro, si es 1 valida el login        
        if($conteo==0){
            $data_Error = array(
                'estatus' => 'Error',
                'mensaje' => 'Error de autenticacion usuario o contraseña incorrecta'
            );
            //echo '<script>alert("Usuario o Contraseña no valido")</script>';
            echo json_encode($data_Error);
            header("HTTP/1.1 400 Error de Validación");
        }else{
            $sql-> setFetchMode(PDO::FETCH_ASSOC);
            $prue=$sql->fetch();
            $nomb=$prue["nombre"];
            $data_Ok = array(
                'estatus' => 'OK',
                'mensaje' => 'Autenticacion exitosa'
            );
            echo json_encode($data_Ok);
            //echo '<script>alert("Bienvenid@ '.$nomb.'")</script>';
            header("HTTP/1.1 200 OK");
        }

       
    }elseif(isset($_POST['usuario'],$_POST['contrasena_vieja'])) //busqueda por correo y pass
    {
        $dat_usuario=$_POST['usuario'];
        $dat_contrasena=hash('sha512',$_POST['contrasena_vieja']);

        $sql = $pdo->prepare("SELECT * FROM ws_usuarios where correo=:correo and contrasena=:contrasena and estado='A'");
        $sql->bindValue(':correo', $dat_usuario);
        $sql->bindValue(':contrasena', $dat_contrasena);
        $sql->execute();
        
        //almacena la consulta como 0 o 1
        $conteo=$sql->rowCount();
        
        //valida si el resultado es 0 muestra erro, si es 1 valida el login        
        if($conteo==0){
            $data_Error = array(
                'estatus' => 'Error',
                'mensaje1' => 'Error de autenticacion usuario o contraseña incorrecta'
            );
            echo json_encode($data_Error);
            //echo '<script>alert("Ocurrio un error, Usuario o Contraseña no validos")</script>';
            header("HTTP/1.1 400 Error de Validación");
        }else{
            $sql-> setFetchMode(PDO::FETCH_ASSOC);
            $prue=$sql->fetch();
            $nomb=$prue["nombre"];
            $sesionid=$prue["id"];

            $NewPass=hash('sha512',$_POST['NewPass']);
            $ConfirmNewPass=hash('sha512',$_POST['ConfirmNewPass']);
            if($NewPass!=$ConfirmNewPass){
                $data_error = array(
                    'estatus' => 'Error',
                    'mensaje2' => 'Error Contraseña nueva no coincide'
                );
                echo json_encode($data_error);
                //echo '<script>alert("Contraseña nueva no coincide")</script>';
            }elseif($dat_contrasena==$NewPass){
                $data_error = array(
                    'estatus' => 'Error',
                    'mensaje3' => 'Error contraseña nueva no puede ser igual a la anterior'
                );
                echo json_encode($data_error);
                //echo '<script>alert("Contraseña nueva no puede ser igual a la anterior")</script>';
            }else{
                $sql ="UPDATE ws_usuarios SET contrasena=:contrasena WHERE id=:id and estado='A'";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id', $sesionid);
                $stmt->bindValue(':contrasena', $NewPass);
                $stmt->execute();
                $data_Ok = array(
                    'estatus' => 'Ok',
                    'mensaje' => 'Contraseña nueva almacenada'
                );
                echo json_encode($data_Ok);
                //echo '<script>alert("'.$nomb.' su contraseña ha sido actualizada")</script>';
                header("HTTP/1.1 200 OK");
                exit;

            }
        }
    }elseif(isset($_POST['nombre'],$_POST['apellidos'], $_POST['correo'],$_POST['contrasena'])){
        $sql ="INSERT INTO ws_usuarios (nombre,apellidos,correo,contrasena) VALUES (:nombre,:apellidos,:correo,:contrasena)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nombre', $_POST['nombre']);
        $stmt->bindValue(':apellidos', $_POST['apellidos']);
        $stmt->bindValue(':correo', $_POST['correo']);
        $stmt->bindValue(':contrasena', hash('sha512',$_POST['contrasena']));
        $stmt->execute();
        $idPost=$pdo->lastInsertId();
        if($idPost){
            $data_Ok = array(
                'estatus' => 'OK',
                'mensaje' => 'Registro de usuario correctamente con id '.$idPost
            );
            echo json_encode($data_Ok);
            header("HTTP/1.1 200 OK");
            //echo json_encode($idPost);
            exit;}
}else{
    $data_error = array(
        'estatus' => 'ERROR',
        'mensaje' => 'Error uno o varios campos faltan en el registro'
    );
    echo json_encode($data_error);
}
}
?>