<?php include ('global/sesiones.php'); 

$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$division = (isset($_POST['division'])) ? $_POST['division'] : "";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;
$nombreem= $nom['Nombre'];
$divisionem= $per['Division'];
$empleado = (isset($_POST['empleado'])) ? $_POST['empleado'] : "";
$mes= (isset($_POST['mes'])) ? $_POST['mes'] : "";

$corr = $correo['Correo'];
include ("global/conexion.php");


$sentenciaempleados= $pdo -> prepare ("SELECT * FROM empleados WHERE Nombre != 'Administrador' AND Nombre != 'Administrador2' AND Nombre != 'Administrador3'");
$sentenciaempleados->execute();
$listaEmpleados=$sentenciaempleados->fetchAll(PDO::FETCH_ASSOC);

$sentenciaempleado= $pdo -> prepare ("SELECT * FROM proyectos WHERE 1");
$sentenciaempleado->execute();
$resulta=$sentenciaempleado->fetchAll(PDO::FETCH_ASSOC);





?>