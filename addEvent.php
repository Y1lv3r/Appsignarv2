<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
setlocale(LC_ALL, "es_ES");

// Connexion a la base de datos
require_once('./global/conexion.php');
// archivos para envío de correo
require './correo/PHPMailer.php';
require './correo/SMTP.php';

$verinicioyfin = "SELECT * FROM hora_laboral";
$verificacorreof = mysqli_query($link, $verinicioyfin);

while ($fila = $verificacorreof->fetch_assoc()) {
	$iniciof = $fila['hora_inicio'];
	$finf = $fila['hora_fin'];
}

echo $iniciofe = strtotime($iniciof);
echo "<br>";
echo $finfe = strtotime($finf);
echo "<br>";
echo $iniciofe . $finfe;
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['empleado']) && isset($_POST['area']) && isset($_POST['estado']) && isset($_POST['lista1']) && isset($_POST['lista2']) && isset($_POST['lugar'])) {
	$title = $_POST['title'];
	echo $start = $_POST['start'];
	echo "<br>";
	echo $end = $_POST['end'];
	echo "<br>";
	$color = $_POST['color'];
	$empleado = $_POST['empleado'];
	$area = $_POST['area'];
	$división = $_POST['lista1'];
	$perfil = $_POST['lista2'];
	$estado = $_POST['estado'];
	$lugar = $_POST['lugar'];
	$nombreasignador = $_POST['nomasignador'];
	if (isset($_POST['findesi'])) {
		$findesi = $_POST['findesi'];
	}

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
	echo $nombreasignador . "<br>";
	echo $correo . "<br>";
	//calcular las fechas para individualizar los eventos

	$fechaInicio = strtotime($start);
	$fechaFin = strtotime($end);

	$fechaFincon = date("Y-m-d", $fechaFin);
	$fechaIncon = date("Y-m-d", $fechaInicio);
	$divicon = "CO0" . $división;
	echo $horai = date("H:i:s", $fechaInicio);
	echo "<br>";
	echo $horaf = date("H:i:s", $fechaFin);
	echo "<br>" . $end;
	echo "<br>" . $horai . "<br>" .  $iniciof . "<br>" . $horaf . "<br>" . $finf . "<br>";
	$horaAlmin = '12:00:00';
	$horaAlmfi = '13:00:00';
	/********* Encontrar Semana y Día *************/
	$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
	$dia = $dias[date("w", $fechaFin)];
	$semana = date("W", $fechaFin);
	echo "<br>" . $semana . "<br>" . $dia;
	$diaconca = null;
	/********* Encontrar Semana y Día *************/
	if (isset($_POST['findesi'])) {
		$horaconditioni = strtotime($horai);
		$horaconditionf = strtotime($horaf);
		$horaconditionialmuerzo = strtotime($horaAlmin);
		$horaconditionfalmuerzo = strtotime($horaAlmfi);

		if ($fechaFincon > $fechaIncon && $iniciofe == $horaconditioni  && $finfe == $horaconditionf) {
			echo " entro a la condicion de dia y hora";

			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dates2 != $Festivo) {
					$diaconca .= $dia . ", ";
					echo "<br>" . $dates2 . " no es festivo <br>";
					/********* Encontrar Semana y Día *************/
					rangofechas($title, $fechafinal, $horai, $fechafinal, $horaAlmin, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $horaAlmfi, $horaf, $bdd);
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon && $horaconditioni >= $horaconditionialmuerzo  && $horaconditionf <= $horaconditionfalmuerzo) {
			echo " entro a la condicion de solo diferente a la hora de almuerzo";
			echo $dia;
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);

				if ($dates2 != $Festivo) {
					$diaconca .= $dia . ", ";
					echo "<br>" . $dates2 . " no es festivo <br>";
					/********* Encontrar Semana y Día *************/
					/********* Encontrar Semana y Día *************/
					rangofechasAl($title, $fechafinal, $horai, $horaf, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd);
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon && $horaconditioni >= $horaconditionialmuerzo  || $horaconditionf <= $horaconditionfalmuerzo) {
			echo " entro a la condicion de igual 12 adelante";
			echo $dia;
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);

				if ($dates2 != $Festivo) {
					$diaconca .= $dia . ", ";
					echo "<br>" . $dates2 . " no es festivo <br>";
					/********* Encontrar Semana y Día *************/
					/********* Encontrar Semana y Día *************/
					rangofechasAl($title, $fechafinal, $horai, $horaf, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd);
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon) {
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				//echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dates2 != $Festivo) {
					$diaconca .= $dia . ", ";
					echo "<br>" . $dates2 . " no es festivo <br>";
					/********* Encontrar Semana y Día *************/
					rangofechas2($title, $fechafinal, $horai, $horaf, $horaAlmin, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $horaAlmfi, $bdd);
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($horai < $horaAlmin &&  $horaf > $horaAlmfi) {
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($start);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaFin);
				$diaconca .= $dia . ", ";

				//echo "<br>" . $semana . "<br>" . $dia;
				/********* Encontrar Semana y Día *************/
				//echo "<br>";
				Tododia($title, $start, $fechaFincon, $horaAlmin, $fechaIncon, $horaAlmfi, $end, $empleado, $area, $color, $semana, $dia, $estado, $división, $perfil, $lugar, $Dive, $Perfe, $bdd);

				echo "union " . $union = $fechaIncon . " " . $horaAlmfi . "<br>";
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>El día: ' . $diaconca;
			$bodys = ', en la fecha: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);

			$Tdia = 'Tdia';
			header('Location: asignar.php?Tdia=' . $Tdia);
		} else {

			/********* Encontrar Semana y Día *************/
			$fechaconverin = strtotime($start);
			$fechaconverfi = strtotime($end);
			$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
			$dia = $dias[date("w", $fechaconverin)];
			$semana = date("W", $fechaconverin);
			echo "<br>" . $semana . "<br>" . $dia . "<br>";
			/********* Encontrar Semana y Día *************/
			Hora($title, $start, $end, $empleado, $area, $color, $semana, $dia, $estado, $división, $perfil, $lugar, $Dive, $Perfe, $bdd);

			//echo $sql . "<br>";
			//enviar correo
			$rangodias = '.<br><br>El día: ' . $dia;
			$bodys = ', en el siguente rango de horas: <br><br> ' . $horai . " - " . $horaf;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);

			$horaespecifica = 'horaespecifica';
			header('Location: asignar.php?horaespecifica=' . $horaespecifica);
		}
	} else {
		echo $horai . "<br>";
		echo $horaf . "<br>";
		echo $horaAlmin . "<br>";
		echo $horaAlmfi . "<br>";

		$horaconditioni = strtotime($horai);
		$horaconditionf = strtotime($horaf);
		$horaconditionialmuerzo = strtotime($horaAlmin);
		$horaconditionfalmuerzo = strtotime($horaAlmfi);

		if ($fechaFincon > $fechaIncon && $iniciofe == $horaconditioni  && $finfe == $horaconditionf) {
			echo " entro a la condicion de dia y hora";

			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dia != "domingo" && $dia != "sábado") {
					if ($dates2 != $Festivo) {
						$diaconca .= $dia . ", ";
						echo "<br>" . $dates2 . " no es festivo <br>";
						/********* Encontrar Semana y Día *************/
						rangofechas($title, $fechafinal, $horai, $fechafinal, $horaAlmin, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $horaAlmfi, $horaf, $bdd);
					}
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon && $horaconditioni >= $horaconditionialmuerzo  && $horaconditionf <= $horaconditionfalmuerzo) {
			echo " entro a la condicion de solo diferente a la hora de almuerzo";
			echo $dia;
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dia != "domingo" && $dia != "sábado") {
					if ($dates2 != $Festivo) {
						$diaconca .= $dia . ", ";
						echo "<br>" . $dates2 . " no es festivo <br>";
						/********* Encontrar Semana y Día *************/
						rangofechasAl($title, $fechafinal, $horai, $horaf, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd);
					}
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon && $horaconditioni >= $horaconditionialmuerzo  || $horaconditionf <= $horaconditionfalmuerzo) {
			echo " entro a la condicion de igual 12 adelante";
			echo $dia;
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dia != "domingo" && $dia != "sábado") {
					if ($dates2 != $Festivo) {
						$diaconca .= $dia . ", ";
						echo "<br>" . $dates2 . " no es festivo <br>";
						/********* Encontrar Semana y Día *************/
						rangofechasAl($title, $fechafinal, $horai, $horaf, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd);
					}
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($fechaFincon > $fechaIncon) {
			echo " entro a la condicion de las horas dentro del rango del almuerzo";
			echo $dia;
			for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
				$fechafinal = date("Y-m-d", $i) . " ";
				$union = $fechafinal . $horai;
				$dates2 = date("Y-m-d", $i);
				$diaFestivo = "SELECT fecha FROM dias_festivos WHERE fecha = '$fechafinal'";
				$veriFestivo = mysqli_query($link, $diaFestivo);
				$Festivo = "";
				while ($row = $veriFestivo->fetch_assoc()) {
					$Festivo = $row['fecha'];
				}
				echo "<br>";
				echo $división . $divicon;
				echo "<br>";
				/********* Encontrar Semana y Día *************/
				$fechaconverin = strtotime($union);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				if ($dia != "domingo" && $dia != "sábado") {
					if ($dates2 != $Festivo) {
						$diaconca .= $dia . ", ";
						echo "<br>" . $dates2 . " no es festivo <br>";
						/********* Encontrar Semana y Día *************/
						rangofechas2($title, $fechafinal, $horai, $horaf, $horaAlmin, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $horaAlmfi, $bdd);
					}
				}
			}
			$diaconca = trim($diaconca, ', ');
			echo $diaconca;
			$rangodias = '.<br><br>Los días: ' . $diaconca;
			$bodys = ', en este rango de fechas: <br><br> ' . $start . " - " . $end;
			correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);
			$Rango = 'Rango';
			header('Location: asignar.php?Rango=' . $Rango);
		} else if ($horai < $horaAlmin &&  $horaf > $horaAlmfi) {
			if ($dia != "domingo" && $dia != "sábado") {
				for ($i = $fechaInicio; $i <= $fechaFin; $i += 86400) {
					$fechafinal = date("Y-m-d", $i) . " ";
					echo "<br>";
					/********* Encontrar Semana y Día *************/
					$fechaconverin = strtotime($start);
					$fechaconverfi = strtotime($end);
					$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
					$dia = $dias[date("w", $fechaconverin)];
					$semana = date("W", $fechaFin);
					if ($dia != "domingo" && $dia != "sábado") {
						$diaconca .= $dia . ", ";
					}
					//echo "<br>" . $semana . "<br>" . $dia;

					Tododia($title, $start, $fechaFincon, $horaAlmin, $fechaIncon, $horaAlmfi, $end, $empleado, $area, $color, $semana, $dia, $estado, $división, $perfil, $lugar, $Dive, $Perfe, $bdd);
				}
				$diaconca = trim($diaconca, ', ');
				echo $diaconca;
				$rangodias = '.<br><br>El día: ' . $diaconca;
				$bodys = ', en la fecha: <br><br> ' . $start . " - " . $end;
				correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);

				$Tdia = 'Tdia';
				header('Location: asignar.php?Tdia=' . $Tdia);
			}
		} else {

			/********* Encontrar Semana y Día *************/
			if ($dia != "domingo" && $dia != "sábado") {
				$fechaconverin = strtotime($start);
				$fechaconverfi = strtotime($end);
				$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
				$dia = $dias[date("w", $fechaconverin)];
				$semana = date("W", $fechaconverin);
				echo "<br>" . $semana . "<br>" . $dia . "<br>";
				/********* Encontrar Semana y Día *************/
				Hora($title, $start, $end, $empleado, $area, $color, $semana, $dia, $estado, $división, $perfil, $lugar, $Dive, $Perfe, $bdd);

				$rangodias = '.<br><br>El día: ' . $dia;
				$bodys = ', en el siguente rango de horas: <br><br> ' . $horai . " - " . $horaf;
				correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias);

				$horaespecifica = 'horaespecifica';
				header('Location: asignar.php?horaespecifica=' . $horaespecifica);
			}
		}
	}
}
else{
	echo '<script>
	alert("no lleno bien el formulario");
	</script>';
	exit();
}
$asignadonoti = "INSERT INTO notificacion (usuario1,usuario2,tipo,proyecto,leido,fechain,fechafin,fecha) values('$nombreasignador','$empleado','Nueva asignación','$title',0,'$start','$end', now()) ";
$ejecutar_notificacion = mysqli_query($link, $asignadonoti);
//$variable1 = 'NO';
//header('Location: asignar.php?variable1=' . $variable1);
//header('Location: asignar.php');
//header('Location: ' . $_SERVER['HTTP_REFERER']);
/*********************************************************** FUNCIONES **************************************************************/
function rangofechas($var1, $var2, $var3, $var4, $var5, $var6, $var7, $var8, $var9, $var10, $var11, $var12, $var13, $var14, $var15, $var16, $var17, $var18, $bdd)
{
	$sql = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) 
	values ('$var1', '$var2 $var3', '$var4 $var5', '$var6', '$var7', '$var8', '$var9', '$var10', '$var11', '$var12', '$var13', '$var14', '$var15', '$var16')";
	$sql2 = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) 
	values ('$var1', '$var2 $var17', '$var4 $var18', '$var6', '$var7', '$var8', '$var9', '$var10', '$var11', '$var12', '$var13', '$var14', '$var15', '$var16')";
	$query = $bdd->prepare($sql);
	$query2 = $bdd->prepare($sql2);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('error al ejecutadar');
	}
	if ($query2 == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query2->execute();
	if ($sth == false) {
		print_r($query2->errorInfo());
		die('error al ejecutadar');
	}
}
function rangofechas2($title, $fechafinal, $horai, $horaf, $horaAlmin, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $horaAlmfi, $bdd)
{
	$sql = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) 
	values ('$title', '$fechafinal $horai', '$fechafinal $horaAlmin', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$divicon', '$perfil', '$lugar', '$Dive', '$Perfe')";
	$sql2 = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) 
	values ('$title', '$fechafinal $horaAlmfi', '$fechafinal $horaf', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$divicon', '$perfil', '$lugar', '$Dive', '$Perfe')";

	$query = $bdd->prepare($sql);
	$query2 = $bdd->prepare($sql2);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('error al ejecutadar');
	}
	if ($query2 == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query2->execute();
	if ($sth == false) {
		print_r($query2->errorInfo());
		die('error al ejecutadar');
	}
}
function rangofechasAl($title, $fechafinal, $horai, $horaf, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd)
{
	$sql = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) 
	values ('$title', '$fechafinal $horai', '$fechafinal $horaf', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$divicon', '$perfil', '$lugar', '$Dive', '$Perfe')";

	$query = $bdd->prepare($sql);

	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('error al ejecutadar');
	}
}
function Tododia($title, $start, $fechaFincon, $horaAlmin, $fechaIncon, $horaAlmfi, $end, $empleado, $area, $color, $semana, $dia, $estado, $divicon, $perfil, $lugar, $Dive, $Perfe, $bdd)
{
	$sql = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) values ('$title', '$start', '$fechaFincon $horaAlmin', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$divicon', '$perfil', '$lugar', '$Dive', '$Perfe')";
	$sql2 = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) values ('$title', '$fechaIncon $horaAlmfi', '$end', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$divicon', '$perfil', '$lugar', '$Dive', '$Perfe')";
	$query = $bdd->prepare($sql);
	$query2 = $bdd->prepare($sql2);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('error al ejecutadar');
	}
	if ($query2 == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query2->execute();
	if ($sth == false) {
		print_r($query2->errorInfo());
		die('error al ejecutadar');
	}
}
function Hora($title, $start, $end, $empleado, $area, $color, $semana, $dia, $estado, $división, $perfil, $lugar, $Dive, $Perfe, $bdd)
{
	$sql = "INSERT INTO events(title, start, end, empleado, area, color,semana,dia, estado, division, perfil, lugar, division_e, perfil_e) values ('$title', '$start', '$end', '$empleado', '$area', '$color', '$semana', '$dia', '$estado', '$división', '$perfil', '$lugar', '$Dive', '$Perfe')";
	$query = $bdd->prepare($sql);
	if ($query == false) {
		print_r($bdd->errorInfo());
		die('Error al preparar');
	}
	$sth = $query->execute();
	if ($sth == false) {
		print_r($query->errorInfo());
		die('error al ejecutadar');
	}
}
/**************************** CORREO *****************************/
function correo($empleado, $title, $fechafinal, $horai, $horaf, $dia, $nombreasignador, $correo, $bodys, $rangodias)
{
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$body = '¡Hola, ' . $empleado . '!<br>' . '<br><br>Ha sido asignado a: ' . $title . $bodys . $rangodias . '.<br><br>Su asignación ha sido realizada por ' . $nombreasignador . '.<br><br>Gracias por su atención, que tenga un buen día.<br><br>ATT:<br>APPSIGNAR';
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
?>