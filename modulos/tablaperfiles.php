<?php include ('global/sesiones.php'); 
$ID_=(isset($_POST['ID_'])) ? $_POST['ID_'] : "";
 $mesactual= date("n");
 $accion=(isset($_POST['accion']))?$_POST['accion']:"";
   $nombreem= $nom['Nombre'];
   $divisionem= $per['Division'];
$division = (isset($_POST['division'])) ? $_POST['division'] : "";
$mes= (isset($_POST['mes'])) ? $_POST['mes'] : "";

include ("global/conexion.php");


$sentenciaD= $pdo -> prepare ("SELECT * FROM division ");
$sentenciaD->execute();
$listaDivision=$sentenciaD->fetchAll(PDO::FETCH_ASSOC);



if ($division == null or $mes == null){
    $sentencia= $pdo -> prepare ("SELECT b1.empleado as Empleado, b1.perfil AS perfil_asig, SEC_TO_TIME(TIME_TO_SEC(b1.horasasignadas)) AS ASIGNADO_POR_PERFIL, SEC_TO_TIME(TIME_TO_SEC(b2.Totales)) as Totales, CONCAT(ROUND((b1.horasasignadas/b2.Totales)*100,1), ' %') as '%_Horas'
    FROM
    (
    SELECT SUM(CASE WHEN MONTH(start)= $mesactual THEN TIMEDIFF(end,start) END) AS horasasignadas, empleado, perfil, estado
    FROM events
    WHERE estado='Asignado'  AND MONTH(start)= $mesactual and YEAR(start)= 2023 and division_e  = '$divisionem'
    GROUP BY empleado, perfil, estado
    ) b1
    INNER JOIN
    (
    Select Sum(CASE WHEN  MONTH(start)= $mesactual THEN TIMEDIFF(end,start) END) as Totales, empleado, estado
    FROM events
    Where estado='Asignado' AND MONTH(start)= $mesactual and YEAR(start)= 2023 and division_e = '$divisionem'
    group by empleado, estado
    ) b2 on b1.empleado = b2.empleado
    GROUP BY b1.empleado, b1.perfil, b1.horasasignadas, b2.Totales");
$sentencia->execute();
$lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}else{
    $sentencia= $pdo -> prepare ("SELECT b1.empleado as Empleado, b1.perfil AS perfil_asig, SEC_TO_TIME(TIME_TO_SEC(b1.horasasignadas)) AS ASIGNADO_POR_PERFIL, SEC_TO_TIME(TIME_TO_SEC(b2.Totales)) as Totales, CONCAT(ROUND((b1.horasasignadas/b2.Totales)*100,1), ' %') as '%_Horas'
FROM
(
SELECT SUM(CASE WHEN MONTH(start)= $mes THEN TIMEDIFF(end,start) END) AS horasasignadas, empleado, perfil, estado
FROM events
WHERE estado='Asignado'  AND MONTH(start)='$mes' and YEAR(start)= 2023 and division_e  = '$division'
GROUP BY empleado, perfil, estado
) b1
INNER JOIN
(
Select Sum(CASE WHEN  MONTH(start)= $mes THEN TIMEDIFF(end,start) END) as Totales, empleado, estado
FROM events
Where estado='Asignado' AND MONTH(start)='$mes' and YEAR(start)= 2023 and division_e = '$division'
group by empleado, estado
) b2 on b1.empleado = b2.empleado
GROUP BY b1.empleado, b1.perfil, b1.horasasignadas, b2.Totales");
$sentencia->execute();
$lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}

if ($division== null) {
    $division = $divisionem;
}
if($mesactual==1){
    $mesactual = 'Enero';
}else if($mesactual== 2){
$mesactual = 'Febrero';
}else if($mesactual==3){
$mesactual = 'Marzo';
}else if($mesactual==4){
$mesactual = 'Abril';
}else if($mesactual==5){
$mesactual = 'Mayo';
}else if($mesactual==6){
$mesactual = 'Junio';
}else if($mesactual==7){
$mesactual = 'Julio';
}else if($mesactual==8){
$mesactual = 'Agosto';
}else if($mesactual==9){
$mesactual = 'Septiembre';
}else if($mesactual==10){
$mesactual = 'Octubre';
}else if($mesactual==11){
$mesactual = 'Noviembre';
}else if($mesactual==12){
$mesactual = 'Diciembre';
}


     $sentencian= $pdo -> prepare ("SELECT *
     FROM `notificacion` 
      WHERE usuario2 = '$nombreem' and leido= '0' ORDER BY ID desc");
     $sentencian->execute();
     $listanotificacion=$sentencian->fetchAll(PDO::FETCH_ASSOC);

     switch($accion){
     case "btnEliminar":
        $sentenciaENOTI= $pdo->prepare("DELETE FROM notificacion WHERE  ID =:ID_"); 
        $sentenciaENOTI->bindParam(':ID_',$ID_);
    
        $sentenciaENOTI->execute();
        header('location:notifIcacion.php');
    break;
}
?>