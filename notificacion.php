<?php include("./botonup.php") ?>
<?php include("modulos/tablaperfiles.php") ?>
<?php include("./cabeceras/cabecera_notificacion.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->

<div class="container-fluid">
    <div class="row">
        <br>
        <div class="container-fluid">
        <br>
            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <br>
                    <h4 class="m-0 font-weight-bold text-primary" class="label" align="center">NOTIFICACIONES</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display nowrap" id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Usuario<br>que asignó<span></span></th>
                                    <th>Usuario<br>asignado<span></span></th>
                                    <th>Notificación<span></span></th>
                                    <th>Proyecto<span></span></th>
                                    <th>Fecha inicio<span></span></th>
                                    <th>Fecha fin<span></span></th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($listanotificacion as $empleado) { ?>
                                    <tr>
                                        <td><?php echo $empleado['usuario1'] ?></td>
                                        <td><?php echo $empleado['usuario2'] ?></td>
                                        <td><?php echo $empleado['tipo'] ?></td>
                                        <td><?php echo $empleado['proyecto'] ?></td>
                                        <td><?php echo $empleado['fechain'] ?></td>
                                        <td><?php echo $empleado['fechafin'] ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="ID_" value="<?php echo $empleado['ID']; ?>">
                                                <button value="btnEliminar" onclick=" return Confirmar('¿Desea eliminar este proyecto?');" type="submit" class="btn btn-danger" name="accion">Eliminar</Button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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