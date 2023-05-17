<?php include("./botonup.php") ?>
<?php include("modulos/inicio.php") ?>
<?php include("./cabeceras/cabecera_Graficas.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->

<?php



$nombre = $nom['Division'];
$corr = $correo['Correo'];

//consulta a divisiones//
$sqle = "SELECT * from division  ";
$resulta = mysqli_query($con, $sqle);

//consulta a áreas//
$sqlArea = "SELECT * FROM area";
$resultArea = mysqli_query($con, $sqlArea);

//consulta a empleados//
$sqlEmple = "SELECT * FROM empleados";
$resultEmple = mysqli_query($con, $sqlEmple);

$SqlEventos = ("SELECT id, title, start, end, color, empleado, correo, area, estado, division, perfil, lugar FROM events 
                  WHERE empleado LIKE '%$nombre%' AND title IS NOT NULL AND title != ''");


?>

<div class="container">

    <div class="row">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php if (($rol['Rol'] == $rol1) || ($rol['Rol'] == $rol3)) { ?>
      </div>

      <!-- barras de datos-->
     
      <div class="col-xl-12 col-lg-8">
      <br>
      <br>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary" class="label" align="center">Estado de asignaciones por mes - <?php echo date('Y'); ?></h5>

          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <br>
            <ul class="nav nav-tabs">
              <div class="form-group col-md-3">
                <select type="text" class="form-control mb-2 mr-sm-2" REQUIRED name="division" id="division">
                  <option value="" style="background-color:#D8D7D6  " selected="true" disabled="true">Divisiones...</option>
                  <?php foreach ($resulta as $opciones) : ?>
                    <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>
                  <?php endforeach ?>
                </select>

              </div>
              <div class="form-group col-md-3">
                <Button value="" class="btn btn-primary" name="accion">Consultar</Button>
              </div>
            </ul>
          </form>

          <div class="card-body">
            <div class="table-responsive row justify-content-center">
              <?php include('./graficas/graficadivisionxmesnuevo.php'); ?>
              <br><br>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
    </div>
    <hr>
  </div>

<!-- Fin Contenido -->




</div>

</div>

</div>


</body>

</html>