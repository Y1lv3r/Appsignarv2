<?php

// Connexion à la base de données
require_once('global/conexion.php');
require './correo/PHPMailer.php';
require './correo/SMTP.php';

//echo $nom['Nombre'];

if (isset($_POST['Event'][0]) && isset($_POST['Event'][1]) && isset($_POST['Event'][2])) {


	$id = $_POST['Event'][0];
	$start = $_POST['Event'][1];
	$end = $_POST['Event'][2];
	$nombre_empleado= "yilver";

	$vercorreo = "SELECT * FROM empleados WHERE Nombre LIKE '%$nombre_empleado%'";
	$verificacorreo = mysqli_query($link, $vercorreo);
	if ($nombre_empleado != "") {
		while ($row = $verificacorreo->fetch_assoc()) {
			$correo = $row['Correo'];
			$Dive = $row['Division'];
			$Perfe = $row['Perfil'];
		}
	}

	$sql = "UPDATE events SET  start = '$start', end = '$end' WHERE id = $id ";


	$query = $bdd->prepare($sql);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('Erreur execute');
	} else {
		die('OK');
	}
	$rangodias = '.<br><br>En la fecha: ' . $start;
	//$bodys = ', en el siguente rango de horas: <br><br> ' . $fechasin . " - " . $fechasfin;
	correo($nombre_empleado, $start, $end, $nom, $correo, $rangodias);
}

/**************************** CORREO *****************************/
function correo($empleado, $fechafinal, $horaf, $nombreasignador, $correo, $rangodias)
{
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$body = '¡Hola, ' . $empleado . '!<br>' . '<br><br>Su asignación ha sido modificada a: ' . $rangodias . '.<br><br>Modificada por: ' . $nombreasignador . '.<br><br>Gracias por su atención, que tenga un buen día.<br><br>ATT:<br>APPSIGNAR';
	$mail->IsSMTP();
	$mail->Host       = 'smtp.gmail.com';
	$mail->SMTPSecure = 'tls';
	$mail->Port       = 587;
	$mail->SMTPAuth   = true;
	$mail->SMTPKeepAlive = true; // add it to keep SMTP connection open after each email sent
	$mail->Username   = 'asignaciones.colombia.co@gmail.com';
	$mail->Password   = 'gijfywcdrxvluord';
	$mail->SetFrom('asignaciones.colombia.co@gmail.com', "Appsignar");
	$mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
	$mail->Subject    = 'Asignación';
	$mail->MsgHTML($body);
	$mail->AddAddress($correo, $empleado);
	//$mail->AddBCC('yramirez@seidor.es', 'Yilver Ramirez');
	$mail->send();
}
//header('Location: '.$_SERVER['HTTP_REFERER']);
