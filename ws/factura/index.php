<?php

include ('conexion.php');
include ('uuid.php');

$pdo = new conexion();
$codigo = new uuid();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$todo = (array)(json_decode(file_get_contents("php://input"), true));
	
	/*if(isset($_POST['id_factura'])){
		$sql = $pdo->prepare("select * from comagt41_apiguate.factura_detalle
		where id_factura = :id_factura;");
        $sql->bindValue(':id_factura', $_POST['id_factura']);
        $sql->execute();
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        //header("HTTP/1.1 200 hay datos");
        echo  json_encode($sql->fetchALL());
	}

	else{*/
	$encabezado = $todo["Encabezado"];
	$detalle = $todo["Detalle"];
	$nit = $encabezado['nit'];
	$nombre = $encabezado['cliente'];
	$direccion = $encabezado['direccion'];
	$fecha = $encabezado['fecha'];
	$monto = $encabezado['monto'];
	if($nit!='' && $nombre!='' && $direccion!='' && $monto!='' && $fecha!=''){
		$sql = "INSERT INTO factura_encabezado (nit, nombre,  fecha, monto) VALUES(:nit, :nombre, :fecha, :monto)";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nit', $nit);
		$stmt->bindValue(':nombre', $nombre);
		$stmt->bindValue(':fecha', $fecha);
		$stmt->bindValue(':monto', $monto);
		$stmt->execute();
		$idPost = $pdo->lastInsertId();
		
		if($idPost)
		{	
			$suma = 0;
			foreach ($detalle as $producto) {
			$suma += $producto['Monto'];
			$sql = "INSERT INTO factura_detalle (id_factura,codigo_producto, descripcion, cantidad, precio_unitario, total)
			VALUES(:id_factura, :codigo_producto, :descripcion, :cantidad, :precio_unitario, :total)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':id_factura', $idPost);
			$stmt->bindValue(':codigo_producto', $producto['codigo']);
			$stmt->bindValue(':descripcion', $producto['descripcion']);
			$stmt->bindValue(':cantidad', $producto['cantidad']);
			$stmt->bindValue(':precio_unitario', $producto['valor_unitario']);
			$stmt->bindValue(':total', $producto['Monto']);
			$stmt->execute();
			}
			$uuid= $codigo->v4();
			$sql = "UPDATE factura_encabezado SET monto=:monto, uuid=:uuid WHERE id_factura_encabezado=:id_factura; ";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':monto', $suma);
			$stmt->bindValue(':uuid', $uuid);
			$stmt->bindValue(':id_factura', $idPost);
			$stmt->execute();

			/*$datos[] = ["mensaje: Factura grabada", "estado: Ok", "id_factura: ".$idPost, "uuid:".$uuid];
			echo json_encode($datos);*/
			$mensaje_json = array(
			'mensaje' => 'Factura grabada',
			'estado' => 'ok',
			'id_factura' => $idPost,
			'uuid' => $uuid);
			$datos = json_encode($mensaje_json);
			echo $datos;

		}
		
	}
	else{
		if($nit == ''){
			$mensaje_json = array(
			'mensaje' => 'error en grabado, falta nit',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		else if ($nombre == '')
		{
			$mensaje_json = array(
			'mensaje' => 'error en grabado, falta nombre',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		else if ($direccion == '')
		{
			$mensaje_json = array(
			'mensaje' => 'error en grabado, falta direccion',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		else if($fecha == '')
		{
			$mensaje_json = array(
			'mensaje' => 'error en grabado, falta fecha',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		else if ($monto == '')
		{
			$mensaje_json = array(
			'mensaje' => 'error en grabado, falta monto',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		else
		{
			$mensaje_json = array(
			'mensaje' => 'error en grabado, error desconocido',
			'estado' => 'fallido');
			$datos = json_encode($mensaje_json);
			echo $datos;	
		}
		
	}
	


}


?>