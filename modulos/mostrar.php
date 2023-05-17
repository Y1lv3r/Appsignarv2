<?php
include("../global/conexion.php");
include('../global/sesiones.php');
$pruebas = $_POST['emple'];
/*echo "Estás usando Ajax <br> " . $_POST["emple"];
echo "<br>hola  " . $pruebas;
echo "SELECT * FROM asignacion WHERE tipo='Hábil' and empleado LIKE '%$pruebas%'";
*/
$Year2 = date("Y-m-d");
$semanasp = date("W");
$fecha_actual = date("Y-m-d");
$fecha_resta = date("Y-m-d", strtotime($fecha_actual . "- 2 days"));

$horalaboral = $pdo->prepare("SELECT total FROM hora_laboral");
$horalaboral->execute();
$listaHora = $horalaboral->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaHora as $resultadohora) :
    $Horat = $resultadohora['total'];
endforeach;

$Horatf = $Horat . '0000';

//echo $fecha_resta;
$sentenciaA = $pdo->prepare("SELECT start,SEC_TO_TIME(TIME_TO_SEC(start)) as hora_inicio,SEC_TO_TIME(TIME_TO_SEC(end)) as hora_fin,
TIMEDIFF(end,start) as horas_asignadas_total_dia,
 month(start) as mes,semana,dia, empleado,title,lugar,estado,division_e,perfil_e,division,perfil,area FROM `events` WHERE empleado LIKE '%$pruebas%' and semana <> 0 and Date_Format(start, '%Y/%m/%d') >= '$fecha_resta' GROUP by empleado,semana,start");
/*$sentenciaA = $pdo->prepare("
    SELECT 
	Date_Format(A1.start, '%Y/%m/%d') as Fecha, 
    A1.semana as Semana, 
    A1.empleado as Nombre, 
    A1.title as Proyecto, 
    A1.estado as Estado, 
    TIMEDIFF(A1.end,A1.start) as horas_asignadas, 
    A1.dia as Día, 
    SEC_TO_TIME(TIME_TO_SEC(A1.start)) as Hora_Inicio, 
    SEC_TO_TIME(TIME_TO_SEC(A1.end)) as Hora_Fin, 
    A1.lugar as Lugar 
FROM events A1
WHERE Date_Format(A1.start, '%Y/%m/%d') >= '$fecha_resta' AND A1.empleado LIKE '%$pruebas%' 

UNION ALL

SELECT
	Date_Format(B0.start, '%Y/%m/%d') as Fecha, 
    B0.semana as Semana, 
    B0.empleado as Nombre, 
    '' as Proyecto, 
    'Libre' as Estado,
    SEC_TO_TIME(TIME_TO_SEC(B1.horasLibres)) as horas_asignadas, 
    B0.dia as Día,
   	SEC_TO_TIME(TIME_TO_SEC(B0.start)) as Hora_Inicio, 
    SEC_TO_TIME(TIME_TO_SEC(B0.end)) as Hora_Fin, 
    B0.lugar as Lugar
from `events` B0 
Left Join (SELECT 
           		sum(TIMEDIFF(A0.end,A0.start)) as horasAsignadas,
           		($Horatf)-sum(TIMEDIFF(A0.end,A0.start)) as horasLibres,
           		A0.empleado , 
           		Date_Format(A0.start, '%Y/%m/%d') as 'fecha', 
           		A0.title 
           FROM `events` A0 
           GROUP by A0.empleado, Date_Format(A0.start, '%Y/%m/%d'), A0.title 
          ) B1 On Date_Format(B0.start, '%Y/%m/%d') = B1.fecha And B0.empleado = B1.empleado AND B0.title = B1.title
WHERE Date_Format(B0.start, '%Y/%m/%d') >= '$fecha_resta' AND B0.empleado LIKE '%$pruebas%'
Group By B0.title, B0.empleado,Date_Format(B0.start, '%Y/%m/%d')
ORDER BY Fecha ASC;");*/
$sentenciaA->execute();
$listaAsignacionpru = $sentenciaA->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="shortcut icon" href="imag/icono.ico">


<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">



<!-- Custom fonts for this template -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" />


<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css'>




<style>
    button.dt-button,
    div.dt-button,
    a.dt-button {

        padding: 0.2em 0.5em !important;
    }

    div.dt-buttons {
        margin-left: 15px !important;
    }

    .bg-white {
        background-color: #105382 !important;
    }

    .bg-gradient-primary {
        background-color: #093dd5;
        background-image: linear-gradient(180deg, #115585 0%, #0d0a22 100%);
        background-size: cover;
    }
</style>


<div class="container-fluid">
    <div class="panel with-nav-tabs panel-default">


        <div class="panel-body">
            <div class="tab-content">



                <!--<form action="" method="post">
                <select class="custom-select form-control mb-2 mr-sm-2 col-md-3" name="miselector" id="miselector" class="form-control">

                    <?php foreach ($listaEmpleados as $opciones) : ?>
                        <option value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>

                    <?php endforeach ?>
                </select>
                </form>-->
                <br>


                <div class="col-md-12">
                    <div class="card with-margin card_shadow card_border rounded">
                        <div class="container-fluid" id="mainContainer" style="height: 50%;">
                            <div class="row border-bottom-0 card_border2" style=" height: 20%">
                                <br>
                                <li class="list-inline-item" style=" height: 80%" align="right"><a href="#" id="panel-fullscreen" class="fullscreen-btn" role="button" title="Alternar pantalla completa"><i class="fas fa-expand"></i></a></li>
                                <h1 class="h3 mb-0 font-weight-bold text-primary" class="label" align="center">Asignación Detallada</h1>
                            </div>
                            <a href="./modulos/exportar_excel.php"> <button style="position: absolute;top: 1.5cm;left: 80%; z-index: 2;""  class=" btn btn-secondary">EXCEL <i class="fa fa-download" aria-hidden="true"></i></button></a>
                            <button style="position: absolute;top: 1.5cm;left: 89%; z-index: 2; " tabindex="-1" data-toggle="dropdown" class="btn btn-secondary dropdown-toggle" type="button">
                                <i class="fa fa-cog" aria-hidden="true"></i> <span class="caret"></span>
                            </button>
                            <div class="row" style="height: 80%">
                                <div class="card-body border-top-0 border-bottom-0 card_border2 ">
                                    <div id="container">
                                        <div class="card-body">
                                            <div class="input-group">
                                                <div class="input-group-btn">

                                                    <ul role="menu" class="dropdown-menu">
                                                        <div class="cajaboton">
                                                            <div class="listacolumnas" tabindex="-1">
                                                                <form name="tcol" onsubmit="return false">
                                                                    Show columns

                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col1" id="1" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="1">Fecha</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col2" id="2" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="2">Semana</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col3" id="3" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="3">Nombre</label><br>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col4" id="4" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="4">Proyecto</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col5" id="5" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="5">Area</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col6" id="6" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="6">Estado</label><br>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col7" id="7" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="7">Horas Asignadas</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col8" id="8" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="8">Día</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col9" id="9" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="9">Hora Inicio</label><br>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col10" id="10" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="9">Hora Fin</label><br>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col11" id="11" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="11">Lugar</label>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col12" id="12" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="12">Division empleado</label><br>
                                                                    </div>
                                                                    <div class="checkbox">
                                                                        <input type=checkbox name="col13" id="13" onclick="toggleVis(this.name)" checked> <label class="form-check-label" for="13">Perfil empleado</label><br>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>

                                            <script>
                                                $(".link").click(function(e) {
                                                    e.preventDefault();
                                                    $(".popup").fadeIn(300, function() {
                                                        $(this).focus();
                                                    });
                                                });

                                                $('.close').click(function() {
                                                    $(".popup").fadeOut(300);
                                                });
                                                $(".popup").on('blur', function() {
                                                    $(this).fadeOut(300);
                                                });
                                            </script>
                                            <script language="javascript">
                                                // Set the default "show" mode to that specified by W3C DOM
                                                // compliant browsers

                                                var showMode = 'table-cell';

                                                // However, IE5 at least does not render table cells correctly
                                                // using the style 'table-cell', but does when the style 'block'
                                                // is used, so handle this

                                                if (document.all) showMode = 'block';

                                                // This is the function that actually does the manipulation

                                                function toggleVis(btn) {

                                                    // First isolate the checkbox by name using the
                                                    // name of the form and the name of the checkbox

                                                    btn = document.forms['tcol'].elements[btn];

                                                    // Next find all the table cells by using the DOM function
                                                    // getElementsByName passing in the constructed name of
                                                    // the cells, derived from the checkbox name

                                                    cells = document.getElementsByName('t' + btn.name);

                                                    // Once the cells and checkbox object has been retrieved
                                                    // the show hide choice is simply whether the checkbox is
                                                    // checked or clear

                                                    mode = btn.checked ? showMode : 'none';

                                                    // Apply the style to the CSS display property for the cells

                                                    for (j = 0; j < cells.length; j++) cells[j].style.display = mode;
                                                }
                                            </script>
                                            <div class="table-responsive">
                                                <table class="table display nowrap" id="example" class="display" cellspacing="0" width="100%">
                                                    <caption>Tabla de asignaciones de los empleados</caption>
                                                    <thead>
                                                        <tr>
                                                            <!--<th name="tcol1" id="tcol1">Fecha<span></span></th>
                                                                <th name="tcol2" id="tcol2">Semana<span></span></th>
                                                                <th name="tcol3" id="tcol3">Nombre<span></span></th>
                                                                <th name="tcol13" id="tcol13">Proyecto<span></span></th>
                                                                <th name="tcol12" id="tcol12">Estado<span></span></th>
                                                                <th name="tcol5" id="tcol5">Jornada<span></span></th>
                                                                <th name="tcol4" id="tcol4">Día<span></span></th>
                                                                <th name="tcol6" id="tcol6">Perfil<span></span></th>
                                                                <th name="tcol7" id="tcol7">División<span></span></th>
                                                                <th name="tcol8" id="tcol8">Perfil Asignado<span></span></th>
                                                                <th name="tcol9" id="tcol9">División Asignado<span></span></th>
                                                                <th name="tcol10" id="tcol10">Área<span></span></th>
                                                                <th name="tcol11" id="tcol11">Contrato<span></span></th>
                                                                <th name="tcol14" id="tcol14">Asignado por<span></span></th>
                                                                <th name="tcol15" id="tcol15">Lugar<span></span></th>-->
                                                            <th name="tcol1" id="tcol1">Fecha<span></span></th>
                                                            <th name="tcol2" id="tcol2">Semana<span></span></th>
                                                            <th name="tcol3" id="tcol3">Nombre<span></span></th>
                                                            <th name="tcol4" id="tcol4">Proyecto<span></span></th>
                                                            <th name="tcol5" id="tcol5">Area<span></span></th>
                                                            <th name="tcol6" id="tcol6">Estado<span></span></th>
                                                            <th name="tcol7" id="tcol7">Horas<br>Asignadas<span></span></th>
                                                            <th name="tcol8" id="tcol8">Día<span></span></th>
                                                            <th name="tcol9" id="tcol9">Hora<br>Inicio<span></span></th>
                                                            <th name="tcol10" id="tcol10">Hora<br>Fin<span></span></th>
                                                            <th name="tcol11" id="tcol11">Lugar<span></span></th>
                                                            <th name="tcol12" id="tcol12">Division<br>empleado<span></span></th>
                                                            <th name="tcol13" id="tcol13">Perfil<br>empleado<span></span></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($listaAsignacionpru as $empleado) { ?>
                                                            <tr>
                                                                <td name="tcol1" id="tcol1"><?php echo $empleado['start'] ?></td>
                                                                <td name="tcol2" id="tcol2"><?php echo $empleado['semana'] ?></td>
                                                                <td name="tcol3" id="tcol3"><?php echo $empleado['empleado'] ?></td>
                                                                <td name="tcol4" id="tcol4"><?php echo $empleado['title'] ?></td>
                                                                <td name="tcol5" id="tcol5"><?php echo $empleado['area'] ?></td>
                                                                <td name="tcol6" id="tcol6"><?php echo $empleado['estado'] ?></td>
                                                                <td name="tcol7" id="tcol7"><?php echo $empleado['horas_asignadas_total_dia'] ?></td>
                                                                <td name="tcol8" id="tcol8"><?php echo $empleado['dia'] ?></td>
                                                                <td name="tcol9" id="tcol9"><?php echo $empleado['hora_inicio'] ?></td>
                                                                <td name="tcol10" id="tcol10"><?php echo $empleado['hora_fin'] ?></td>
                                                                <td name="tcol11" id="tcol11"><?php echo $empleado['lugar'] ?></td>
                                                                <td name="tcol12" id="tcol12"><?php echo $empleado['division_e'] ?></td>
                                                                <td name="tcol13" id="tcol13"><?php echo $empleado['perfil_e'] ?></td>


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
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<script src="./js/script.js"></script>
<script src="./js/fullsc.js"></script>
<!-- partial -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>

<script>
    var oTable = $('#example').DataTable({
        fixedHeader: {
            header: false,
            footer: false
        },
        pagingType: "full_numbers",
        bSort: true,
        scrollCollapse: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontró nada, lo siento",
            "info": "Mostrando _START_ a  _END_ de _TOTAL_ registros",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": ">",
                "previous": "<"
            },
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
        },
        responsive: true,
        "order": [
            [0, "asc"]
        ],

        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                var select = $('<br><select style="width:48px;"><option value=""></option></select>')
                    .appendTo($(column.header()).find('span').empty())
                    .on({
                        'change': function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        },
                        'click': function(e) {
                            // stop click event bubbling
                            e.stopPropagation();
                        }
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#example').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },

            responsive: true,

            search: true,
            "processing": true,

            dom: 'B',
            scrollX: true,
            buttons: [

            ],


        });
    });
</script>

</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="script.js"></script>
<script src="fullsc.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/86186/moment.js'></script>
<script src='https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js'></script>
<script src=""></script>
<!-- partial -->

<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src="./semdetalle.js"></script>

<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>


<script src="controlador/select.js"></script>