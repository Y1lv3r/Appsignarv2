<?php include ("./global/conexion.php");
require './correo/PHPMailer.php';
require './correo/SMTP.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APPSIGNAR | Restablecer</title>
  <link rel="shortcut icon" href="./imagenes/logos/icono.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins_index/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins_index/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./plugins_index/adminlte.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    function mostrarPass1() {
      var cambio1 = document.getElementById("txtpass1");

      if (cambio1.type == "password") {
        cambio1.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio1.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }
  </script>

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <?php
    if (isset($_POST['restablecer'])) {

      
      $correo =  $mysqli->real_escape_string($_POST['txtemail']);
      $sql = $mysqli->query("SELECT Nombre,Correo from empleados where Correo='$correo'");
      $row = $sql->fetch_array();
      $count = $sql->num_rows;
      // echo $count;
      if ($count == 1) {

        $token = uniqid();
        $act = $mysqli->query("UPDATE empleados SET token='$token' where Correo='$correo'");
        $email_to = $correo;
        // $email_subject = "Cambio de contrasena";
        // $email_from= "https://srvsecolts01.b1cloud.com.br/appsignar/";
        // $email_message = "hola" .$row['Nombre'].", haz solicitado cambiar tu contraseña, ingresa al siguiente link\n\n";
        // $email_message.="https://srvsecolts01.b1cloud.com.br/appsignar_dev/restablecer.php?user=".$row['Nombre']."&token=".$token."\n\n";

        //envia el correo 
        // $headers= 'From:'.$email_from."\r\n".
        // 'Reply-To: '.$email_from."\r\n" .
        //  'X-Mailer: PHP/'.phpversion();
        // @mail($email_to, $email_subject, $email_message, $headers);

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';

        $body = '¡Hola, ' . $row['Nombre'] . '!<br>' . '<br><br>Ha sido asignado al proyecto ' . $row['Nombre'] . ', en este rango de fechas: <br><br> ' . $row['Nombre'] . ' - ' . $row['Nombre'] . '.<br><br>En los días: ' . $row['Nombre'] . '.<br><br>En las jornadas: ' . $row['Nombre'] . '.<br><br>Su asignación ha sido realizada por ' . $row['Nombre'] . '.<br><br>No siendo más, que tenga un buen día.<br><br>ATT:<br>APPSIGNAR';

        $mail->IsSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->SMTPAuth   = true;
        $mail->SMTPKeepAlive = true; // add it to keep SMTP connection open after each email sent


        $mail->Username   = 'asignaciones.colombia.co@gmail.com';
        $mail->Password   = 'gijfywcdrxvluord';
        $mail->SetFrom('asignaciones.colombia.co@gmail.com', "Appsignar");
        $mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
        $mail->Subject    = 'Asignación';
        $mail->MsgHTML($body);

        $mail->AddAddress($correo, $row['Nombre']);
        $mail->send();

        echo "se envio un link";
      } else {
        echo "este correo electronico no se encontro";
      }
    }



    ?>
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">

      <div class="card-header text-center">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
          <div class="sidebar-brand-text mx-3"><img class="sidebar-brand-text mx-3" width="257px" src="./imagenes/logos/logof.png" alt="..."></div>
        </a>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Por favor, digite su correo.</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="email" name="txtemail" class="form-control" placeholder="Correo electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">

            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="restablecer" class="btn btn-primary btn-block">Ingresar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./plugins_index/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins_index/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./plugins_index/adminlte.min.js"></script>
</body>

</html>