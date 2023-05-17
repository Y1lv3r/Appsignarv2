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


$sentenciacapa= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Capacitacion%' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciacapa->execute();
$listacapa=$sentenciacapa->fetchAll(PDO::FETCH_ASSOC);

$sentenciacompe= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Compensatorio%' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciacompe->execute();
$listacompe=$sentenciacompe->fetchAll(PDO::FETCH_ASSOC);

$sentenciainca= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Incapacidad%' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciainca->execute();
$listainca=$sentenciainca->fetchAll(PDO::FETCH_ASSOC);


$sentencialice= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Licencia%' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentencialice->execute();
$listalice=$sentencialice->fetchAll(PDO::FETCH_ASSOC);

$sentenciareti= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado LIKE '%Inactivo%' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciareti->execute();
$listareti=$sentenciareti->fetchAll(PDO::FETCH_ASSOC);

$sentenciavaca= $pdo -> prepare ("SELECT empleado,perfil_e,division_e,estado,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 1 THEN TIMEDIFF(end,start) END))) as semana_1,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 2 THEN TIMEDIFF(end,start) END))) as semana_2,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 3 THEN TIMEDIFF(end,start) END))) as semana_3,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 4 THEN TIMEDIFF(end,start) END))) as semana_4, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 5 THEN TIMEDIFF(end,start) END))) as semana_5,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 6 THEN TIMEDIFF(end,start) END))) as semana_6,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 7 THEN TIMEDIFF(end,start) END))) as semana_7,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 8 THEN TIMEDIFF(end,start) END))) as semana_8,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 9 THEN TIMEDIFF(end,start) END))) as semana_9,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 10 THEN TIMEDIFF(end,start) END))) as semana_10,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 11 THEN TIMEDIFF(end,start) END))) as semana_11,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 12 THEN TIMEDIFF(end,start) END))) as semana_12,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 13 THEN TIMEDIFF(end,start) END))) as semana_13,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 14 THEN TIMEDIFF(end,start) END))) as semana_14, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 15 THEN TIMEDIFF(end,start) END))) as semana_15,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 16 THEN TIMEDIFF(end,start) END))) as semana_16,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 17 THEN TIMEDIFF(end,start) END))) as semana_17,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 18 THEN TIMEDIFF(end,start) END))) as semana_18,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 19 THEN TIMEDIFF(end,start) END))) as semana_19,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 20 THEN TIMEDIFF(end,start) END))) as semana_20,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 21 THEN TIMEDIFF(end,start) END))) as semana_21,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 22 THEN TIMEDIFF(end,start) END))) as semana_22,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 23 THEN TIMEDIFF(end,start) END))) as semana_23,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 24 THEN TIMEDIFF(end,start) END))) as semana_24, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 25 THEN TIMEDIFF(end,start) END))) as semana_25,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 26 THEN TIMEDIFF(end,start) END))) as semana_26,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 27 THEN TIMEDIFF(end,start) END))) as semana_27,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 28 THEN TIMEDIFF(end,start) END))) as semana_28,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 29 THEN TIMEDIFF(end,start) END))) as semana_29,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 30 THEN TIMEDIFF(end,start) END))) as semana_30,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 31 THEN TIMEDIFF(end,start) END))) as semana_31,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 32 THEN TIMEDIFF(end,start) END))) as semana_32,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 33 THEN TIMEDIFF(end,start) END))) as semana_33,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 34 THEN TIMEDIFF(end,start) END))) as semana_34, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 35 THEN TIMEDIFF(end,start) END))) as semana_35,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 36 THEN TIMEDIFF(end,start) END))) as semana_36,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 37 THEN TIMEDIFF(end,start) END))) as semana_37,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 38 THEN TIMEDIFF(end,start) END))) as semana_38,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 39 THEN TIMEDIFF(end,start) END))) as semana_39,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 40 THEN TIMEDIFF(end,start) END))) as semana_40,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 41 THEN TIMEDIFF(end,start) END))) as semana_41,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 42 THEN TIMEDIFF(end,start) END))) as semana_42,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 43 THEN TIMEDIFF(end,start) END))) as semana_43,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 44 THEN TIMEDIFF(end,start) END))) as semana_44, 
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 45 THEN TIMEDIFF(end,start) END))) as semana_45,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 46 THEN TIMEDIFF(end,start) END))) as semana_46,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 47 THEN TIMEDIFF(end,start) END))) as semana_47,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 48 THEN TIMEDIFF(end,start) END))) as semana_48,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 49 THEN TIMEDIFF(end,start) END))) as semana_49,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 50 THEN TIMEDIFF(end,start) END))) as semana_50,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 51 THEN TIMEDIFF(end,start) END))) as semana_51,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 52 THEN TIMEDIFF(end,start) END))) as semana_52,
SEC_TO_TIME(TIME_TO_SEC(SUM(CASE WHEN semana = 53 THEN TIMEDIFF(end,start) END))) as semana_53
FROM (SELECT *,EXTRACT(YEAR FROM start) anio FROM events ) eventse WHERE estado='Vacaciones' AND start>='2022-01-01' and start<='2023-12-31' GROUP by empleado, anio");
$sentenciavaca->execute();
$listavaca=$sentenciavaca->fetchAll(PDO::FETCH_ASSOC);


?>


