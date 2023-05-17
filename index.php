<?php include ("modulos/index.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APPSIGNAR | Login</title>
  <link rel="shortcut icon" href="./imagenes/logos/icono.ico" >
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

        if(cambio1.type == "password") {
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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    
    <div class="card-header text-center">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3"><img class="sidebar-brand-text mx-3" width="257px" src="./imagenes/logos/logof.png" alt="..."></div>
      </a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Por favor, digite sus credenciales para iniciar sesión.</p>

      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="txtemail" class="form-control" placeholder="Correo electrónico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input ID="txtpass1" type="password" name="txtpassword" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <button id="show_password1" class="btn btn-primary" type="button" onclick="mostrarPass1()">
              <span class="fa fa-eye-slash icon"></span>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit"  name="btnlogin" class="btn btn-primary btn-block">Ingresar</button>
          
            
          <!-- /.col -->
        </div>
        <div class="col-12">
        <a class="collapse-item" href="restablecer">Restablecer contraseña</a>
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
