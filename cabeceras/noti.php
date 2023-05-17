<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<?php
include('config.php');
$nombre = $nom['Nombre'];
$corr = $correo['Correo'];



$Sqlnotificacion   = ("SELECT usuario2
    FROM `notificacion` 
    WHERE usuario2 = '$nombre' and leido= '0'");
$resulnoti = mysqli_query($con, $Sqlnotificacion);


?>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - Alerts -->
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

    <style>
        div.ex3 {

            height: 200px;
            overflow: auto;
        }

        @media (min-width: 768px) {
            .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .topbar .dropdown-list {
            padding: 0;
            border: none;
            overflow: hidden;
        }

        .topbar .dropdown-list .dropdown-item {
    white-space: normal;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    border-left: 1px solid #e3e6f0;
    border-right: 1px solid #e3e6f0;
    border-bottom: 1px solid #e3e6f0;
    line-height: 1.3rem;
    border-radius: 20px 20px 15px 15px;
}

        .navbar-expand .navbar-nav .dropdown-menu {
            position: absolute;
            border-radius: 20px 20px 15px 15px;
            width: 350px;
        }

        .navbar-nav .dropdown-menu {
            position: static;
            float: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-menu {
            /*position: absolute;*/
            top: 100%;
            /*left: 0;*/
            z-index: 1000;
            /*display: none;
            float: left;*/
            min-width: 10rem;
            /*padding: 0.5rem 0;*/
            margin: 0.125rem 0 0;
            /*font-size: .85rem;*/
            color: #858796;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            /*border: 1px solid #e3e6f0;*/
            border-radius: 0.35rem;
        }

        .topbar .dropdown-list .dropdown-item {
            white-space: normal;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            border-left: 1px solid #e3e6f0;
            border-right: 1px solid #e3e6f0;
            border-bottom: 1px solid #e3e6f0;
            line-height: 1.3rem;
        }

        .topbar .dropdown-list .dropdown-header {
            background-color: #4e73df;
            border: 1px solid #4e73df;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            color: #fff;
            border-radius: 8px 8px 0px 0px;
        }
    </style>

    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"><?php echo $row_cnt; ?></span>
        </a>

        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">Notificaciones</h6>
            <div class="col-md-12 ex3">
                <br>
                <?php foreach ($resulnoti as $opciones) : ?>
                    <a class="dropdown-item d-flex align-items-center" href="notificacion.php">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500 font-weight-bold"><?php echo $opciones['fecha']; ?></div>
                            <span class="font-weight">
                                <?php echo $opciones['tipo']; ?> realizada por <?php echo $opciones['usuario1']; ?>,
                                en el proyecto de "<?php echo $opciones['proyecto']; ?>", en este rango de fecha:
                                <?php echo $opciones['fechain']; ?> hasta <?php echo $opciones['fechafin']; ?>
                            </span>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>

            <!--<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
        </div>
    </li>