
<?php include("modulos/index.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>APPSIGNAR | Jornada Laboral</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style_layout.css">
    <!-- partial -->
    <script src="./js/script_layout.js"></script>
</head>

<?php
include('config.php');
$nombre = $nom['Nombre'];
$corr = $correo['Correo'];

if ($result = mysqli_query($con, "SELECT *
   FROM `notificacion` 
    WHERE usuario2 = '$nombre' and leido= '0' ORDER BY ID desc")) {

    /* determinar el número de filas del resultado */
    $row_cnt = mysqli_num_rows($result);

    //printf("El resultado tiene %d filas.\n", $row_cnt);

    /* cerrar el resulset */
    mysqli_free_result($result);
}
$Sqlnotificacion   = ("SELECT *
      FROM `notificacion` 
       WHERE usuario2 = '$nombre' and leido= '0' ORDER BY ID desc");
$resulnoti = mysqli_query($con, $Sqlnotificacion);

?>

<body>
    <!-- partial:index.partial.html -->

    <div class="main-wrap">

        <input type="checkbox" class="openSidebarMenu inpu" id="slide-sidebar">
        <label for="slide-sidebar" class="icono_menu_lateral abrirmenu">
            <div class="iconomenu diagonal part-1"></div>
            <div class="iconomenu horizontal"></div>
            <div class="iconomenu diagonal part-2"></div>
        </label>
        <!--
    <input id="slide-sidebar" type="checkbox" role="button" />
    <label class="abrirmenu" for="slide-sidebar"><span><i class="fa fa-bars"></i></span></label>
    -->
        <!-- Menú superior Horizontal -->
        <div class="menuh">
            <!-- Cabecera -->
            <div class="cabecera">
                <div class="cabezar">
                    <span class="cabececolor">Jornada Laboral</span>
                </div>
            </div>