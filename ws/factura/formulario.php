<?php 
    include('index.php');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div method="POST">
    <input type="text" id="nit" placeholder="Nit">
    <input type="text" id="nombre" placeholder="Nombre">
    <input type="text" id="direccion" placeholder="Direccion">
    <input type="text" id="fecha" placeholder="Fecha">
    <input type="text" id="monto" placeholder="Monto ">
    <button type="button" id="enviar">Enviar</button>
    </div>
    <div id="salida">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="funcion.js"></script>
</body>
</html>
