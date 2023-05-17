<?php include("./botonup.php") ?>
<?php include("modulos/Asig.php") ?>
<?php include("./cabeceras/cabecera_Asig.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
/* SELECCIONAR semana fin o no */
$sentenciafinsemana = $bdd->prepare("SELECT fin_de_semana FROM fin_semana");
$sentenciafinsemana->execute();
$listaFinsemana = $sentenciafinsemana->fetchAll(PDO::FETCH_ASSOC);
$findes = "false";
foreach ($listaFinsemana as $resultadofinsemana) :
    $findes = $resultadofinsemana['fin_de_semana'];
endforeach;

/******************** */
/* SELECCIONAR EMPLEADO */
$sentenciaempleados = $bdd->prepare("SELECT DISTINCT empleado FROM events");
$sentenciaempleados->execute();
$listaEmpleadoss = $sentenciaempleados->fetchAll(PDO::FETCH_ASSOC);
/******************** */
/* RECIBE EL NOMBRE DEL FORMULARIO */
$empleado = null;
if (empty($empleadoprueba['empleado'])) {
    $calendarios = null;
} else {
    echo $calendarios = $empleadoprueba['empleado'];
}
//echo "<br><br><br>" . $empleadoprueba['Nombre'] . " nada<br>";
/******************* */

/* ASIGNO EL USUARIO LOGGEADO A LA VARIABLE */
$usuario = $nom['Nombre'];
$empleado2 = (isset($_POST['empleado'])) ? $_POST['empleado'] : "";
echo "<br>" . "<br>" . "<br>" . $empleado2;
/******************* */

/*********************************************************************************** */
?>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
<?php
//echo $calendarios;

//asignaciones alertas
if (isset($_GET["Rango"])) {
    $Rango = ($_GET['Rango']);
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(5).setContent('Asignaciones agregadas correctamente en el rango de fechas');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
} elseif (isset($_GET["Tdia"])) {
    $Tdia = ($_GET['Tdia']);
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(5).setContent('Asignación agregada correctamente todo el día');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
} elseif (isset($_GET["horaespecifica"])) {
    $horaespecifica = ($_GET['horaespecifica']);
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(5).setContent('Asignación agregada correctamente en las horas seleccionadas');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
} elseif (isset($_GET["eliminar"])) {
    $eliminar = ($_GET['eliminar']);
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(5).setContent('Asignación eliminada correctamente');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
} elseif (isset($_GET["noeditar"])) {
    $noeditar = ($_GET['noeditar']);
?>
    <script>
        var msg = alertify.error('Default message');
        msg.delay(5).setContent('No puede modificar asignaciones anteriores al día actual');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
} elseif (isset($_GET["editar"])) {
    $editar = ($_GET['editar']);
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(5).setContent('Asignación modificada correctamente');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
}



if (isset($_GET["variable1"])) {
    $variable1 = ($_GET['variable1']);
    $calendarios = $usuario;
    $empleado = $calendarios;
    /*echo "<br> despues de este";
	echo $empleado;
	echo "<br>" . $variable1;*/
?>
    <script>
        alertify.set('notifier', 'position', 'button-right');
        alertify.error('Este Empleado no existe, por favor elegir otro');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
    //echo '<script language="javascript">alert("juas");</script>';
    $sql = "SELECT id, title, start, end, color, empleado, correo, area, estado, division, perfil, lugar FROM events WHERE empleado LIKE '%$calendarios%' AND title IS NOT NULL AND title != ''";
    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();
} elseif (isset($_GET["nombresi"])) {
    $nombresi = ($_GET['nombresi']);
    $empleado = $nombresi;
?>
    <script>
        var msg = alertify.success('Default message');
        msg.delay(3).setContent('Empleado cargado');
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "asignar");
    </script>
<?php
    //echo $empleado . "enviado nombre<br>";
    $sql = "SELECT id, title, start, end, color, empleado, correo, area, estado, division, perfil, lugar FROM events WHERE empleado LIKE '%$empleado%' AND title IS NOT NULL AND title != ''";
    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();
} else {
    $empleado = $usuario;
    //echo $empleado . "igual que el enviado<br>";
    $sql = "SELECT id, title, start, end, color, empleado, correo, area, estado, division, perfil, lugar FROM events WHERE empleado LIKE '%$empleado%' AND title IS NOT NULL AND title != ''";
    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();
}

/************************************************************************************ */


/************************************************************************************ */


/* SELECCIONAR EL CALENDARIO INICIAL */
//echo $empleado . "siempre<br>";

//echo $empleado . ' despues de todos los if';
/************************ */

/*
$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
*/
//echo $empleado . "<br>";

//**********************hora laboral************************* */
$sql2 = "SELECT * FROM hora_laboral ";
$requ = $bdd->prepare($sql2);
$requ->execute();
$result = $requ->fetchAll();
$hora_fi = '';
$hora_in = '';
foreach ($result as $resultado) :
    $hora_in = $resultado['hora_inicio'];
    $hora_fi = $resultado['hora_fin'];
