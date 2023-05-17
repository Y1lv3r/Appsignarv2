<?php include("./botonup.php") ?>
<?php include("modulos/asig3m.php") ?>
<?php include("./cabeceras/cabecera_inicio.php") ?>
<?php include("./layout.php") ?>

<?php
include('config.php');


$nombre = $nom['Nombre'];
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
                  WHERE empleado LIKE '%$nombre%' AND title like '%%'");


$resulEventos = mysqli_query($con, $SqlEventos);


?>
<!-- Inicio Contenido -->
<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">

<!--	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
<link rel="stylesheet" type="text/css" href="css/home.css">

<!-- GRAFICA -->

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
                    <br>
                    <h5 class="m-0 font-weight-bold text-primary" class="label" align="center">Estado de asignaciones por división - <?php echo date('Y'); ?></h5>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <br>
                    <ul class="nav nav-tabs">
                        <div class="form-group col-md-3">
                            <select type="text" class="form-control mb-2 mr-sm-2" REQUIRED name="mesdiv" id="mesdiv">
                                <option value="" style="background-color:#D8D7D6  " selected="true" disabled="true">Seleccione un mes...</option>
                                <option value="13">Todo el año</option>
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
                            <Button value="" class="btn btn-primary" name="accion">Consultar</Button>
                        </div>
                    </ul>
                </form>

                <div class="card-body">
                    <div class="table-responsive row justify-content-center">
                        <?php include('./graficas/graficadivisionxmes.php'); ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
    </div>
    <hr>
</div>

<!-- GRAFICA -->

<!-- CALENDARIO -->
<?php


$sql = "SELECT id, title, start, end, color, empleado, correo, area, estado, division, perfil, lugar FROM events WHERE empleado LIKE '%$nombre%' AND title IS NOT NULL AND title != ''";
$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!-- for Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

<!-- for Bootstrap 4 -->
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>

<link href='./css/main.css' rel='stylesheet' />
<script src='./css/main.js'></script>
<script src='./js/theme-chooser.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar;
        var nowDate = new Date();

        initThemeChooser({

            init: function(themeSystem) {
                calendar = new FullCalendar.Calendar(calendarEl, {
                    themeSystem: themeSystem,
                    //editable: true, // enable draggable events
                    //selectable: true,
                    nowIndicator: true,
                    aspectRatio: 1.5,
                    locale: 'es',
                    selectMirror: true,

                    buttonText: {
                        //prevYear: 'Ant.',
                        //nextYear: 'Sig.',
                        today: 'Hoy',
                        //month: 'Mes',
                        //week: 'Semana',
                        //day: 'Día',
                        //list: 'lista'
                    },
                    views: {
                        listMonth: {
                            buttonText: 'lista Mes'
                        },
                        listYear: {
                            buttonText: 'lista Año'
                        },
                        listWeek: {
                            buttonText: 'lista Semana'
                        },
                        dayGridMonth: {
                            buttonText: 'Mes'
                        },
                        timeGridWeek: {
                            buttonText: 'Semana'
                        },
                        timeGridDay: {
                            buttonText: 'Día'
                        },
                        listDay: {
                            buttonText: 'Lista Día'
                        },
                    },
                    businessHours: {
                        // days of week. an array of zero-based day of week integers (0=Sunday)
                        //daysOfWeek: [1, 2, 3, 4], // Monday - Thursday

                        startTime: '08:00', // a start time (8am in this example)
                        endTime: '17:00', // an end time (5pm in this example)
                    },
                    weekNumbers: true,
                    weekNumberTitle: "Week",
                    scrollTime: '00:00', // undo default 6am scrollTime
                    headerToolbar: {
                        left: 'timeGridDay,timeGridWeek,dayGridMonth', //,listDay,listWeek,listMonth,listYear
                        center: 'title',
                        right: 'today prev,next'
                    },
                    footerToolbar: {
                        left: '',
                        center: '',
                        right: ''
                    },
                    handleWindowResize: true,
                    windowResizeDelay: 0,
                    stickyHeaderDates: true,
                    stickyFoterScrollbar: true,
                    slotEventOverlap: true,
                    allDaySlot: false,
                    height: 'auto',
                    weekends: true,
                    validRange: {
                        //start: nowDate,
                        //end: '2022-12-01'
                    },
                    //slotMinTime: "08:00:00",
                    /*buttonIcons: {
                      prev: 'chevron-left',
                      next: 'chevron-right',
                      prevYear: 'chevrons-left', // double chevron
                      nextYear: 'chevrons-right' // double chevron
                    },*/
                    //titleFormat:{ year: 'numeric', month: 'long', day: 'numeric' },
                    navLinks: true, // can click day/week names to navigate views
                    dayMaxEvents: true, // allow "more" link when too many events
                    dateClick: function() {
                        //alert('a day has been clicked!');
                    },

                    // showNonCurrentDates: false,
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
                                display: 'background',
                                color: '#ff9f89'
                            },
                        <?php endforeach; ?>
                    ],
                    function(mouseEnterInfo) {

                    },

                    eventClick: function(info) {
                        //alert('Event: ' + info.event.title);
                        //alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                        //alert('View: ' + info.view.type);

                        // change the border color just for fun
                        //info.el.style.borderColor = 'red';
                    },
                    //selectOverlap: false,
                    /* no permitir asignar en la hora ya ocupada
                      selectOverlap: function(event) {
                        return event.rendering === 'background';
                      },*/
                    /* segun el estado pintar de rojo
                      eventDidMount: function(info) {
                        if (info.event.extendedProps.status === 'done') {

                          // Change background color of row
                          info.el.style.backgroundColor = 'red';

                          // Change color of dot marker
                          var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
                          if (dotEl) {
                            dotEl.style.backgroundColor = 'white';
                          }
                        }
                      }*/
                });
                calendar.render();

            },

            change: function(themeSystem) {
                calendar.setOption('themeSystem', themeSystem);
            },


        });

    });
