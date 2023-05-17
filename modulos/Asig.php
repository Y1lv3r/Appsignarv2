<?php
include ('global/sesiones.php');



$mostrarModal=false;

include ("global/conexion.php");





$sentencia= $bdd -> prepare ("SELECT * FROM empleados WHERE estado != 'Inactivo' AND Nombre != 'Administrador' AND Nombre != 'Administrador2' AND estado != 'inactivo' AND Nombre != 'Administrador3' AND Division != ''");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentenciaD = $bdd->prepare("SELECT * FROM division ");
$sentenciaD->execute();
$listaDivision = $sentenciaD->fetchAll(PDO::FETCH_ASSOC);

$sentenciap = $bdd->prepare("SELECT * FROM Perfil ");
$sentenciap->execute();
$listaPerfil = $sentenciap->fetchAll(PDO::FETCH_ASSOC);

$sentenciac = $bdd->prepare("SELECT * FROM proyectos ");
$sentenciac->execute();
$listaCliente = $sentenciac->fetchAll(PDO::FETCH_ASSOC);

$sentenciae = $bdd->prepare("SELECT * FROM estado ");
$sentenciae->execute();
$listaEstado = $sentenciae->fetchAll(PDO::FETCH_ASSOC);

$sentencial = $bdd->prepare("SELECT * FROM lugar ");
$sentencial->execute();
$listaLugar = $sentencial->fetchAll(PDO::FETCH_ASSOC);

$sentenciaarea = $bdd->prepare("SELECT * FROM area ");
$sentenciaarea->execute();
$listaArea = $sentenciaarea->fetchAll(PDO::FETCH_ASSOC);

$sentenciaperfi = $bdd->prepare("SELECT * FROM perfil_asignacion ");
$sentenciaperfi->execute();
$listaPerfia = $sentenciaperfi->fetchAll(PDO::FETCH_ASSOC);




