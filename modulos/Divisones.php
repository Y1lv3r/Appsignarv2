<?php include ('global/sesiones.php');

$ID=(isset($_POST['ID']))?$_POST['ID']:"";
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
            $error['Nombres']="Escribe los Nombres"; 
        
        }
        if(count($error)>0){
            $mostrarModal=true;
            break;
        }
        
        $sentencia= $pdo ->prepare("INSERT INTO  division (Nombre) VALUES (:Nombre) ");
        $sentencia->bindParam(':Nombre',$txtNombres);
        
        $verificarDivision = mysqli_query($conexion, "SELECT * FROM division WHERE Nombre='$txtNombres' ");
        if(mysqli_num_rows($verificarDivision) > 0){
          echo '
              <script>
                alert("Esta división ya está registrada. Inténtelo nuevamente o verifique los datos en la tabla.");
                window.location = "divisiones.php";
              </script>
          ';
          exit();
        }
        
        $sentencia->execute();
        header('location:divisiones.php');
        
    break;


    case "btnModificar":
        $sentencia= $pdo ->prepare("UPDATE division SET Nombre=:Nombre WHERE ID=:ID"); 
        $sentencia->bindParam(':Nombre',$txtNombres);
        $sentencia->bindParam(':ID',$ID);

        $sentencia->execute();
        header('location:divisiones.php');
    break;


    case "btnEliminar":
        $sentencia= $pdo->prepare("DELETE FROM division WHERE ID=:ID"); 
        $sentencia->bindParam(':ID',$ID);
  
        $sentencia->execute();
        header('location:divisiones.php');
    break;


    case "btnCancelar":
        header('location:divisiones.php');
    break;


    case "Seleccionar":
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal=true;

        $sentencia=$pdo->prepare("SELECT * From division WHERE ID=:ID");
        $sentencia->bindParam(':ID',$ID);
        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);

        $txtNombres=$empleado['Nombre'];
            
    break;  
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM division WHERE 1");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>