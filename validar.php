<?php  
include ('global/sesiones.php');

$nombre=(isset($_POST['nom']))?$_POST['nom']:"";
$proyecto=(isset($_POST['proyecto']))?$_POST['proyecto']:"";
$estado=(isset($_POST['estado']))?$_POST['estado']:"";

$fecha_inicio=(isset($_POST['fecha_inicio']))?$_POST['fecha_inicio']:"";
$fecha_fin=(isset($_POST['fecha_fin']))?$_POST['fecha_fin']:"";
/*$fecha_inicio='2023-01-04';
$fecha_fin= '2023-01-06';*/
$nueva_fecha =date("Y-m-d",strtotime($fecha_fin."+ 1 days")); 

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("global/conexion.php");

switch($accion){
  
  
        
  case "btnEliminar":
/*echo $nombre;
echo $proyecto;
echo $estado;
echo $fecha_inicio;
echo $fecha_fin;
echo $nueva_fecha;*/
      $sentencia= $pdo->prepare("DELETE FROM events WHERE empleado =:empleado and title=:title and estado=:estado and start BETWEEN '$fecha_inicio' AND '$nueva_fecha'"); 
      $sentencia->bindParam(':empleado',$nombre);
      $sentencia->bindParam(':title',$proyecto);
      $sentencia->bindParam(':estado',$estado);

      $sentencia->execute();
      header('location:asignar.php');
  break;


  
    
}


?>