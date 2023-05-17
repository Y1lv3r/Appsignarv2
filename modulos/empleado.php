<?php  
include ('global/sesiones.php');
$nombreasignador = (isset($_POST['nomasignador'])) ? $_POST['nomasignador'] : "";
$txtNombres=(isset($_POST['txtNombres']))?$_POST['txtNombres']:"";
$txtApellidos=(isset($_POST['txtApellidos']))?$_POST['txtApellidos']:"";
$txtDivision=(isset($_POST['txtDivision']))?$_POST['txtDivision']:"";
$txtMdivicion=(isset($_POST['txtMdivicion']))?$_POST['txtMdivicion']:"";
$txtMperfil=(isset($_POST['$txtMperfil']))?$_POST['$txtMperfil']:"";
$txtPerfil=(isset($_POST['txtPerfil']))?$_POST['txtPerfil']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txttiposesion=(isset($_POST['txttiposesion']))?$_POST['txttiposesion']:"";
$txtcontrato=(isset($_POST['txtcontrato']))?$_POST['txtcontrato']:"";
$txtMrol=(isset($_POST['txtMrol']))?$_POST['txtMrol']:"";
$txtMcontrato=(isset($_POST['txtMcontrato']))?$_POST['txtMcontrato']:"";
$txtpassword=(isset($_POST['txtpassword']))?$_POST['txtpassword']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";
$skype=(isset($_POST['skype']))?$_POST['skype']:"";
$teljefe=(isset($_POST['teljefe']))?$_POST['teljefe']:"";
$telemp=(isset($_POST['telemp']))?$_POST['telemp']:"";
$skypem=(isset($_POST['skypem']))?$_POST['skypem']:"";
$teljefem=(isset($_POST['teljefem']))?$_POST['teljefem']:"";
$telempm=(isset($_POST['telempm']))?$_POST['telempm']:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";

$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("global/conexion.php");


