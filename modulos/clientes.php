<?php  
include ('global/sesiones.php');
$txt=(isset($_POST['txt']))?$_POST['txt']:"";
$ID=(isset($_POST['ID']))?$_POST['ID']:"";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";

$txtPepConsultor=(isset($_POST['txtPepConsultor']))?$_POST['txtPepConsultor']:"";
$txtPepTecnico=(isset($_POST['txtPepTecnico']))?$_POST['txtPepTecnico']:"";

$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$txtresponsable=(isset($_POST['txtresponsable']))?$_POST['txtresponsable']:"";
$txtMresponsable=(isset($_POST['txtMresponsable']))?$_POST['txtMresponsable']:"";

$txtresponsablebackup=(isset($_POST['txtresponsablebackup']))?$_POST['txtresponsablebackup']:"";
$txtMresponsablebackup=(isset($_POST['txtMresponsablebackup']))?$_POST['txtMresponsablebackup']:"";


$fecha1=(isset($_POST['$fecha1']))?$_POST['$fecha1']:"";
$fecha2=(isset($_POST['$fecha2']))?$_POST['$fecha2']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("global/conexion.php");

switch($accion){
  
  case "btnAgregar":
      $sentencia= $pdo ->prepare("INSERT INTO proyectos (Nombre,PepConsultor,PepTecnico,Descripcion,Responsable,ResponsableBackup) 
      VALUES (:Nombre,:PepConsultor,:PepTecnico,:Descripcion,:Responsable,:ResponsableBackup) ");
           
      $sentencia->bindParam(':Nombre',$txtNombres);
      $sentencia->bindParam(':PepConsultor',$txtPepConsultor);
      $sentencia->bindParam(':PepTecnico',$txtPepTecnico);
      $sentencia->bindParam(':Descripcion',$txtDescripcion);
      $sentencia->bindParam(':Responsable',$txtresponsable);
      $sentencia->bindParam(':ResponsableBackup',$txtresponsablebackup);

      $verificarProyecto = mysqli_query($conexion, "SELECT * FROM proyectos WHERE Nombre='$txtNombres'");
      if(mysqli_num_rows($verificarProyecto) > 0){
        echo '
        <script>
          alert("No se puede registrar este proyecto. Inténtelo nuevamente o verifique los datos que hay en la tabla.");
          window.location = "proyectos.php";
        </script>
        ';
        exit();
      }

      $sentencia->execute();
      header('location:proyectos.php');          
  break;


  case "btnModificar":

    $sentenciaS= $pdo->prepare("UPDATE events SET title=:title WHERE title ='$txt'");
    $sentenciaS->bindParam(':title',$txtNombres);
    
    $sentenciaS->execute();
      $sentencia= $pdo ->prepare("UPDATE proyectos SET 
       ID=:ID,
      Nombre=:Nombre,
      PepConsultor=:PepConsultor,
      PepTecnico=:PepTecnico,
      Descripcion=:Descripcion,
      Responsable=:Responsable,
      ResponsableBackup=:ResponsableBackup
      WHERE ID=:ID");
      
      $sentencia->bindParam(':Nombre',$txtNombres);
      $sentencia->bindParam(':PepConsultor',$txtPepConsultor);
      $sentencia->bindParam(':PepTecnico',$txtPepTecnico);
      $sentencia->bindParam(':Descripcion',$txtDescripcion);
      $sentencia->bindParam(':Responsable',$txtresponsable);
      $sentencia->bindParam(':ResponsableBackup',$txtresponsablebackup);
      $sentencia->bindParam(':Nombre',$txtNombres);
      $sentencia->bindParam(':ID',$ID);

      $sentencia->execute();
      header('location:proyectos.php');
  break;
        
        
  case "btnEliminar":
      $sentencia= $pdo->prepare("DELETE FROM proyectos WHERE Nombre =:Nombre"); 
      $sentencia->bindParam(':Nombre',$txtNombres);
  
      $sentencia->execute();
      header('location:proyectos.php');
  break;


  case "btnCancelar":
      header('location:proyectos.php');
  break;


  case "Seleccionar":
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar=$accionCancelar="";
      $mostrarModal=true;

      $sentencia=$pdo->prepare("SELECT * FROM proyectos WHERE ID=:ID");
      $sentencia->bindParam(':ID',$ID);
      $sentencia->execute();
      $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
      $txt=$empleado['Nombre'];
      $txtNombres=$empleado['Nombre'];
      $txtPepConsultor=$empleado['PepConsultor'];
      $txtPepTecnico=$empleado['PepTecnico'];
      $txtDescripcion=$empleado['Descripcion'];
      $txtMresponsable=$empleado['Responsable'];
      $txtMresponsablebackup=$empleado['ResponsableBackup'];
  break;  
    
}

$sentencia= $pdo -> prepare ("SELECT * FROM proyectos WHERE 1");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentenciaR= $pdo -> prepare ("SELECT * FROM empleados WHERE Rol IN('Administrador','Lider') AND Nombre != 'Administrador' AND Nombre != 'Administrador2' AND Nombre != 'Administrador3'");
$sentenciaR->execute();
$listaResponsable=$sentenciaR->fetchAll(PDO::FETCH_ASSOC);

?>