</script>
<style>
    .fc .fc-col-header-cell-cushion {
        display: inline-block;
        color: black;
        padding: 2px 4px;
    }

    .fc .fc-daygrid-day-number {
        position: relative;
        z-index: 4;
        color: black;
        padding: 4px;
    }

    #top,
    #calendar.fc-theme-standard {
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    }

    #calendar.fc-theme-bootstrap {
        font-size: 14px;
    }

    #top {
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        font-size: 12px;
        color: #000;
    }

    #top .selector {
        display: inline-block;
        margin-right: 10px;
    }

    #top select {
        font: inherit;
        /* mock what Boostrap does, don't compete  */
    }

    .left {
        float: left
    }

    .right {
        float: right
    }

    .clear {
        clear: both
    }

    #calendar {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 10px;
    }
</style>
<style>
    #menu1 {
        width: 300px;
        height: 90px;
        transition: width 1s, height 2s;
    }

    #menu1:hover {
        width: 750px;
        height: 45px;
    }
</style>

<div id='top' style="opacity: 0; display:none;">

    <div class='left'>

        <div id='theme-system-selector' class='selector'>
            Theme System:
            <select>
                <option value='bootstrap5'>Bootstrap 5</option>
                <option value='bootstrap'>Bootstrap 4</option>
                <option value='standard' selected>unthemed</option>
            </select>
        </div>

        <div data-theme-system="bootstrap,bootstrap5" class='selector' style='display:none'>
            Theme Name:
            <select>
                <option value='' selected>Default</option>
                <option value='cerulean'>Cerulean</option>
                <option value='cosmo'>Cosmo</option>
                <option value='cyborg'>Cyborg</option>
                <option value='darkly'>Darkly</option>
                <option value='flatly'>Flatly</option>
                <option value='journal'>Journal</option>
                <option value='litera'>Litera</option>
                <option value='lumen'>Lumen</option>
                <option value='lux'>Lux</option>
                <option value='materia'>Materia</option>
                <option value='minty'>Minty</option>
                <option value='pulse'>Pulse</option>
                <option value='sandstone'>Sandstone</option>
                <option value='simplex'>Simplex</option>
                <option value='sketchy'>Sketchy</option>
                <option value='slate'>Slate</option>
                <option value='solar'>Solar</option>
                <option value='spacelab'>Spacelab</option>
                <option value='superhero'>Superhero</option>
                <option value='united'>United</option>
                <option value='yeti'>Yeti</option>
            </select>
        </div>

        <span id='loading' style='display:none'>loading theme...</span>

    </div>

    <div class='right'>
        <span class='credits' data-credit-id='bootstrap-standard' style='display:none'>
            <a href='https://getbootstrap.com/docs/3.3/' target='_blank'>Theme by Bootstrap</a>
        </span>
        <span class='credits' data-credit-id='bootstrap-custom' style='display:none'>
            <a href='https://bootswatch.com/' target='_blank'>Theme by Bootswatch</a>
        </span>
    </div>

    <div class='clear'></div>
</div>

<div id='calendar'></div>



<!-- CALENDARIO -->

<!-- Fin Contenido -->


</div>

</div>

</div>


</body>

</html>