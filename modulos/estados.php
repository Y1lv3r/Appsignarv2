<?php  
include ('global/sesiones.php');
$ID=(isset($_POST['ID']))?$_POST['ID']:"";

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("global/conexion.php");


switch($accion){
    
    case "btnAgregar":
        if($txtNombres==""){
            $error['nombre']="Escribe los Nombres"; 
        }
        
        if(count($error)>0){
            $mostrarModal=true;
            break;
        }
        
        $sentencia= $pdo ->prepare("INSERT INTO estado (estado) VALUES (:estados)");
        $sentencia->bindParam(':estados',$txtNombres);

        $verificarEstado = mysqli_query($conexion, "SELECT * FROM estado WHERE estado='$txtNombres'");
        if(mysqli_num_rows($verificarEstado) > 0){
          echo '
          <script>
            alert("Este estado ya está registrado. Inténtelo nuevamente o verifique los datos en la tabla.");
            window.location = "estados_empleado.php";
          </script>
          ';
          exit();
        }
        
        $sentencia->execute();
        header('location:estados_empleado.php');
    break;


    case "btnModificar":
        $sentencia= $pdo ->prepare("UPDATE estado SET estado=:estados WHERE ID=:ID"); 
        $sentencia->bindParam(':ID',$ID);
        $sentencia->bindParam(':estados',$txtNombres);

        $sentencia->execute();
        
        header('location:estados_empleado.php');
    break;
    

    case "btnEliminar":
        $sentencia= $pdo->prepare("DELETE FROM estado WHERE ID=:ID");
        
        $sentencia->bindParam(':ID',$ID);
        $sentencia->execute();
        
        header('location:estados_empleado.php');
    break;


    case "btnCancelar":
        header('location:estados_empleado.php');
    break;
    
    case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal=true;

        $sentencia=$pdo->prepare("SELECT * From estado WHERE ID=:ID");
        $sentencia->bindParam(':ID',$ID);
        
        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
        
        $txtNombres=$empleado['estado'];
    break;  
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM estado ");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>