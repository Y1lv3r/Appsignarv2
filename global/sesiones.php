<?php 

session_start();
if(!isset($_SESSION['usuario'])){
    //echo "redirigir al login...no hay usuario";
    header('location:index.php');
}{
    $nom=$_SESSION['usuario'];
    $per=$_SESSION['usuario'];
    $fot=$_SESSION['usuario'];
    $clave=$_SESSION['usuario'];
    $rol=$_SESSION['usuario'];
    $correo=$_SESSION['usuario'];
    $DIV=$_SESSION['usuario'];
    $rol1="Administrador";
    $rol2="Colaborador";
    $rol3="Lider";
    //print_r($_SESSION['usuario']);
    $empleadoprueba=$_SESSION['emple'];
}
?>