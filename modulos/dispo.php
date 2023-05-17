<?php  
include ('global/sesiones.php');
//echo "soy empleado en modulos" 
 
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

$concatenar=null;
$Year2 = date("Y-m-d");
$semana = date("W");
$visible = "true";
$mes = date("n");
for ($i=0; $i < 3; $i++) { 
    $concatenar .= "$mes,";
    $mes ++;
}
$concatenar = trim($concatenar, ',');

?>

<?php
include ("global/conexion.php");
/*SELECT * FROM asignacion WHERE tipo='Hábil' and MONTH(fecha) in ($concatenar)"*/
$sentencia3= $pdo -> prepare ("SELECT * FROM events WHERE  MONTH(start) in ($concatenar)");
$sentencia3->execute();
$listaAsignacion3=$sentencia3->fetchAll(PDO::FETCH_ASSOC);

$sentencia4= $pdo -> prepare ("SELECT * FROM events WHERE  MONTH(start) in ($concatenar)");
$sentencia4->execute();
$listaAsignacionfintres=$sentencia4->fetchAll(PDO::FETCH_ASSOC);

$sentenciaA= $pdo -> prepare ("SELECT * FROM events WHERE empleado LIKE '%Prueba17%'");
$sentenciaA->execute();
$listaAsignacion=$sentenciaA->fetchAll(PDO::FETCH_ASSOC);


$sentencia= $pdo -> prepare ("SELECT * FROM events WHERE 1");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentenciaD= $pdo -> prepare ("SELECT * FROM division ");
$sentenciaD->execute();
$listaDivision=$sentenciaD->fetchAll(PDO::FETCH_ASSOC);

$sentenciap= $pdo -> prepare ("SELECT * FROM Perfil ");
$sentenciap->execute();
$listaPerfil=$sentenciap->fetchAll(PDO::FETCH_ASSOC);

$sentenciac= $pdo -> prepare ("SELECT * FROM proyectos ");
$sentenciac->execute();
$listaCliente=$sentenciac->fetchAll(PDO::FETCH_ASSOC);

$sentenciae= $pdo -> prepare ("SELECT * FROM estado ");
$sentenciae->execute();
$listaEstado=$sentenciae->fetchAll(PDO::FETCH_ASSOC);

$sentencial= $pdo -> prepare ("SELECT * FROM lugar ");
$sentencial->execute();
$listaLugar=$sentencial->fetchAll(PDO::FETCH_ASSOC);

$sentenciaarea= $pdo -> prepare ("SELECT * FROM area ");
$sentenciaarea->execute();
$listaArea=$sentenciaarea->fetchAll(PDO::FETCH_ASSOC);

$sentenciaperfi= $pdo -> prepare ("SELECT * FROM perfil_asignacion ");
$sentenciaperfi->execute();
$listaPerfia=$sentenciaperfi->fetchAll(PDO::FETCH_ASSOC);

$Year2 = date("Y-m-d");

$t= $pdo -> prepare ("SELECT totalsemana from hora_laboral ");
$t->execute();
$e=$t->fetch(PDO::FETCH_LAZY);
$jornada = '';    
$jornada= $e['totalsemana'];


