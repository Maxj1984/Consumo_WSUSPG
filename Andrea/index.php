<?php

	include 'conexion.php';
	
	$pdo = new Conexion();
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if(isset($_GET['id_alumno']))
		{
			$sql = $pdo->prepare("SELECT * FROM datos_alumno WHERE id_alumno=:id_alumno");
			$sql->bindValue(':id_alumno', $_GET['id_alumno']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;				
			
			} else {
			
			$sql = $pdo->prepare("SELECT * FROM datos_alumno");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			header("HTTP/1.1 200 hay datos");
			echo json_encode($sql->fetchAll());
			exit;		
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql = "INSERT INTO datos_alumno (nombre, apellido, edad,carrera) VALUES(:nombre, :apellido, :edad,:carrera)";
		$stmt = $pdo->prepare($sql);
		
		$stmt->bindValue(':nombre', $_POST['nombre']);
		$stmt->bindValue(':apellido', $_POST['apellido']);
		$stmt->bindValue(':edad', $_POST['edad']);
		$stmt->bindValue(':carrera', $_POST['carrera']);
		
		$stmt->execute();
		$idPost = $pdo->lastInsertId(); 
		if($idPost)
		{
			header("HTTP/1.1 200 Ok");
			echo json_encode($idPost);
			exit;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'PUT'){		
		$sql = "UPDATE datos_alumno SET  nombre=:nombre, apellido=:apellido, edad=:edad ,carrera=:carrera WHERE id_alumno=:id_alumno";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':nombre', $_GET['nombre']);
		$stmt->bindValue(':apellido', $_GET['apellido']);
		$stmt->bindValue(':edad', $_GET['edad']);
		$stmt->bindValue(':carrera', $_GET['carrera']);
		$stmt->bindValue(':id_alumno', $_GET['id_alumno']);
		
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	

	if ($_SERVER['REQUEST_METHOD'] == 'DELETE')	{
		$sql = "DELETE FROM datos_alumno WHERE id_alumno=:id_alumno";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id_alumno', $_GET['id_alumno']);
		$stmt->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	
	
?>