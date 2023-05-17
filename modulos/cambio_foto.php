<?php  
include ('global/sesiones.php');

$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionModificar="enabled";
$mostrarModal=false;

include ("global/conexion.php");

switch($accion){

    case "btnModificar":

        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"pordefecto.png";
        $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
        
        if ($tmpFoto!=""){
          move_uploaded_file($tmpFoto,"./imagenes/perfil/".$nombreArchivo);
          $sentencia=$pdo->prepare("SELECT Foto FROM empleados WHERE Correo= :Correo");
          $sentencia->bindParam(':Correo',$txtCorreo);

          $sentencia->execute();
          $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
          print_r($empleado);
  
          if(isset($empleado["Foto"])){
            if(file_exists("./imagenes/perfil/".$empleado["Foto"])){
              
              if($empleado['Foto']!="pordefecto.png"){
                unlink("./imagenes/perfil/".$empleado["Foto"]);
              }
            }
          }
                    
          $sentencia= $pdo ->prepare("UPDATE empleados SET Foto=:Foto WHERE Correo =:Correo"); 
          $sentencia->bindParam(':Foto',$nombreArchivo);
          $sentencia->bindParam(':Correo',$txtCorreo);
    
          $sentencia->execute();
        }
        header('location:config_foto.php');
    break;
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM empleados WHERE Correo = '".$correo['Correo']."'");
$sentencia->execute();
$listaUsuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

