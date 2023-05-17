<?php include("./botonup.php") ?>
<?php include("modulos/inicio.php") ?>
<?php include("./cabeceras/cabecera_Graficas.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->

<?php
include('config.php');


$nombre = $nom['Nombre'];
$corr = $correo['Correo'];

//consulta a divisiones//
$sqle = "SELECT * from proyectos Order by Nombre ASC ";
$resulta = mysqli_query($con, $sqle);

//consulta a áreas//
$sqlArea = "SELECT * FROM area";
$resultArea = mysqli_query($con, $sqlArea);

//consulta a empleados//
$sqlEmple = "SELECT * FROM empleados";
$resultEmple = mysqli_query($con, $sqlEmple);


?>

<div class="container">
    <div class="row">

        <!-- barras de datos-->
        <div class="col-xl-12 col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" class="label" align="center">Estado de asignación por empleado en un proyecto - <?php echo date('Y'); ?></h5>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <br>
                    <ul class="nav nav-tabs">
                        <div class="form-group col-md-3">
                            <select type="text" class="form-control mb-2 mr-sm-2" REQUIRED name="division" id="division">
                                <option value="" style="background-color:#D8D7D6  " selected="true" disabled="true">Proyectos...</option>
                                <?php foreach ($resulta as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select type="text" class="form-control mb-2 mr-sm-2" REQUIRED name="mes" id="mes">
                                <option value="" style="background-color:#D8D7D6  " selected="true" disabled="true">Mes...</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select type="text" class="form-control mb-2 mr-sm-2" name="nombre" id="nombre">
                                <option value="" style="background-color:#D8D7D6  " selected="true" disabled="true">Nombres...</option>
                                <?php foreach ($resultEmple as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <button value="" class="btn btn-primary" onclick="variables()" name="accion">Consultar</Button>
                        </div>
                    </ul>
                </form>
                <div class="card-body">
                    <div class="table-responsive row justify-content-center">
                        <?php include('./graficas/proyectos_empleado.php'); ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fin Contenido -->

</div>

</div>

</div>


</body>

</html>