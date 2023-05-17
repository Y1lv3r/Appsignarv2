<?php

# conectare la base de datos
$con = @mysqli_connect('localhost', 'root', '', 'appsignar_cambios');
if (!$con) {
	die("imposible conectarse: " . mysqli_error($con));
}
if (@mysqli_connect_errno()) {
	die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}


function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function monto($table, $mes, $periodo, $division)
{
	global $con;
	
	$fecha_inicial = "$periodo-$mes-1";
	if ($mes == 1 or $mes == 3 or $mes == 5 or $mes == 7 or $mes == 8 or $mes == 10 or $mes == 12) {
		$dia_fin = 31;
	} else if ($mes == 2) {
		if ($periodo % 4 == 0) {
			$dia_fin = 29;
		} else {
			$dia_fin = 28;
		}
	} else {
		$dia_fin = 30;
	}
	$fecha_final = "$periodo-$mes-$dia_fin";
	
		$query = mysqli_query($con, "select ROUND(sum($table)/ (sum(horasasignadas) + sum(horaslibre))* 100,1) as Libre, division from (SELECT SUM(horas) as horasasignadas,0 horaslibre, division,estado FROM `asignacion` WHERE fecha between '$fecha_inicial' and '$fecha_final' and estado='Asignado' and tipo='Habil' AND division='$division' GROUP BY division, estado UNION ALL SELECT 0 horasasignadas, SUM(horas) as horaslibre, division, estado FROM `asignacion` WHERE fecha between '$fecha_inicial' and '$fecha_final' and estado='Libre' and tipo='Habil' AND division='$division' GROUP BY division,estado) b1 GROUP by division;");
		if($query==false or $query==''){
			alert("No hay datos");
		}
		else{
		$row = mysqli_fetch_array($query);
		$monto = floatval($row['Libre']);
		}
		
		
		
		
		return $monto;
	
	
	
	

}
