<?php
include("conf.php");
$servidor= "mysql:dbname=".BD.";host=".SERVIDOR;

// Esta lìnea es únicamente para hacer proceso de validación de datos y Data Maestra
$conexion = mysqli_connect("localhost","root", "","appsignar_cambios");

try{
     $pdo= new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

}catch(PDOException $e){

    echo "<script> alert('Error...'); </script>";
    
}

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=appsignar_cambios;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$link = mysqli_connect("localhost", "root", "");
if ($link) {
    mysqli_select_db($link, "appsignar_cambios");
}


$mysqli = new mysqli("localhost", "root", "", "appsignar_cambios");
?>