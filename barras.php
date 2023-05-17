<?php include("./botonup.php") ?>
<?php include("modulos/calendario.php") ?>
<?php include("./cabeceras/cabecera_Graficas.php") ?>
<?php include("./layout.php") ?>

<!-- Inicio Contenido -->

<style>
    #chart {
        max-width: 650px;
        margin: 35px auto;
    }
</style>

<script>
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
    window.Promise ||
        document.write(
            '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
</script>


<script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script>

<script>
    // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
    // Based on https://gist.github.com/blixt/f17b47c62508be59987b
    var _seed = 42;
    Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
    };
</script>

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

                        <div class="form-group col-md-4">
                            <input type="search" name="empleado" list="empleados" class="form-control mb-2 mr-sm-2 form-control bg-light " placeholder="Nombre..." required>
                            <datalist id="empleados">
                                <?php foreach ($listaEmpleados as $opciones) : ?>
                                    <option value="<?php echo $opciones['Nombre'] ?>"></option>
                                <?php endforeach ?>
                            </datalist>
                            <input type="text" name="nomasignador" style="display:none" value="<?php echo $nom['Nombre']; ?>" />
                        </div>

                        <div class="form-group col-md-4">
                            <button value="" class="btn btn-primary" name="accion">Consultar</button>
                        </div>
                    </ul>
                </form>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <h5 class="m-0 font-weight-bold" class="label" align="center">
                            Porcentaje de asignación mensual en el proyecto "<?php echo $division; ?>"<br>en el año <?php echo date('Y'); ?>
                            <hr>
                        </h5>
                        <div class="table-responsive" id="app"></div>
                        <h6 class="m-0 font-weight" class="label" align="center">
                            <?php
                            $nombre = $nom['Nombre'];
                            if ($empleado == null) {
                                echo $empleado = $nombre;
                            } else {
                                echo $empleado;
                            }; ?>
                            <hr>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/babel">
    class ApexChart extends React.Component {
      constructor(props) {
        super(props);
        
        this.state = {
          series: [{
            name: '<?php echo $division; ?> ',
            data: [
              <?php
                $nombre = $nom['Nombre'];
                if ($empleado == null or $division == null) {
                    $empleado = $nombre;
                    $division = 'EVEDISA';
                }

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as enero from events where MONTH(start) = 1 
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $ene = $registrosr['enero'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as febrero from events where MONTH(start) = 2 
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $feb = $registrosr['febrero'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as marzo from events where MONTH(start) = 3 
              and estado='Asignado' and title = '$division' and empleado = '$empleado'; ";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $Mar = $registrosr['marzo'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as abril from events where MONTH(start) = 4 
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $abri = $registrosr['abril'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as mayo from events where MONTH(start) = 5 
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $may = $registrosr['mayo'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as junio  from events where MONTH(start) = 6
              and estado='Asignado' and title = '$division' and empleado = '$empleado'; ";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $jun = $registrosr['junio'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as julio  from events where MONTH(start) = 7 
              and estado='Asignado' and title = '$division' and empleado = '$empleado'; ";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $jul = $registrosr['julio'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as agosto  from events where MONTH(start) = 8
              and estado='Asignado' and title = '$division' and empleado = '$empleado'; ";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $ago = $registrosr['agosto'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as septiembre  from events where MONTH(start) = 9 
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $seb = $registrosr['septiembre'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as octubre from events where MONTH(start) = 10
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $oct = $registrosr['octubre'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as noviembre  from events where MONTH(start) = 11
              and estado='Asignado' and title = '$division' and empleado = '$empleado'; ";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $nov = $registrosr['noviembre'];
                };

                $sqlr = "SELECT ROUND((SUM(TIMESTAMPDIFF(hour,start,end))/180)*100,1) as diciembre from events where MONTH(start) = 12
              and estado='Asignado' and title = '$division' and empleado = '$empleado';";
                $resultr = mysqli_query($con, $sqlr);

                while ($registrosr = mysqli_fetch_array($resultr)) {
                    $dic = $registrosr['diciembre'];
                };
                ?>
              
              <?php if ($ene == '') {
                    echo $en = 0;
                } else {
                    echo $ene;
                }; ?>, <?php echo $feb ?> ,<?php echo $Mar ?>,  <?php echo $abri ?>,  <?php echo $may ?>
                ,  <?php echo $jun ?>,  <?php echo $jul ?>,  <?php echo $ago ?>,  <?php echo $seb ?>,  <?php echo $oct ?>
                ,  <?php echo $nov ?>,  <?php echo $dic ?>]
                }],
                options: {
                  chart: {
                    height: 350,
                    type: 'bar',
                    },
                    plotOptions: {
                      bar: {
                        borderRadius: 10,
                        dataLabels: {
                          position: 'top', // top, center, bottom
                          },
                      }
                    },
                    dataLabels: {
                      enabled: true,
                      formatter: function (val) {
                        return val + "%";
                      },
                      offsetY: -20,
                      style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                      }
                    },
                    xaxis: {
                      categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                      
                      position: 'bottom',
                      axisBorder: {
                        show: false
                      },
                      axisTicks: {
                        show: false
                      },
                      crosshairs: {
                        fill: {
                          type: 'gradient',
                          gradient: {
                            colorFrom: '#D8E3F0',
                            colorTo: '#BED1E6',
                            stops: [0, 100],
                            opacityFrom: 0.4,
                            opacityTo: 0.5,
                          }
                        }
                      },
                      tooltip: {
                        enabled: true,
                      }
                    },
                    yaxis: {
                      axisBorder: {
                        show: false
                      },
                      axisTicks: {
                        show: false,
                      },
                      labels: {
                        show: false,
                        formatter: function (val) {
                          return val + "%";
                        }
                      }
                    },
                    title: {
                      text: '',
                      floating: true,
                      offsetY: 330,
                      align: 'center',
                      style: {
                        color: '#444'
                      }
                    }
                  },
                };
              }
              
            render() {
              return (
                <div>
                  <div id="chart">
                    <ReactApexChart options={this.state.options} series={this.state.series} type="bar" height={350} />
                  </div>
                  <div id="html-dist"></div>
                </div>
              );
            }
          }
          
        const domContainer = document.querySelector('#app');
        ReactDOM.render(React.createElement(ApexChart), domContainer);
  </script>

<!-- Fin Contenido -->

</div>

</div>

</div>


</body>

</html>