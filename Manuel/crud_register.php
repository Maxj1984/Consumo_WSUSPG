<?php
include 'conexion.php';
$pdo = new Conexion();

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['id'])) //busqueda por id
    {
        $sql = $pdo->prepare("SELECT * FROM ws_usuarios Where id=:id");
        $sql->bindValue(':id', $_GET['id']);
        $sql->execute();
        $sql-> setFetchMode(PDO::FETCH_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($sql->fetchAll());
        exit;
    }
    else{
    $sql = $pdo->prepare("SELECT * FROM ws_usuarios"); //busqueda global
    $sql->execute();
    $sql-> setFetchMode(PDO::FETCH_ASSOC);
    header("HTTP/1.1 200 OK");
    echo json_encode($sql->fetchAll());
    exit;
    }
}

//ingresar datos - insertar
if($_SERVER['REQUEST_METHOD']=='POST'){
    $sql ="INSERT INTO ws_usuarios (nombre,apellidos,correo,contrasena) VALUES (:nombre,:apellidos,:correo,:contrasena)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nombre', $_POST['nombre']);
    $stmt->bindValue(':apellidos', $_POST['apellidos']);
    $stmt->bindValue(':correo', $_POST['correo']);
    $stmt->bindValue(':contrasena', hash('sha512',$_POST['contrasena']));
    $stmt->execute();
    $idPost=$pdo->lastInsertId();
    if($idPost){
        header("HTTP/1.1 200 OK");
        echo json_encode($idPost);
        exit;
    }
}

//actualizar datos
if($_SERVER['REQUEST_METHOD']=='PUT'){
    $sql ="UPDATE ws_usuarios SET nombre=:nombre,apellidos=:apellidos,correo=:correo,contrasena=:contrasena WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->bindValue(':nombre', $_GET['nombre']);
    $stmt->bindValue(':apellidos', $_GET['apellidos']);
    $stmt->bindValue(':correo', $_GET['correo']);
    $stmt->bindValue(':contrasena', hash('sha512', $_GET['contrasena']));
    $stmt->execute();
    header("HTTP/1.1 200 OK");
    exit;
}

//eliminar datos
if($_SERVER['REQUEST_METHOD']=='DELETE'){
    $sql ="DELETE From ws_usuarios WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    header("HTTP/1.1 200 OK");
    exit;
}

header("HTTP/1.1 400 Bad Request");


?>
