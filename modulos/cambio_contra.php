<?php  
include ('global/sesiones.php');

$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtpassword=(isset($_POST['txtpassword']))?$_POST['txtpassword']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionModificar=$accionCancelar="enabled";
$mostrarModal=false;

include ("global/conexion.php");


switch($accion){
    
    case "btnModificar": 
        $sentencia= $pdo ->prepare("UPDATE empleados SET Clave=:Clave WHERE Correo= :Correo");

        $sentencia->bindParam(':Correo',$txtCorreo);
        $sentencia->bindParam(':Clave',$txtpassword);

        $sentencia->execute();

        $Fecha= new DateTime();
        
        header('location:config_contra.php');
    break;
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM empleados WHERE Correo = '".$correo['Correo']."'");
$sentencia->execute();
$listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

