<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APPSIGNAR | Cambiar foto de perfil</title>

    <link rel="shortcut icon" href="./imagenes/logos/icono.ico">

    <link rel="stylesheet" href="css/estilos.css">

    <link rel='stylesheet' href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css'>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <!-- Custom styles for this template-->
    <link href="css/admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    
    <?php include("modulos/cambio_foto.php")?>

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <div class="text-center">
                    <div class="col-lg-12">
                        <div class="p-4">
                            <h1>
                                <font color="#212F3D">
                                    <img class="img-profile rounded-circle" width="150px" src="./imagenes/perfil/<?php echo $fot['Foto'];?>">
                                    &nbsp;
                                    <?php echo $nom['Nombre'];?>&nbsp; | &nbsp;<?php echo $per['Perfil'];?>
                                    <hr>
                                </font>
                            </h1>
                        </div>
                    </div>
                </div>

                <!-- Nested Row within Card Body -->
                <div class="m-0 row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-4">
                            <div class="text-center">
                                <h2 class="text-gray-900">CAMBIAR FOTO DE PERFIL</h2>
                                
                            </div>
                            <form action="" method="post" enctype="multipart/form-data" class="user">
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">CAMBIAR FOTO DE PERFIL</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-row">
                                                    
                                                    <div class="form-group col-md-12">
                                                        <label class="m-0 font-weight-bold text-primary">Correo:</label>
                                                        <input type="email" class="form-control" REQUIRED name="txtCorreo" value="<?php echo $correo['Correo'];?>" id="txtCorreo" require="" readonly>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="m-0 font-weight-bold text-primary">Foto:</label>
                                                        <?php if($txtFoto!=""){?>
                                                            <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../appsignar/imagenes/<?php echo $txtFoto;?>"/>
                                                        <?php }?>
                                                        <input type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?>" placeholder="" id="txtFoto" require="">
                                                    </div>

                                                </div>   
                                            </div>
                                            <div class="modal-footer">
                                                <Button value="btnModificar" <?php  echo $accionModificar; ?> class="btn btn-success" type="submit" name="accion">Modificar</Button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered text-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Desde aquí, puede actualizar su foto de perfil.</th>
                                            </tr>
                                        </thead>
                                            <tr>
                                                <td>
                                                    <form action="" method="post"> 
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                            Actualizar foto de perfil
                                                        </button>
                                                        &nbsp;
                                                        <a href="javascript: history.go(-2)" class="btn btn-primary">
                                                            Regresar
                                                        </a>
                                                    </form>   
                                                </td>
                                                
                                            </tr>
                                    </table>
                                </div>
                                <br><br>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="dist/js/bootstrap.min.js"></script>

    <!-- Script exclusivo para realizar acciones con la contraseña-->
    <script src="js/main_password.js"></script>
    <!-- jQuery -->
    <script src="./plugins_index/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins_index/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./plugins_index/adminlte.min.js"></script>
</body>

</html>