switch($accion){
  
  case "btnAgregar":
      $sentencia= $pdo ->prepare("INSERT INTO empleados (Nombre,Division,Perfil,Correo,Skype,Clave,Rol,Contrato,Telefono,Telefono_Jefe_Directo,Foto,Creadopor) 
      VALUES (:Nombre,:Division,:Perfil,:Correo,:Skype,:Clave,:Rol,:Contrato,:Telefono,:Telefono_Jefe_Directo,:Foto,:Creadopor) ");
          $programas = addslashes(implode("-", $_POST['programas']));
      $sentencia->bindParam(':Nombre', $txtNombres);
      $sentencia->bindParam(':Division',$txtDivision);
      $sentencia->bindParam(':Perfil',$programas);
      $sentencia->bindParam(':Correo',$txtCorreo);
      $sentencia->bindParam(':Skype',$skype);
      $sentencia->bindParam(':Clave',$txtpassword);
      $sentencia->bindParam(':Rol',$txttiposesion);
      $sentencia->bindParam(':Contrato',$txtcontrato);
      $sentencia->bindParam(':Telefono',$telemp);
      $sentencia->bindParam(':Telefono_Jefe_Directo',$teljefe);
      $sentencia->bindParam(':Creadopor',$nombreasignador);

      $Fecha= new DateTime();
      $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"pordefecto.png";
      $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
            
      if ($tmpFoto!=""){
        move_uploaded_file($tmpFoto,"../appsignarv2/imagenes/".$nombreArchivo);
      }
      
      $sentencia->bindParam(':Foto',$nombreArchivo);

      $verificarEmpleado = mysqli_query($conexion, "SELECT * FROM empleados WHERE Correo='$txtCorreo'");
      if(mysqli_num_rows($verificarEmpleado) > 0){
        echo '
        <script>
          alert("No se puede registrar este empleado. Inténtelo nuevamente o verifique los datos en la tabla.");
          window.location = "empleado.php";
        </script>
        ';
        exit();
      }
              
      $sentencia->execute();
    
      /*insertar  empleadosa events*/
     
  

      $sentenciae= $pdo ->prepare("INSERT INTO events
             (title, empleado, correo, color, start, end, area,estado,lugar,hora_asig, semana) 
       VALUES ('','$txtNombres','$txtCorreo', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00','','','Home Office','', '')");
      
      $sentenciae->execute();
     

      header('location:empleado.php');         
  break;


  case "btnModificar":
  
    if (isset($_POST['programas'])){

      echo 'tiene datos';
      
      }else{
      
      echo '
      <script>
        alert("No se puede modificar este empleado. Debe seleccionar su perfil.");
        window.location = "empleado.php";
      </script>
      ';
      exit();    
      }

    $programas = addslashes(implode("-", $_POST['programas']));
    
    $sentenciasig= $pdo ->prepare("UPDATE  events SET 
    empleado= :empleado,
    Correo=:Correo
   

    WHERE Correo= :Correo"); 
    
    $sentenciasig->bindParam(':empleado',$txtNombres);
    $sentenciasig->bindParam(':Correo',$txtCorreo);
    $sentenciasig->execute();
      
      $sentencia= $pdo ->prepare("UPDATE  empleados SET 
      Nombre=:Nombre,Division=:Division, 
      Perfil=:Perfil, 
      Correo=:Correo, 
      Skype=:Skype,
      Clave=:Clave, 
      Rol=:Rol, 
      Contrato=:Contrato,
      Telefono=:Telefono,
      Telefono_Jefe_Directo=:Telefono_Jefe_Directo 
      WHERE Correo= :Correo"); 
     $programas = addslashes(implode("-", $_POST['programas']));   
      $sentencia->bindParam(':Nombre',$txtNombres);
      $sentencia->bindParam(':Division',$txtDivision);
      $sentencia->bindParam(':Perfil',$programas);
      $sentencia->bindParam(':Correo',$txtCorreo);
      $sentencia->bindParam(':Skype',$skype);
      $sentencia->bindParam(':Clave',$txtpassword);
      $sentencia->bindParam(':Rol',$txttiposesion);
      $sentencia->bindParam(':Contrato',$txtcontrato);
      $sentencia->bindParam(':Telefono',$telemp);
      $sentencia->bindParam(':Telefono_Jefe_Directo',$teljefe);


      $sentencia->execute();
      $Fecha= new DateTime();
      $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"pordefecto.png";
      $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
      
      if ($tmpFoto!=""){
        move_uploaded_file($tmpFoto,"../appsignarv2/imagenes/".$nombreArchivo);
        $sentencia=$pdo->prepare("SELECT Foto From empleados WHERE Correo =:Correo");
        $sentencia->bindParam(':Correo',$txtCorreo);

        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
        print_r($empleado);

        if(isset($empleado["Foto"])){
          if(file_exists("../appsignarv2/imagenes/".$empleado["Foto"])){
            
            if($empleado['Foto']!="pordefecto.png"){
              unlink("../appsignarv2/imagenes/".$empleado["Foto"]);
            }
          }
        }
                  
        $sentencia= $pdo ->prepare("UPDATE empleados SET Foto=:Foto WHERE Correo =:Correo"); 
        $sentencia->bindParam(':Foto',$nombreArchivo);
        $sentencia->bindParam(':Correo',$txtCorreo);

        

        $sentencia->execute();
        
      }
      header('location:empleado.php');
  break;


  case "btnEliminar":
    
    $sentencia2= $pdo->prepare("UPDATE empleados SET estado='Inactivo' WHERE Correo =:Correo");
    $sentencia2->bindParam(':Correo',$txtCorreo);
    
    $sentencia2->execute();
    header('location:empleado.php');
  break;


  case "btnCancelar":
      header('location:empleado.php');
  break;
        
  
  case "Seleccionar":
      $accionAgregar="disabled";
      $accionModificar=$accionEliminar=$accionCancelar="";
      $mostrarModal= true;
                
      $sentencia=$pdo->prepare("SELECT * From empleados WHERE Correo=:Correo");
      $sentencia->bindParam(':Correo',$txtCorreo);
      $sentencia->execute();
            
      $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
           
      $txtNombres= $empleado['Nombre'];
      $txtMdivicion=$empleado['Division'];
      $txtMperfil=$empleado['Perfil'];
      $txtCorreo=$empleado['Correo'];
      $skype=$empleado['Skype'];
      $txtpassword=$empleado['Clave'];
      $txtMrol=$empleado['Rol'];
      $txtMcontrato=$empleado['Contrato'];
      $telemp=$empleado['Telefono'];
      $teljefe=$empleado['Telefono_Jefe_Directo'];
      $txtFoto=$empleado['Foto'];
  break;  
   
    
}
if(isset($_GET['Correo'])){
  $idcliente = $_GET['Correo'];
  $sql = mysqli_query($conexion, "SELECT * FROM empleado WHERE Correo = $idcliente");
  $data = mysqli_fetch_array($sql);
  echo json_encode($data);
  exit;
}

$sentencia= $pdo -> prepare ("SELECT * FROM empleados WHERE Nombre != 'Administrador' AND Nombre != 'Administrador2' AND Nombre != 'Administrador3'  AND Division != '' AND estado !='Inactivo'  ORDER BY Nombre ASC");
$sentencia->execute();
$listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia= $pdo -> prepare ("SELECT Division FROM empleados ");
$sentencia->execute();
$lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentenciaD= $pdo -> prepare ("SELECT * FROM division ");
$sentenciaD->execute();
$listaDivision=$sentenciaD->fetchAll(PDO::FETCH_ASSOC);

$sentenciap= $pdo -> prepare ("SELECT * FROM Perfil ");
$sentenciap->execute();
$listaPerfil=$sentenciap->fetchAll(PDO::FETCH_ASSOC);

$sentenciar= $pdo -> prepare ("SELECT * FROM rol ");
$sentenciar->execute();
$listarol=$sentenciar->fetchAll(PDO::FETCH_ASSOC);
$sentenciatipo= $pdo -> prepare ("SELECT * FROM contrato");
$sentenciatipo->execute();
$listacontrato=$sentenciatipo->fetchAll(PDO::FETCH_ASSOC);
