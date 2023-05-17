<?php
    $servername = "localhost";
    $username = "root";
    $password = "";  //your database password
    $dbname = "appsignar_cambios";  //your database name

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else
    {
        //echo ("Connect Successfully");
    }
    $query = "SELECT ROUND(sum(horasasignadas)/ (sum(horasasignadas) + sum(horaslibre))* 100,1) as Asignado ,ROUND(sum(horaslibre)/ (sum(horasasignadas) + sum(horaslibre))* 100,1) as Libre, division from (SELECT SUM(horas) as horasasignadas,0 horaslibre, division,estado FROM `asignacion` WHERE MONTH(fecha) in (1,2,3,4,5,6,7,8,9,10,11,12) and estado='Asignado' and tipo='Habil' GROUP BY division, estado UNION ALL SELECT 0 horasasignadas, SUM(horas) as horaslibre, division, estado FROM `asignacion` WHERE MONTH(fecha)in (1,2,3,4,5,6,7,8,9,10,11,12) and estado='Libre' and tipo='Habil' GROUP BY division,estado) b1 GROUP by division"; // select column
    
    $aresult = $con->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Massive Electronics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['division','Asignado %','Libre %'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["division"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Asignado Vs Libres Total en el año por division',
                curveType: 'function',
                legend: { position: 'bottom' },
                
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('areachart'));
            chart.draw(data, options);
        }

        // Haciendo los graficos responsivos
        jQuery(document).ready(function() {
        jQuery(window).resize(function() {
            drawChart();
        });
    });
    </script>
</head>
<body>
<div class="container" style="margin-top:10px">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class='row'>
        
        <div class='col-md-4'>
          <label>Selecciona Mes</label>
          <select id="periodo" onchange="drawVisualization();" class="form-control">
          <option value='Tanio' selected>Todo el año</option>
            <option value='Enero' >Enero</option>
            <option value='Febrero'>Febrero</option>
            <option value='Marzo'>Marzo</option>
            <option value='Abril'>Abril</option>
            <option value='Mayo'>Mayo</option>
            <option value='Junio'>Junio</option>
            <option value='Julio'>Julio</option>
            <option value='Agosto'>Agosto</option>
            <option value='Septiembre'>Septiembre</option>
            <option value='Octubre'>Octubre</option>
            <option value='Noviembre'>Noviembre</option>
            <option value='Diciembre'>Diciembre</option>
          </select>
        </div>
        
      </div>
      <hr>
      <div id="areachart" style="width: 100%; height: 450px;"></div>
    </div>

  </div> <!-- /container -->
    
</body>
</html>