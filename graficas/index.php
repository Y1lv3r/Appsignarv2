<html>
<?php include("../modulos/Grafica.php")?>
<?php include ("../menus.php") ?>
<?php include ("../modulos/cabeceras/cabeceraPrincipal.php")?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Generar reportes con Google Charts, PHP, jQuery y MySQL</title>
  <!-- Latest compiled and minified CSS -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function errorHandler(errorMessage) {
      //curisosity, check out the error in the console
      console.log(errorMessage);
      //simply remove the error, the user never see it
      google.visualization.errors.removeError(errorMessage.id);
    }

    function drawVisualization() {
      // Some raw data (not necessarily accurate)
      var periodo = $("#periodo").val(); //Datos que enviaremos para generar una consulta en la base de datos
      var division = $("#division").val(); //Datos que enviaremos para generar una consulta en la base de datos
      var jsonData = $.ajax({
        url: 'chart.php',
        data: {
          'periodo': periodo,
          'division': division,
          'action': 'ajax'
        },
        dataType: 'json',
        async: false
      }).responseText;

      var obj = jQuery.parseJSON(jsonData);
      var data = google.visualization.arrayToDataTable(obj);



      var options = {
        title: 'REPORTE DE ASIGNADOS VS LIBRES ' + periodo + ' ' + division,
        vAxis: {
          title: 'Porcentaje'
        },
        hAxis: {
          title: 'Meses'
        },
        seriesType: 'bars',
        series: {
          5: {
            type: 'line'
          }
        }
      };

      var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
      google.visualization.events.addListener(chart, 'error', errorHandler);
      chart.draw(data, options);
    }


    // Haciendo los graficos responsivos
    jQuery(document).ready(function() {
      jQuery(window).resize(function() {
        drawVisualization();
      });
    });
  </script>
</head>

<body>


  <?php
  include("conexion.php");

  ?>
  <div class="container" style="margin-top:10px">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class='row'>
        <div  class='col-md-4'>
          <label for="estado" class="m-0 font-weight-bold text-primary" class="label">Selecciona Division:</label>
          <select class="custom-select form-control mb-2 mr-sm-2 form-control " id="division" onchange="drawVisualization();" class="form-control">
           
            <?php foreach ($listaDivision as $opciones) : ?>
              <option  value="<?php echo $opciones['Nombre'] ?>"><?php echo $opciones['Nombre'] ?></option>

            <?php endforeach ?>
          </select>
        </div>
        <div hidden class='col-md-4'>
          <label>Selecciona período</label>
          <select id="periodo" onchange="drawVisualization();" class="form-control">
            <option value='2021'>Período 2021</option>
            <option value='2022' selected>Período 2022</option>
            <option value='2023'>Período 2023</option>
            <option value='2024'>Período 2024</option>
          </select>
        </div>
        
      </div>
      <hr>
      <div id="chart_div" style="width: 100%; height: 450px;"></div>
    </div>

  </div> <!-- /container -->


  <?php include("../piedepagina.php")?>
</body>

</html>