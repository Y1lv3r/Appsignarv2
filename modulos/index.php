<?php  //echo "soy index en modulos";
//echo "soy empleado en modulos" 


if(isset($_POST["btnlogin"])){

    include("global/conexion.php");

    $txtemail=($_POST["txtemail"]);
    $txtpassword=($_POST["txtpassword"]);

    $sentenciaSQL=$pdo->prepare("SELECT * FROM empleados
    WHERE Correo=:Correo AND Clave=:Clave ");
   
    $sentenciaSQL->bindParam("Correo",$txtemail,PDO::PARAM_STR);
    $sentenciaSQL->bindParam("Clave",$txtpassword,PDO::PARAM_STR);
    $sentenciaSQL->execute();
    
    $registro=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
   
     //inicio de sesion
    

    $numeroRegistros=$sentenciaSQL->rowCount();

    if ($numeroRegistros>=1){

        session_start();
         if ($registro['Rol']=='Administrador' ){
            $_SESSION['usuario']=$registro;
            $_SESSION['emple']=$registro;
            header('location:inicio.php');
         }else if ($registro['Rol']=='Lider' ){
            $_SESSION['usuario']=$registro;
            $_SESSION['emple']=$registro;
            header('location:inicio.php');

         }else{
            $_SESSION['usuario']=$registro;
            $_SESSION['emple']=$registro;
            header('location:inicio.php');
         }
      

    }else{
        echo '
        <script>
          alert("Error al iniciar sesión. Verifique que haya escrito correctamente su correo electrónico y su contraseña.");
          window.location = "index.php";
        </script>
        ';
    }
}




?>