<?php include("./botonup.php") ?>
<?php include("modulos/clientes.php") ?>
<?php include("./cabeceras/cabecera_FindeSemana.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->


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
if (isset($_GET["valorfinde11"])) {
    echo "<script>
            alertify.set('notifier','position', 'button-right');
            alertify.success('Se habilitó el fin de semana');
            </script>";
?>
    <script>
        var stateObj = {
            foo: "bar"
        };
        history.pushState(stateObj, "page 2", "findesemana");
    </script>
    <?php
} else {
    if (isset($_GET["valorfinde22"])) {
        $condicion = $_GET['valorfinde22'];
        if (empty(!$condicion)) {
            $condicion = "Deshabilitado";
            //echo "holaa" . $condicion;
            echo "<script>
            alertify.set('notifier','position', 'button-right');
            alertify.error('Se deshabilitó el fin de semana');
            </script>";
    ?>
            <script>
                var stateObj = {
                    foo: "bar"
                };
                history.pushState(stateObj, "page 2", "findesemana");
            </script>
<?php
        }/*else {
            echo "<script>
            alertify.set('notifier','position', 'top-right');
            alertify.error('Current delay ');
            alertify.message('Dia festivo agregado correctamente',0);
            alertify.notify('custom message.', 'custom', 2, function(){console.log('dismissed');});
            </script>";
            
        }*/
    }
}

?>

<div style="position: absolute;">
    <div class="container-fluid" style="width: 20rem; float:left;">
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <label class="m-0 font-weight-bold text-primary">Estado:</label>
                <?php
                $sentenciafinsemana = $bdd->prepare("SELECT fin_de_semana FROM fin_semana");
                $sentenciafinsemana->execute();
                $listaFinsemana = $sentenciafinsemana->fetchAll(PDO::FETCH_ASSOC);
                $findes = "false";
                foreach ($listaFinsemana as $resultadofinsemana) :
                    $findes = $resultadofinsemana['fin_de_semana'];
                endforeach;
                //echo $findes;
                if ($findes == "false") {
                ?>
                    <label class="m-0 font-weight-bold text-danger">Deshabilitado</label>
                <?php
                } else {
                ?>
                    <label class="m-0 font-weight-bold text-success">Habilitado</label>
                <?php
                }
                ?>

            </div>
            <div class="card-body">

                <form action="pages/enviar_param.php" method="post" enctype="multipart/form-data">

                    <label class="m-0 font-weight-bold text-primary">Habilitar Fin de semana</label>

                    <div class="controle-group">
                        <br>
                        <table>
                            <thead>
                                <tr>
                                    <th align="right" width="50px;"><label class="controle controle-radio">

                                            <input type="radio" name="radio" value="true" />
                                            Si
                                        </label>
                                    </th>
                                    <th align="right"><label class="controle controle-radio">

                                            <input type="radio" name="radio" checked="checked" value="false" />
                                            No
                                        </label>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th><button type="submit" class="btn btn-success">
                                            Agregar
                                        </button>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Scripts para la Tabla -->
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>







<!-- Fin Contenido -->

</div>

</div>

</div>


</body>

</html>