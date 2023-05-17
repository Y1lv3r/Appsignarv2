<?php include ('global/sesiones.php'); 

$ID=(isset($_POST['ID']))?$_POST['ID']:"";

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtdivicion=(isset($_POST['txtdivicion']))?$_POST['txtdivicion']:"";
$txtMdivicion=(isset($_POST['txtMdivicion']))?$_POST['txtMdivicion']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("global/conexion.php");


switch($accion){
    
    case "btnAgregar":
        
        if($txtNombres==""){
            $error['Nombres']="Escribe los Nombres"; 
        }
        if(count($error)>0){
            $mostrarModal=true;
            break;
        }
        
        $sentencia= $pdo ->prepare("INSERT INTO  perfil (Nombre) VALUES (:Nombres)");
        $sentencia->bindParam(':Nombres', $txtNombres);

        $verificarPerfil = mysqli_query($conexion, "SELECT * FROM perfil WHERE Nombre='$txtNombres'");
        if(mysqli_num_rows($verificarPerfil) > 0){
          echo '
              <script>
                alert("Este perfil ya está registrado. Inténtelo nuevamente o verifique los datos en la tabla.");
                window.location = "perfil_empleado.php";
              </script>
          ';
          exit();
        }

        $sentencia->execute();
        header('location:perfil_empleado.php');
        
    break;


    case "btnModificar":
        $sentencia= $pdo ->prepare("UPDATE perfil SET Nombre=:Nombre WHERE ID=:ID"); 
        $sentencia->bindParam(':Nombre',$txtNombres);
        $sentencia->bindParam(':ID',$ID);
             
        $sentencia->execute();
              
        header('location:perfil_empleado.php');
    break;
    
    
    case "btnEliminar":
        $sentencia= $pdo->prepare("DELETE FROM perfil WHERE ID=:ID");
        $sentencia->bindParam(':ID',$ID);
        
        $sentencia->execute();
        header('location:perfil_empleado.php');
    break;


    case "btnCancelar":
        header('location:perfil_empleado.php');
    break;
    
    case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal=true;

        $sentencia=$pdo->prepare("SELECT * From perfil WHERE ID=:ID");
        $sentencia->bindParam(':ID',$ID);
           
        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);

        $txtNombres=$empleado['Nombre'];   
    break;  
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM perfil WHERE 1");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>