$sentenciacapa= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
ROUND((SUM(CASE WHEN semana = 1 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_1,
ROUND((SUM(CASE WHEN semana = 2 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_2,
ROUND((SUM(CASE WHEN semana = 3 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_3,
ROUND((SUM(CASE WHEN semana = 4 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_4, 
ROUND((SUM(CASE WHEN semana = 5 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_5,
ROUND((SUM(CASE WHEN semana = 6 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_6,
ROUND((SUM(CASE WHEN semana = 7 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_7,
ROUND((SUM(CASE WHEN semana = 8 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_8,
ROUND((SUM(CASE WHEN semana = 9 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_9,
ROUND((SUM(CASE WHEN semana = 10 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_10,
ROUND((SUM(CASE WHEN semana = 11 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_11,
ROUND((SUM(CASE WHEN semana = 12 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_12,
ROUND((SUM(CASE WHEN semana = 13 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_13,
ROUND((SUM(CASE WHEN semana = 14 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_14, 
ROUND((SUM(CASE WHEN semana = 15 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_15,
ROUND((SUM(CASE WHEN semana = 16 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_16,
ROUND((SUM(CASE WHEN semana = 17 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_17,
ROUND((SUM(CASE WHEN semana = 18 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_18,
ROUND((SUM(CASE WHEN semana = 19 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_19,
ROUND((SUM(CASE WHEN semana = 20 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_20,
ROUND((SUM(CASE WHEN semana = 21 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_21,
ROUND((SUM(CASE WHEN semana = 22 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_22,
ROUND((SUM(CASE WHEN semana = 23 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_23,
ROUND((SUM(CASE WHEN semana = 24 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_24, 
ROUND((SUM(CASE WHEN semana = 25 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_25,
ROUND((SUM(CASE WHEN semana = 26 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_26,
ROUND((SUM(CASE WHEN semana = 27 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_27,
ROUND((SUM(CASE WHEN semana = 28 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_28,
ROUND((SUM(CASE WHEN semana = 29 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_29,
ROUND((SUM(CASE WHEN semana = 30 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_30,
ROUND((SUM(CASE WHEN semana = 31 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_31,
ROUND((SUM(CASE WHEN semana = 32 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_32,
ROUND((SUM(CASE WHEN semana = 33 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_33,
ROUND((SUM(CASE WHEN semana = 34 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_34, 
ROUND((SUM(CASE WHEN semana = 35 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_35,
ROUND((SUM(CASE WHEN semana = 36 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_36,
ROUND((SUM(CASE WHEN semana = 37 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_37,
ROUND((SUM(CASE WHEN semana = 38 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_38,
ROUND((SUM(CASE WHEN semana = 39 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_39,
ROUND((SUM(CASE WHEN semana = 40 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_40,
ROUND((SUM(CASE WHEN semana = 41 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_41,
ROUND((SUM(CASE WHEN semana = 42 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_42,
ROUND((SUM(CASE WHEN semana = 43 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_43,
ROUND((SUM(CASE WHEN semana = 44 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_44, 
ROUND((SUM(CASE WHEN semana = 45 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_45,
ROUND((SUM(CASE WHEN semana = 46 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_46,
ROUND((SUM(CASE WHEN semana = 47 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_47,
ROUND((SUM(CASE WHEN semana = 48 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_48,
ROUND((SUM(CASE WHEN semana = 49 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_49,
ROUND((SUM(CASE WHEN semana = 50 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_50,
ROUND((SUM(CASE WHEN semana = 51 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_51,
ROUND((SUM(CASE WHEN semana = 52 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_52,
ROUND((SUM(CASE WHEN semana = 53 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Asignado%'and empleado <> 'Administrador'and empleado <> 'Administrador2'and empleado <> 'Administrador3' AND start>='2023-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciacapa->execute();
$listaAsig=$sentenciacapa->fetchAll(PDO::FETCH_ASSOC);

$sentenciacompe= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
$jornada- ROUND((SUM(CASE WHEN semana = 1 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_1,
$jornada- ROUND((SUM(CASE WHEN semana = 2 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_2,
$jornada- ROUND((SUM(CASE WHEN semana = 3 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_3,
$jornada- ROUND((SUM(CASE WHEN semana = 4 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_4,
$jornada- ROUND((SUM(CASE WHEN semana = 5 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_5,
$jornada- ROUND((SUM(CASE WHEN semana = 6 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_6,
$jornada- ROUND((SUM(CASE WHEN semana = 7 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_7,
$jornada- ROUND((SUM(CASE WHEN semana = 8 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_8,
$jornada- ROUND((SUM(CASE WHEN semana = 9 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_9,
$jornada- ROUND((SUM(CASE WHEN semana = 10 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_10,
$jornada- ROUND((SUM(CASE WHEN semana = 11 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_11,
$jornada- ROUND((SUM(CASE WHEN semana = 12 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_12,
$jornada- ROUND((SUM(CASE WHEN semana = 13 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_13,
$jornada- ROUND((SUM(CASE WHEN semana = 14 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_14,
$jornada- ROUND((SUM(CASE WHEN semana = 15 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_15,
$jornada- ROUND((SUM(CASE WHEN semana = 16 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_16,
$jornada- ROUND((SUM(CASE WHEN semana = 17 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_17,
$jornada- ROUND((SUM(CASE WHEN semana = 18 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_18,
$jornada- ROUND((SUM(CASE WHEN semana = 19 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_19,
$jornada- ROUND((SUM(CASE WHEN semana = 20 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_20,
$jornada- ROUND((SUM(CASE WHEN semana = 21 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_21,
$jornada- ROUND((SUM(CASE WHEN semana = 22 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_22,
$jornada- ROUND((SUM(CASE WHEN semana = 23 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_23,
$jornada- ROUND((SUM(CASE WHEN semana = 24 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_24,
$jornada- ROUND((SUM(CASE WHEN semana = 25 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_25,
$jornada- ROUND((SUM(CASE WHEN semana = 26 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_26,
$jornada- ROUND((SUM(CASE WHEN semana = 27 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_27,
$jornada- ROUND((SUM(CASE WHEN semana = 28 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_28,
$jornada- ROUND((SUM(CASE WHEN semana = 29 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_29,
$jornada- ROUND((SUM(CASE WHEN semana = 30 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_30,
$jornada- ROUND((SUM(CASE WHEN semana = 31 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_31,
$jornada- ROUND((SUM(CASE WHEN semana = 32 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_32,
$jornada- ROUND((SUM(CASE WHEN semana = 33 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_33,
$jornada- ROUND((SUM(CASE WHEN semana = 34 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_34,
$jornada- ROUND((SUM(CASE WHEN semana = 35 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_35,
$jornada- ROUND((SUM(CASE WHEN semana = 36 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_36,
$jornada- ROUND((SUM(CASE WHEN semana = 37 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_37,
$jornada- ROUND((SUM(CASE WHEN semana = 38 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_38,
$jornada- ROUND((SUM(CASE WHEN semana = 39 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_39,
$jornada- ROUND((SUM(CASE WHEN semana = 40 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_40,
$jornada- ROUND((SUM(CASE WHEN semana = 41 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_41,
$jornada- ROUND((SUM(CASE WHEN semana = 42 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_42,
$jornada- ROUND((SUM(CASE WHEN semana = 43 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_43,
$jornada- ROUND((SUM(CASE WHEN semana = 44 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_44,
$jornada- ROUND((SUM(CASE WHEN semana = 45 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_45,
$jornada- ROUND((SUM(CASE WHEN semana = 46 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_46,
$jornada- ROUND((SUM(CASE WHEN semana = 47 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_47,
$jornada- ROUND((SUM(CASE WHEN semana = 48 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_48,
$jornada- ROUND((SUM(CASE WHEN semana = 49 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_49,
$jornada- ROUND((SUM(CASE WHEN semana = 50 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_50,
$jornada- ROUND((SUM(CASE WHEN semana = 51 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_51,
$jornada- ROUND((SUM(CASE WHEN semana = 52 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_52,
$jornada- ROUND((SUM(CASE WHEN semana = 53 THEN TIMESTAMPDIFF(minute,start,end)END)/60),1) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Asignado%'and empleado <> 'Administrador'and empleado <> 'Administrador2'and empleado <> 'Administrador3' AND start>='2023-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciacompe->execute();
$listaDispo=$sentenciacompe->fetchAll(PDO::FETCH_ASSOC);
?>


