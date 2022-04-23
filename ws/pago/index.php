<?php

include 'conexion.php';
	
	$pdo = new Conexion();
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		
		//Captura los datos de la tabla
		$sql = $pdo->prepare("SELECT titular, num_tarjeta, cvv, DATE_FORMAT(fecha_vence, '%Y-%m') as fecha_vence, saldo, estado FROM pasarela_pago WHERE  num_tarjeta=:num_tarjeta");

		$sql->bindValue(':num_tarjeta', $_GET['num_tarjeta']);
		//$sql->bindValue(':titular', $_GET['titular']);
		$sql->execute();
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		header("HTTP/1.1 200 hay datos");

		$json = json_encode($sql->fetchAll());
		$data = json_decode($json);

		$titular_bd = array_column($data, 'titular');
		$num_bd = array_column($data, 'num_tarjeta');
		$cvv_bd = array_column($data, 'cvv');
		$fecha_bd = array_column($data, 'fecha_vence');
		$saldo_bd = array_column($data, 'saldo');
		$estado_bd = array_column($data, 'estado');

		//Captura los datos ingresados
		$t = $_REQUEST['titular'];
		$n = $_REQUEST['num_tarjeta'];
		$c = $_REQUEST['cvv'];
		$f = $_REQUEST['fecha_vence'];
		$m = $_REQUEST['monto'];
		$datos_ent= '[{"titular":"'.$t.'", "num_tarjeta":"'.$n.'", "cvv":'.$c.', "fecha_vence":"'.$f.'", "monto":'.$m.', "estado": "A"}]';
		$dato = json_decode($datos_ent);

		$titular = array_column($dato, 'titular');
		$num = array_column($dato, 'num_tarjeta');
		$cvv = array_column($dato, 'cvv');
		$fecha = array_column($dato, 'fecha_vence');
		$monto = array_column($dato, 'monto');
		$estado = array_column($dato, 'estado');


		$fecha_actual = date('y')."-".date('m');
		$fecha_now = json_decode($fecha_actual);

		//Autenticacion de datos

		if($num_bd == $num)
		{
			if($titular_bd == $titular)
			{
				if($cvv_bd == $cvv)
				{
					
						if($fecha_bd == $fecha)
						{

							if($estado_bd == $estado)
							{
								if($saldo_bd >= $monto)
								{
									
									$duno = json_encode($data, JSON_UNESCAPED_UNICODE);
									echo $duno;
									
								}
								else
								{
									$sal = json_decode('[{"ERROR":"El saldo es insuficiente"}]');
									echo json_encode($sal);
								}
								
							}
							else
							{
								
								$tex = json_decode('[{"ERROR":"La tarjeta ya expiro"}]');
									echo json_encode($tex);
							}

						}
						else
						{
							
							$fech = json_decode('[{"ERROR":"La fecha es incorrecta o ya expiro"}]');
									echo json_encode($fech);
						}
					
					

				}
				else
				{
					$cvvv = json_decode('[{"ERROR":"El codigo de seguridad es incorrecto"}]');
					echo json_encode($cvvv);
				}
			}
			else
			{
				
				$titu = json_decode('[{"ERROR":"El titular no existe"}]');
				echo json_encode($titu);
			}
		}
		else
		{
			$n_t = json_decode('[{"ERROR":"El numero de tarjeta no existe"}]');
				echo json_encode($n_t);
		}

	}
?>