endforeach;

//echo $hora_in . '<br>';
//echo $hora_fi;
?>
<!-- Bootstrap Core CSS -->
<link href="./css/modal.css" rel="stylesheet">

<!-- FullCalendar -->
<link href='css/fullcalendar.css' rel='stylesheet' />

<!-- menu desplegable 
<link rel="stylesheet" href="css/estiloinput.css">
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Custom CSS -->
<style>
    #calendar {
        /*max-width: 800px;*/
    }

    .modal-dialog {
        position: relative;
        width: auto;
        margin: 0.5rem;
        pointer-events: all;
    }

    .fade:not(.show) {
        /* opacity: 1; */
    }

    .container {
        padding-right: 15px px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: 0;
    }

    .modal-content2 {
        position: relative;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 6px;
        outline: 0;
        width: 100%;
        -webkit-box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
        box-shadow: 0 3px 9px rgb(0 0 0 / 50%);
    }

    .col-centered {
        float: none;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .form-horizontal .form-group {
        margin-right: 1px;
        margin-left: -15px;
    }

    #centere {

        width: 500px;
        height: 360px;
        margin: 20px;
        float: left;
    }

    td.fc-day.fc-widget-content.fc-sat {
        background-color: #f1f1f1;
    }

    td.fc-day.fc-widget-content.fc-sun {
        background-color: #f1f1f1;
    }

    td.fc-day.fc-widget-content.fc-past {
        background-color: rgb(241 241 241);
    }

    .fc .fc-button-group>* {
        float: left;
        /* margin: 0 0 0 -1px; */
        /* margin-left: 0; */
        /* min-width: 130px; */
        /* height: 40px; */
        color: #fff;
        /* padding: 5px 10px; */
        /* font-weight: bold; */
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border-radius: 6px;
        border: none;
        box-shadow: inset 2px 2px 2px 0px rgb(255 255 255 / 50%), 7px 7px 20px 0px rgb(0 0 0 / 10%), 4px 4px 5px 0px rgb(0 0 0 / 10%);
        background: #337ab7;
        z-index: 1;
    }

    .fc-toolbar .fc-state-active,
    .fc-toolbar .ui-state-active {
        z-index: 4;
        /* font-weight: bold; */
        border-radius: 5px;
        box-shadow: inset 2px 2px 2px 0px rgb(255 255 255 / 50%), 7px 7px 20px 0px rgb(0 0 0 / 10%), 4px 4px 5px 0px rgb(0 0 0 / 10%);
        transition: all 0.3s ease;
        background-color: #6c757d;
    }

    .fc-toolbar button:focus {
        z-index: 5;
        /* position: absolute; */
        /* content: ""; */
        /* width: 0; */
        /* height: 100%; */
        /* top: 0; */
        /* z-index: -1; */
        background-color: #6c757d;
        /* right: 0; */
    }

    th.fc-day-header.fc-widget-header.fc-sun {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-sun:after {
        visibility: visible;
        content: 'Dom';
    }

    th.fc-day-header.fc-widget-header.fc-mon {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-mon:after {
        visibility: visible;
        content: 'Lun';
    }

    th.fc-day-header.fc-widget-header.fc-tue {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-tue:after {
        visibility: visible;
        content: 'Mar';
    }

    th.fc-day-header.fc-widget-header.fc-wed {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-wed:after {
        visibility: visible;
        content: 'Mié';
    }

    th.fc-day-header.fc-widget-header.fc-thu {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-thu:after {
        visibility: visible;
        content: 'Jue';
    }

    th.fc-day-header.fc-widget-header.fc-fri {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-fri:after {
        visibility: visible;
        content: 'Vie';
    }

    th.fc-day-header.fc-widget-header.fc-sat {
        /* display: none; */
        /* content: 'whatever it is you want to add'; */
        visibility: hidden;
    }

    th.fc-day-header.fc-widget-header.fc-sat:after {
        visibility: visible;
        content: 'Sáb';
    }
</style>
<style>
    .textos {
        border-color: #cccccc;
        padding: 0px;
        font-size: 15px;
        border-style: hidden;
        border-width: 0px;
        background-color: #ffffff;
        box-shadow: 0px 0px 0px 0px rgba(42, 42, 42, .0);
        text-shadow: 0px 0px 0px rgba(42, 42, 42, .0);
        font-weight: bold;
        font-style: none;
        font-family: sans-serif;
        width: 100px;
    }

    .textos:focus {
        outline: none;
    }

    .textos2 {
        border-color: #cccccc;
        width: 169px;
        padding: 0px;
        font-size: 15px;
        border-style: hidden;
        border-width: 0px;
        background-color: #ffffff;
        box-shadow: 0px 0px 0px 0px rgba(42, 42, 42, .0);
        text-shadow: 0px 0px 0px rgba(42, 42, 42, .0);
        font-weight: bold;
        font-style: none;
        font-family: sans-serif;

    }

    .textos2:focus {
        outline: none;
    }
</style>
<style>
    .swal2-popup {
        display: none;
        position: relative;
        box-sizing: border-box;
        grid-template-columns: minmax(0, 100%);
        width: 32em !important;
        height: 15em;
        max-width: 100%;
        padding: 0 0 1.25em;
        border: none;
        border-radius: 5px;
        background: #fff;
        color: #545454;
        font-family: inherit;
        font-size: 1rem;
    }

    .swal2-styled.swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #7066e0;
        color: #fff;
        font-size: 1.5em;
    }

    .swal2-styled.swal2-deny {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #dc3741;
        color: #fff;
        font-size: 1.5em;
    }

    .ver {
        display: initial !important;
    }

    .tamaño {

        width: 25px !important;
    }

    .tamaño input:checked~.control_indicator {
        background: #2bca15;
    }
</style>

<div class="container page-content">

    <div class="col-xl-12 col-lg-12">
        <br>
        <br>
        <form action="recibir" method="post">
            <form action="" method="post">

                <div class="modal-content2 modal-xl">
                    <br>
                    <div class="row">
                        <div class="container-fluid">
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">


                                <div class="form-group col-md-4">

                                    <input type="search" name="empleado" list="empleados" class="form-control mb-2 mr-sm-2 form-control bg-light " placeholder="<?php echo $empleado ?>" autocomplete="off" required>
                                    <datalist id="empleados">
                                        <?php foreach ($listaEmpleados as $opciones) : ?>
                                            <option value="<?php echo $opciones['Nombre'] ?>"></option>
                                        <?php endforeach ?>

                                    </datalist>



                                    <input type="text" style="display:none" name="nomasignador" value="<?php echo $nom['Nombre']; ?>" />
                                </div>
                                <div class="form-group col-md-4">
                                    <button value="" class="btn btn-primary" name="accion">Consultar</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Eliminar Asignación</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="modal-header">
                        <h3 class=" text-uppercase modal-title text-center font-weight-bold text-primary" id="exampleModalLabel">Calendario de asignación de:</h3><br>
                        <h4 class="m-0 font-weight-bold text-success" class="label" align="center"><?php echo $empleado ?></h4>
                    </div>
                    <div class="modal-body">
                        <!--<div class="form-row">
									<div class="form-group col-md-9">
									</div>
									<div class="form-group col-sm-3">
										<select class="custom-select form-control form-control-sm" name="paises" id="paises" onchange="this.form.submit()">
											<option value="">Seleccione Semana...</option>
											<option value="false">Semana Laboral</option>
											<option value="true">Semana completa</option>
										</select>
									</div>
									<div class="form-group col-md-9">
									</div>
									<?php
                                    $finde = 'false';
                                    if (isset($_POST["paises"])) {
                                        $finde = $_POST["paises"];
                                        if ($finde == "true") {
                                    ?>
											<div class="form-group col-sm-3 form-control-sm text-primary" style="position: absolute;top: 1.5cm;left: 79.5%; z-index: 10;">
												<i class="fa-solid fa-calendar-plus"></i><label class="m-0 font-weight-bold text-primary"> Semana Completa</label>
											</div>

										<?php } else {
                                        ?>
											<div class="form-group col-sm-3 form-control-sm text-primary" style="position: absolute;top: 1.5cm;left: 79.5%; z-index: 10;">
												<i class="fa-solid fa-calendar-minus"></i><label class="m-0 font-weight-bold text-primary"> Semana Laboral</label>
											</div>
											<?php }
                                    } ?>

											<?php
                                            $verd2 = "false";
                                            $verd2 = (isset($_POST['paises'])) ? $_POST['paises'] : "";

                                            if ($verd2 == "Si") {
                                                $verd2 = "true";
                                                //echo $verd2;
                                            } else {
                                                $verd2 = "false";
                                                //echo $verd2;
                                            }
                                            ?>
										</div>-->
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div id="calendar" class="col-centered">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </from>
            </form>
            <?php
            /*
				$finde = 'false';
				echo $findes;
				echo $empleado
				*/
            ?>
    </div>

</div>

<!-- Modal Agregar -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="addEvent.php" id="formu" autocomplete="off">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title2" id="myModalLabel">Agregar Asignación</h4>
                </div>
                <div class="modal-body">
                    <div class="form-row" style="width: 108%;">
                        <div class="form-group col-md-6">
                            <label for="empleado" class="textoformu m-0 font-weight-bold text-primary">Empleado:</label>
                            <?php
                            if (!empty($empleado)) {
                                $readonly = 'readonly';
                            } else {
                                $readonly = '';
                            }
                            //echo $readonly;
                            ?>
                            <input type="search" name="empleado" list="empleados" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" value="<?php echo $empleado; ?>" placeholder="<?php echo $empleado ?>" <?php //echo $readonly 
                                                                                                                                                                                                                                    ?> autocomplete="off" required>
                            <datalist id="empleados">
                                <?php foreach ($listaEmpleados as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"></option>
                                <?php endforeach ?>
                            </datalist>
                            <input type="text" name="nomasignador" style="display:none" value="<?php echo $nom['Nombre']; ?>" />
                        </div>&nbsp;
                        <div class="form-group col-sm-6">
                            <label for="title" class="textoformu m-0 font-weight-bold text-primary">Proyecto:</label>
                            <input type="text" name="title" list="proyectos" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="title" placeholder="Proyecto" required>
                            <datalist id="proyectos">
                                <?php foreach ($listaCliente as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Responsable'] ?></option>
                                <?php endforeach ?>
                            </datalist>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-group col-md-6">
                            <label for="area" class="textoformu m-0 font-weight-bold text-primary">Área:</label>
                            <input type="text" name="area" list="areas" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="area" placeholder="Area" required>
                            <datalist id="areas">
                                <?php foreach ($listaArea as $opciones) : ?>
                                    <option value="<?php echo $opciones['area'] ?>"><?php echo $opciones['area'] ?></option>
                                <?php endforeach ?>
                            </datalist>
                        </div>&nbsp;
                        <div class="form-group col-md-6">
                            <label for="estado" class="textoformu m-0 font-weight-bold text-primary">Estado:</label>
                            <select class="custom-select form-control mb-2 mr-sm-2 form-control bg-light formularioinput" REQUIRED name="estado" id="estado">
                                <option value="">Estado...</option>
                                <?php foreach ($listaEstado as $opciones) : ?>
                                    <option value="<?php echo $opciones['estado'] ?>"><?php echo $opciones['estado'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>&nbsp;
                        <!-- Inicio select anidado división -->
                        <!-- select para el division -->
                        <?php
                        $sql = "SELECT id_division, Nombre from divisiona";
                        $result = mysqli_query($link, $sql);
                        ?>
                        <div class="form-group col-md-6">
                            <label for="lista1" class="textoformu m-0 font-weight-bold text-primary">División:</label>
                            <select id="lista1" name="lista1" class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput">
                                <option value="">Seleccione...</option>
                                <?php foreach ($result as $opciones) : ?>
                                    <option value="<?php echo $opciones['id_division'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- select para el perfil -->
                        <div class="form-group col-md-6" style="margin-left: -9px;">
                            <label for="select2lista" class="textoformu m-0 font-weight-bold text-primary">Perfil:</label>
                            <br>
                            <div id="select2lista"></div>
                        </div>
                        <!-- Fin select anidado división -->

                        <div class="form-group col-md-6">
                            <label for="lugar" class="textoformu m-0 font-weight-bold text-primary">Lugar:</label>
                            <select class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput" name="lugar" id="lugar">
                                <option value="">Lugar...</option>
                                <?php foreach ($listaLugar as $opciones) : ?>
                                    <option value="<?php echo $opciones['lugar'] ?>"><?php echo $opciones['lugar'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="margin-left: 0px;">
                            <label for="lugar" class="textoformu m-0 font-weight-bold text-primary">Fin de semana:</label><br>

                            <div class="checkbox">
                                <label class="text-success control control-checkbox tamaño formularioinput"><input type="checkbox" name="findesi" value="si"> Si<div class="control_indicator"></div></label>
                            </div>
                        </div>

                        <div class="form-group" style="margin-left: -22px;padding-right: 5px;">

                            <div class="col-md-11" style="width: 96%;">
                                <label for="start" class="textoformu m-0 font-weight-bold text-primary">Fecha Inicio:</label>
                                <input type="text" name="start" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="start">
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: -36px;">

                            <div class="col-md-11" style="width: 96%;">
                                <label for="end" class="textoformu m-0 font-weight-bold text-primary">Fecha Fin:</label>
                                <input type="text" name="end" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="end">
                            </div>
                        </div>
                        <!-- <div class="form-group">

									<div class="col-md-11">
										
										<label for="inp" class="inp">
										<label for="empleado" class="m-0 font-weight-bold text-primary">Empleado:</label>
											<input type="search" id="inp" name="empleado" list="empleados" class="form-control mb-2 mr-sm-2 form-control bg-light " value="<?php echo $empleado; ?>" placeholder="<?php echo $empleado ?>" <?php //echo $readonly 
                                                                                                                                                                                                                                            ?> autocomplete="off" required>
											<datalist id="empleados">
												<?php foreach ($listaEmpleados as $opciones) : ?>
													<option value="<?php //echo $opciones['Nombre'] 
                                                                    ?>"></option>
												<?php endforeach ?>
											</datalist>

											<span class="focus-bg"></span>
										</label>
										
									</div>
								</div>
								<div class="form-group">

									<div class="col-md-11">
										
										<label for="inp" class="inp">
										<label for="empleado" class="m-0 font-weight-bold text-primary">Empleado:</label>
											<input type="search" id="inp" name="empleado" list="empleados" class="form-control mb-2 mr-sm-2 form-control bg-light " value="<?php echo $empleado; ?>" placeholder="<?php echo $empleado ?>" <?php //echo $readonly 
                                                                                                                                                                                                                                            ?> autocomplete="off" required>
											<datalist id="empleados">
												<?php foreach ($listaEmpleados as $opciones) : ?>
													<option value="<?php //echo $opciones['Nombre'] 
                                                                    ?>"></option>
												<?php endforeach ?>
											</datalist>

											<span class="focus-bg"></span>
										</label>
										
									</div>
								</div> -->
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="col-md-6">

                        <select name="color" class="form-control mb-2 mr-sm-2 form-control bg-light" id="color">
                            <option value="">Elegir Color</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                            <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                            <option style="color:#000;" value="#000">&#9724; Negro</option>

                        </select>
                    </div>
                    <button type="button" class="text-danger btn btn-default" data-dismiss="modal">Cerrar</button>
                    <input type="button" value="Guardar Cambios" id="btn" class="btn btn-primary"></input>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$verificar = null;
$veri = "SELECT * FROM events WHERE empleado LIKE '%$empleado%'";
$verificar = mysqli_query($link, $veri);
if (mysqli_num_rows($verificar) > 0)
?>
<script>
    $('#btn').click(function() {
        // Verificar si la opción seleccionada es la opción por defecto
        if ($('#estado').val() == '') {
            // Mostrar mensaje de error
            var msg = alertify.error('Default message');
            msg.delay(2).setContent('Por favor, seleccione una opción del estado.');
            return false;
        }
        // Verificar si la opción seleccionada es la opción por defecto
        else if ($('#lista1').val() == '') {
            // Mostrar mensaje de error
            var msg = alertify.error('Default message');
            msg.delay(2).setContent('Por favor, seleccione una opción de la division y el perfil.');
            return false;
        }
        // Verificar si la opción seleccionada es la opción por defecto
        else if ($('#lugar').val() == '') {
            // Mostrar mensaje de error
            var msg = alertify.error('Default message');
            msg.delay(2).setContent('Por favor, seleccione una opción del lugar.');
            return false;
        } else {
            // Verificar si todos los campos del formulario están llenos
            var formIsComplete = true;
            $('#formu input').each(function() {
                if ($(this).val() == '') {
                    formIsComplete = false;
                }
            });

            if (formIsComplete) {
                Swal.fire({
                    title: '¿Desea realizar la asignación?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Sí',
                    denyButtonText: 'No',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        //Swal.fire('Saved!<?php echo $eleccion = 'true'; ?>', '', 'success');
                        $('#formu').submit();
                        return true;
                    } else if (result.isDenied) {
                        //Swal.fire('Changes are not saved', '', 'info');
                        var msg = alertify.error('Default message');
                        msg.delay(1).setContent('No se envió la asignación');
                        return false;
                    }
                });
            } else {
                // Mostrar mensaje de error
                var msg = alertify.error('Default message');
                msg.delay(3).setContent('Por favor, llene todos los campos del formulario.');
                return false;
            }
        }

    });
</script>

<!-- Modal Editar -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" method="POST" action="editEventTitle.php" autocomplete="off">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title2" id="myModalLabel">Editar Asignación</h4>
                </div>
                <div class="modal-body">
                    <div class="form-row" style="width: 108%;">
                        <div class="form-group col-md-6">
                            <label for="empleado" class="textoformu m-0 font-weight-bold text-primary">Empleado:</label>
                            <?php
                            if (!empty($empleado)) {
                                $readonly = 'readonly';
                            } else {
                                $readonly = '';
                            }
                            //echo $readonly;

                            ?>
                            <input type="text" list="empleadosedit" placeholder="<?php echo $empleado ?>" name="empleado" value="<?php echo $empleado; ?>" <?php //echo $readonly 
                                                                                                                                                            ?> class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="empleado" placeholder="Empleado">
                            <datalist id="empleadosedit">
                                <?php foreach ($listaEmpleados as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"></option>
                                <?php endforeach ?>

                            </datalist>
                            <input type="text" name="nomasignador" style="display:none" value="<?php echo $nom['Nombre']; ?>" />
                        </div>&nbsp;
                        <div class="form-group col-sm-6">
                            <label for="title" class="textoformu m-0 font-weight-bold text-primary">Proyecto:</label>
                            <input type="text" name="title" list="proyectos" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="title" placeholder="Proyecto">
                            <datalist id="proyectos">
                                <?php foreach ($listaCliente as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Responsable'] ?></option>
                                <?php endforeach ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="area" class="textoformu m-0 font-weight-bold text-primary">Área:</label>
                            <input type="text" name="area" list="areas" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="area" placeholder="Area" required>
                            <datalist id="areas">
                                <?php foreach ($listaArea as $opciones) : ?>
                                    <option value="<?php echo $opciones['area'] ?>"><?php echo $opciones['area'] ?></option>
                                <?php endforeach ?>
                            </datalist>
                        </div>&nbsp;
                        <div class="form-group col-md-6">
                            <label for="estado" class="textoformu m-0 font-weight-bold text-primary">Estado:</label>
                            <select class="custom-select form-control mb-2 mr-sm-2 form-control bg-light formularioinput" name="estado" id="estado">
                                <option value="">Estado...</option>
                                <?php foreach ($listaEstado as $opciones) : ?>
                                    <option value="<?php echo $opciones['estado'] ?>"><?php echo $opciones['estado'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>&nbsp;
                        <!-- Inicio select anidado división -->
                        <!-- select para la division -->
                        <div class="form-group col-md-6">
                            <label for="departamentos" class="textoformu m-0 font-weight-bold text-primary">División:</label>&nbsp;<input class="textos" name="divisionado" type="text" id="divisionado" readonly>
                            <select id="lista3" name="lista3" class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput">
                                <option value="">Seleccione...</option>
                                <?php foreach ($result as $opciones) : ?>
                                    <option value="<?php echo $opciones['id_division'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- select para el perfil -->
                        <div class="form-group col-md-6" style="margin-left: -10px;">
                            <label for="lista4" class="textoformu m-0 font-weight-bold text-primary">Perfil:</label>&nbsp;<input class="textos2" type="text" name="perfilado" id="perfilado" readonly>
                            <div id="select4lista"></div>
                        </div>
                        <!-- Fin select anidado división -->
                        <div class="form-group col-md-6">
                            <label for="lugar" class="textoformu m-0 font-weight-bold text-primary">Lugar:</label>
                            <select class="custom-select form-control mb-2 mr-sm-2 form-control formularioinput" name="lugar" id="lugar">
                                <option value="">Lugar...</option>
                                <?php foreach ($listaLugar as $opciones) : ?>
                                    <option value="<?php echo $opciones['lugar'] ?>"><?php echo $opciones['lugar'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <div class="col-md-11" style="margin-left: -6px !important;padding-right: 5px;">
                                <label for="start" class="textoformu m-0 font-weight-bold text-primary">Fecha Inicio:</label>
                                <input type="text" name="start" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="start" readonly>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left: -23px !important;">
                            <div class="col-md-11" style="width: 96%;">
                                <label for="end" class="textoformu m-0 font-weight-bold text-primary">Fecha Fin:</label>
                                <input type="text" name="end" class="form-control mb-2 mr-sm-2 form-control bg-light formularioinput" id="end" readonly>
                            </div>
                        </div>
                        <div class="form-group" style="width: 45%;right: 34px;bottom: 6% !important;position: absolute;">
                            <div class="col-md-11">
                                <div class="checkbox">
                                    <label class="text-danger control control-checkbox"><input type="checkbox" name="delete"> Eliminar Asignación<div class="control_indicator"></div></label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" class="form-control" id="id">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-6">

                        <select name="color" class="form-control mb-2 mr-sm-2 form-control bg-light" id="color">
                            <option value="">Elegir Color</option>
                            <option style="color:#0071c5;" value="#0071c5">&#9724; Azul</option>
                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
                            <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                            <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
                            <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
                            <option style="color:#000;" value="#000">&#9724; Negro</option>

                        </select>
                        <!--<input type="color" name="colorfin" id="colorin">-->
                    </div>

                    <button type="button" class="text-danger btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button style="font-size: 15px;" type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--modal para eliminar asignaciones-->
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12 col-lg-12">

            <form action="validar.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="col-9 text-uppercase modal-title text-center font-weight-bold text-primary" id="exampleModalLabel">Eliminar Asignacion</h5>
                                <span names="nomasignador" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $empleado, '<br>', $per['Perfil']; ?></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">


                                    <div class="form-group col-md-4">
                                        <input type="hidden" name="nom" style="display:none" value="<?php echo $empleado ?>" />

                                        <label class="m-0 font-weight-bold text-primary" class="label">Nombre:</label>
                                        <input type="text" class="form-control " name="nombre" value="<?php echo $empleado  ?>" placeholder="" disabled>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label class="m-0 font-weight-bold text-primary" class="label">Proyecto:</label>
                                        <input type="search" name="proyecto" list="proyectos" class="form-control mb-2 mr-sm-2 form-control bg-light" placeholder="Proyecto...">
                                        <datalist id="proyectos">
                                            <?php foreach ($listaCliente as $opciones) : ?>
                                                <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Responsable'] ?></option>
                                            <?php endforeach ?>

                                        </datalist>
                                    </div>

                                    <!--  <div class="form-group col-md-4">
                                        <label for="area" class="m-0 font-weight-bold text-primary " class="label">Área:</label>
                                        <input type="search" name="area" list="area" class="form-control mb-2 mr-sm-2 form-control" placeholder="Área...">
                                        <datalist id="area">
                                            <?php foreach ($listaArea as $opciones) : ?>
                                                <option value="<?php echo $opciones['area'] ?>"><?php echo $opciones['area'] ?></option>
                                            <?php endforeach ?>

                                        </datalist>
                                    </div>-->

                                    <!-- Inicio select anidado división -->
                                    <!-- select para el departamento -->
                                    <!-- <div class="form-group col-md-4">
                                        <label for="departamento"class="m-0 font-weight-bold text-primary" class="label">División:</label>               
                                        <select class="custom-select form-control mb-2 mr-sm-2 form-control" name="divisionasignado" id="departamento">
                                             cargar con js 
                                        </select>
                                    </div>-->
                                    <!-- select para la provincia 
                                    <div class="form-group col-md-4">
                                        <label for="provincia"class="m-0 font-weight-bold text-primary" class="label">Perfil:</label>
                                        <select class="custom-select form-control mb-2 mr-sm-2 form-control" name="perfilasignado" id="provincia">
                                             cargar con js dependiendo del departamento 
                                        </select>
                                    </div>
                                 Fin select anidado división -->

                                    <div class="form-group col-md-4">
                                        <label for="estado" class="m-0 font-weight-bold text-primary" class="label">Estado:</label>
                                        <select class="custom-select form-control mb-2 mr-sm-2 form-control " REQUIRED name="estado" id="estado">
                                            <option value="">Estado...</option>
                                            <?php foreach ($listaEstado as $opciones) : ?>
                                                <option value="<?php echo $opciones['estado'] ?>"><?php echo $opciones['estado'] ?></option>

                                            <?php endforeach ?>
                                        </select>

                                    </div>

                                    <!-- <div class="form-group col-md-4">
                                        <label for="lugar"class="m-0 font-weight-bold text-primary" class="label">Lugar:</label>
                                        <select class="custom-select form-control mb-2 mr-sm-2 form-control "  name="lugar" id="lugar">
                                            <option value="">Lugar...</option>
                                            <?php foreach ($listaLugar as $opciones) : ?>
                                                <option value="<?php echo $opciones['lugar'] ?>"><?php echo $opciones['lugar'] ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>-->
                                    <div class="form-group col-md-4">

                                        <label class="m-0 font-weight-bold text-primary" class="label">Fecha Inicio:</label>
                                        <input type="date" id="start" class="form-control mb-2 mr-sm-2 form-control bg-light" name="fecha_inicio" min="2023-01-10" max="2030-12-31">


                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="m-0 font-weight-bold text-primary" class="label">Fecha Fin:</label>
                                        <input type="date" id="start" class="form-control mb-2 mr-sm-2 form-control bg-light" name="fecha_fin" min="2023-01-10" max="2030-12-31">


                                    </div>


                                    <!-- <div class="form-group col-md-4">
                                        <label class="m-0 font-weight-bold text-primary" REQUIRED class="label">Día:
                                        </label>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input"  name="dia[]" value="lunes" id="customCheck6">
                                                <label class="custom-control-label" for="customCheck6">
                                                    <h6>Lunes</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="martes" id="customCheck7">
                                                <label class="custom-control-label" for="customCheck7">
                                                    <h6>Martes</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="miércoles" id="customCheck8">
                                                <label class="custom-control-label" for="customCheck8">
                                                    <h6>Miércoles</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="jueves" id="customCheck9">
                                                <label class="custom-control-label" for="customCheck9">
                                                    <h6>Jueves</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="viernes" id="customCheck10">
                                                <label class="custom-control-label" for="customCheck10">
                                                    <h6>Viernes</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="sábado" id="customCheck11">
                                                <label class="custom-control-label" for="customCheck11">
                                                    <h6>Sábado</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="dia[]" value="domingo" id="customCheck12">
                                                <label class="custom-control-label" for="customCheck12">
                                                    <h6>Domingo</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" onclick="ActivarCasilla(this);" name="dia[]" value="todosd" id="customCheck13">
                                                <label class="custom-control-label" for="customCheck13">
                                                    <h6>Todos los días</h6>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="m-0 font-weight-bold text-primary" class="label">Jornada:</label>
                                        <br>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="jornada[]" value="1" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    <h6>Jornada 8:00am a 10:00am</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="jornada[]" value="2" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">
                                                    <h6>Jornada 10:00am a 12:00m</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="jornada[]" value="3" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">
                                                    <h6>Jornada 1:00pm a 3:00pm</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="jornada[]" value="4" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">
                                                    <h6>Jornada 3:00pm a 5:00pm</h6>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-auto" class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" onclick="ActivarCasilla(this);" name="jornada[]" value="5" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">
                                                    <h6>Toda la jornada</h6>
                                                </label>
                                            </div>
                                        </div>-->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <Button value="btnEliminar" class="btn btn-success" onclick="return confirm('¿Deseas eliminar la asignacion?')" type="submit" name="accion" style="width:990px;">Eliminar</Button>

                            </div>
                        </div>

                    </div>
                </div>
        </div>

        </form>

    </div>

</div>
</div>
<!--fin modal para eliminar asignaciones-->

<!-- Javascript para los select devision - perfil -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#lista1').val();
        recargarLista();

        $('#lista1').change(function() {
            recargarLista();
        });
    });
    $(document).ready(function() {
        $('#lista3').val();
        recargarLista2();

        $('#lista3').change(function() {
            recargarLista2();
        });
    });
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "pages/datos.php",
            data: "division=" + $('#lista1').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    };

    function recargarLista2() {
        $.ajax({
            type: "POST",
            url: "pages/datos.php",
            data: "divisionedit=" + $('#lista3').val(),
            success: function(r) {
                $('#select4lista').html(r);
            }
        });
    };
</script>

<!-- select anidado división y perfil -->
<script src="./js/select.js"></script>
<script src="./js/select2.js"></script>
<!--select anidado división y perfil -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='js/locales-all.min.js'></script>



<?php
$cantidadfestivos = $bdd->prepare("SELECT COUNT(fecha) as cantidad FROM dias_festivos;");
$cantidadfestivos->execute();
$listaFestivo = $cantidadfestivos->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaFestivo as $resultadoFestivo) :
    $Festivo = $resultadoFestivo['cantidad'];
endforeach;

//echo $Festivo;
//echo $DiaFestivo;
?>

<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            locale: 'es',
            themeSystem: 'jquery-ui',
            header: {
                left: 'agendaDay,agendaWeek,month,listWeek',
                center: 'prevYear, title , nextYear',
                right: 'today prev,next '
            },
            buttonText: {
                //prevYear: 'Ant.',
                //nextYear: 'Sig.',
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día'
            },
            validRange: {
                start: '2022-12-01',
                //end: '2022-12-01'
            },
            navLinks: true,
            weekNumbers: true,
            weekNumberTitle: "Week",
            weekends: <?php echo $findes; ?>,
            //weekends: false,
            windowResize: function(view) {
                //alert('The calendar has adjusted to a window resize');
            },
            allDaySlot: false,
            //height: 'auto',
            height: 700,
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            selectHelper: true,

            select: function(start, end) {
                var condition = moment(start).format('HH:mm:ss');
                var inicioh = '<?php echo $hora_in; ?>';
                var finh = '<?php echo $hora_fi; ?>';
                if (condition != '00:00:00') {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                } else {
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD ') + inicioh);
                    $('#ModalAdd #end').val(moment(end, "DD-MM-YYYY").subtract(1, 'days').format('YYYY-MM-DD ') + finh); //Le resto 1 dia
                    $('#ModalAdd').modal('show');
                }

            },
            eventRender: function(event, element) {
                element.bind('dblclick', function() {
                    $('#ModalEdit #id').val(event.id);
                    $('#ModalEdit #title').val(event.title);
                    $('#ModalEdit #empleado').val(event.empleado);
                    $('#ModalEdit #area').val(event.area);
                    $('#ModalEdit #estado').val(event.estado);
                    $('#ModalEdit #divisionado').val(event.division);
                    $('#ModalEdit #perfilado').val(event.perfil);
                    $('#ModalEdit #lugar').val(event.lugar);
                    $('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalEdit #color').val(event.color);
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

                edit(event);

            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                edit(event);

            },
            events: [
                <?php

                foreach ($events as $event) :

                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if ($start[1] == '00:00:00') {
                        $start = $start[0];
                    } else {
                        $start = $event['start'];
                    }
                    if ($end[1] == '00:00:00') {
                        $end = $end[0];
                    } else {
                        $end = $event['end'];
                    }
                ?> {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        empleado: '<?php echo $event['empleado']; ?>',
                        area: '<?php echo $event['area']; ?>',
                        estado: '<?php echo $event['estado']; ?>',
                        division: '<?php echo $event['division']; ?>',
                        perfil: '<?php echo $event['perfil']; ?>',
                        lugar: '<?php echo $event['lugar']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['color']; ?>',

                    },
                <?php endforeach; ?>
                <?php
                $Diafestivos = $bdd->prepare("SELECT fecha FROM `dias_festivos`;");
                $Diafestivos->execute();
                $listaDiaFestivo = $Diafestivos->fetchAll(PDO::FETCH_ASSOC);

                foreach ($listaDiaFestivo as $resultadoDiaFestivo) :
                    $DiaFestivo = $resultadoDiaFestivo['fecha'];


                ?> {
                        start: '<?php echo $DiaFestivo; ?>',
                        end: '<?php echo $DiaFestivo; ?>',
                        overlap: true,
                        rendering: 'background',
                        color: '#ff9f89'
                    },
                <?php endforeach; ?>

            ]
        });
        var actual = $('#calendar-place').fullCalendar('getDate');
        $('#calendar-place').fullCalendar('gotoDate', new Date(((m === 0) ? y - 1 : y) + '-' + m + '-' + d));
        $('#calendar-place').fullCalendar('gotoDate', actual);

        function edit(event) {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }

            id = event.id;

            Event = [];
            Event[0] = id;
            Event[1] = start;
            Event[2] = end;

            $.ajax({
                url: 'editEventDate.php',
                type: "POST",
                data: {
                    Event: Event
                },
                success: function(rep) {
                    if (rep == 'OK') {
                        var msg = alertify.success('Default message');
                        msg.delay(3).setContent('Se actualizó la asignación correctamente.');
                    } else {
                        alertify.error('No se pudo guardar la asignación, intentelo de nuevo.', 0);
                    }
                }
            });
        }

    });
</script>

<!-- Fin Contenido -->


</div>

</div>

</div>


</body>

</html>