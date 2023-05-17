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
     //suma de horas por año en divison
     $divisionem= $per['Division'];
     $division = (isset($_POST['division'])) ? $_POST['division'] : "";
     if ($division == null ){
     $sd1 ="SELECT  (COUNT(division)*180) as mes FROM empleados WHERE division='$divisionem'";
     $suma01 = $con->query($sd1); 
           while($row = mysqli_fetch_assoc($suma01)){
        
                  $c1m= $row['mes'];
              }
        }else{
            $sd1 ="SELECT  (COUNT(division)*180) as mes FROM empleados WHERE division='$division'";
            $suma01 = $con->query($sd1); 
            while($row = mysqli_fetch_assoc($suma01)){
               
                $c1m= $row['mes'];
                }

        }
        if ($division== null) {
            $division = $divisionem;
        }
       
   
  
    ///division CO01  
    $d1 = "SELECT (CASE WHEN month(start) = 1 THEN 'ENERO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (1) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e"; 
    ///division CO02    
    $d2 = "SELECT (CASE WHEN month(start) = 2 THEN 'FEBRERO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (2) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
    ///division CO03  
   $d3 = "SELECT (CASE WHEN month(start) = 3 THEN 'MARZO' END) as mes,division_e,
   ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
   (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (3) and division_e= '$division' 
    GROUP by division_e,estado,start,empleado)
    b1 GROUP by division_e"; 
    ///division CO04    
    $d4 = "SELECT (CASE WHEN month(start) = 4 THEN 'ABRIL' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (4) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";

    ///division CO05
    $d5 = "SELECT (CASE WHEN month(start) = 5 THEN 'MAYO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (5) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e"; 
    ///division $division    
    $d6 = "SELECT (CASE WHEN month(start) = 6 THEN 'JUNIO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (6) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
    ///division CO07
    $d7 = "SELECT (CASE WHEN month(start) = 7 THEN 'JULIO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (7) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
    ///division CO08  
    $d8 = "SELECT (CASE WHEN month(start) = 8 THEN 'AGOSTO' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (8) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
    ///division CO09  
    $d9 = "SELECT (CASE WHEN month(start) = 9 THEN 'SEPTIEMBRE' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (9) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
       ///division CO09  
    $d10 = "SELECT (CASE WHEN month(start) = 10 THEN 'OCTUBRE' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (10) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
       ///division CO09  
    $d11 = "SELECT (CASE WHEN month(start) = 11 THEN 'NOVIEMBRE' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (11) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
       ///division CO09  
    $d12 = "SELECT (CASE WHEN month(start) = 12 THEN 'DICIEMBRE' END) as mes,division_e,
    ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
     WHERE estado='Asignado' and month(start) in (12) and division_e= '$division' 
     GROUP by division_e,estado,start,empleado)
     b1 GROUP by division_e";
        //ejecutadores de consultas  

        $co01 = $con->query($d1);
        $co02 = $con->query($d2);
        $co03 = $con->query($d3);
        $co04 = $con->query($d4);
        $co05 = $con->query($d5);
        $co06 = $con->query($d6);
        $co07 = $con->query($d7);
        $co08 = $con->query($d8);
        $co09 = $con->query($d9);
        $co10 = $con->query($d10);
        $co11 = $con->query($d11);
        $co12 = $con->query($d12);
       
       
?>

<!DOCTYPE html>
<html>
<head>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['division','<?php 
              echo $division?>  - % Asignado','<?php echo $division?> - % Libre'],
                   ///ENERO
                   <?php
                    while($row = mysqli_fetch_assoc($co01)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                 ///FEBREO
                 <?php
                    while($row = mysqli_fetch_assoc($co02)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                 ///MARZO
                 <?php
                    while($row = mysqli_fetch_assoc($co03)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                 //ABRIL
                 <?php
                    while($row = mysqli_fetch_assoc($co04)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //MAYO
                   <?php
                    while($row = mysqli_fetch_assoc($co05)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //JUNIO
                   <?php
                    while($row = mysqli_fetch_assoc($co06)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //JULIO
                   <?php
                    while($row = mysqli_fetch_assoc($co07)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //AGOSTO
                   <?php
                    while($row = mysqli_fetch_assoc($co08)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //SEPTIEMBRE
                   <?php
                    while($row = mysqli_fetch_assoc($co09)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //OCTUBRE
                   <?php
                    while($row = mysqli_fetch_assoc($co10)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //NOVIEMBRE
                   <?php
                    while($row = mysqli_fetch_assoc($co11)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                   //NOMBRE
                   <?php
                    while($row = mysqli_fetch_assoc($co12)){
                        echo "['".$row["mes"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                
               ]);

            var options = {
                title: 'Asignados Vs. Libres - en Division : <?php echo $division
                 ?> ',
                curveType: 'function',
                legend: { position: 'bottom' },
                
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('grafdiv'));
            chart.draw(data, options);
        }

    </script>
</head>
<body>
    <div id="grafdiv" class="text-center" style="width: 1035px; height: 400px"></div>
</body>
</html>