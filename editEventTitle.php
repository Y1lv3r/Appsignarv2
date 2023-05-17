<?php

require_once('./global/conexion.php');
// archivos para envío de correo
require './correo/PHPMailer.php';
require './correo/SMTP.php';
$empleado = $_POST['empleado'];
$nombreasignador = $_POST['nomasignador'];
//traer correo empleado
$vercorreo = "SELECT * FROM empleados WHERE Nombre LIKE '%$empleado%'";
$verificacorreo = mysqli_query($link, $vercorreo);
if ($empleado != "") {
	while ($row = $verificacorreo->fetch_assoc()) {
		$correo = $row['Correo'];
		$Dive = $row['Division'];
		$Perfe = $row['Perfil'];
	}
}

if (isset($_POST['delete']) && isset($_POST['id'])) {


	$id = $_POST['id'];

	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare($sql);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
		print_r($query->errorInfo());
		die('Erreur execute');
	}
	$eliminar = 'eliminar';
	header('Location: ./asignar.php?eliminar=' . $eliminar);
} elseif (isset($_POST['title']) && isset($_POST['area']) && isset($_POST['color']) && isset($_POST['empleado']) && isset($_POST['id']) && isset($_POST['estado']) || isset($_POST['divisionasignado']) || isset($_POST['perfilasignado']) || isset($_POST['lugar'])) {

	$id = $_POST['id'];
	$title = $_POST['title'];
	$empleado = $_POST['empleado'];
	$area = $_POST['area'];
	$estado = $_POST['estado'];
	echo $division = "CO0" . $_POST['divisionasignado'];

	echo "<br>";

	echo $perfil = $_POST['perfilasignado'];
	echo "<br>";
	echo $divisiondefecto = $_POST['divisionado'];
	echo $perfildefecto = $_POST['perfilado'];
	echo "<br>";
	$lugar = $_POST['lugar'];
	$color = $_POST['color'];
	echo "<br>";
	echo $fechaactu = date("Y-m-d");
	echo "<br>";
	echo $fechasin = $_POST['start'];
	echo "<br>";
	echo $fechasfin = $_POST['end'];
	echo "<br>";
	echo $colore = $_POST['colorfin'];
	echo "<br>";
	if ($fechasin < $fechaactu) {
		echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			function alerta() {
				Swal.fire({
					title: "No se puede asignar dias anteriores al actual",
					showDenyButton: true,
					showCancelButton: true,
					confirmButtonText: "Guardar de todos modos",
					denyButtonText: "No Guardar",
				}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						Swal.fire("Saved!", "", "success")
					} else if (result.isDenied) {
						Swal.fire("Changes are not saved", "", "info")
					}
				});
			}
			alerta();
		</script>';
		$noeditar = 'noeditar';
		header('Location: ./asignar.php?noeditar=' . $noeditar);
	} else {
		echo $sql = "UPDATE events SET  title = '$title', color = '$color', empleado = '$empleado' , area = '$area', estado = '$estado', division = '$division', perfil = '$perfil', lugar = '$lugar' WHERE id = $id ";

		$query = $bdd->prepare($sql);
		if ($query == false) {
			print_r($bdd->errorInfo());
			die('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
			print_r($query->errorInfo());
			die('Erreur execute');
		}
		$rangodias = '.<br><br>En la fecha: ' . $fechasin;
		//$bodys = ', en el siguente rango de horas: <br><br> ' . $fechasin . " - " . $fechasfin;
		correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);

		$editar = 'editar';
		header('Location: ./asignar.php?editar=' . $editar);
	}
}
/**************************** CORREO *****************************/
function correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias)
{
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$body = '¡Hola, ' . $empleado . '!<br>' . '<br><br>Su asignación ha sido modificada a: ' . $title . $bodys . $rangodias . '.<br><br>Modificada por: ' . $nombreasignador . '.<br><br>Gracias por su atención, que tenga un buen día.<br><br>ATT:<br>APPSIGNAR';
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
