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

    </script>
</head>
<body>
     <div id="areachart" style="width: 900px; height: 400px"></div>
</body>
</html>