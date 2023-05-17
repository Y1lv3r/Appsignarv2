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
    $query = "SELECT total from hora_laboral"; // select column
    $aresu = $con->query($query);

    while($row = mysqli_fetch_assoc($aresu)){
       $h= $row["total"];
    }
   $mesactual= date("n");
  //echo $DIV=['division'];
    $nombreem= $nom['Nombre'];
    $divisionem= $per['Division'];

    
    $division = (isset($_POST['division'])) ? $_POST['division'] : "";
                $mes= (isset($_POST['mes'])) ? $_POST['mes'] : "";
    if ($division == null or $mes == null){
    $query = "SELECT DATE(start) AS FECHA,ROUND((SUM(horas_asignadas_total_dia)/ ($h*20))* 100,1) as Asignado, ROUND( (($h*20)-SUM(horas_asignadas_total_dia))/($h*20)*100,1) as Libre,empleado,title from (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas_total_dia,month(start) as mes,semana,dia, empleado,title FROM `events` WHERE empleado LIKE '%%' and month(start) LIKE '%$mesactual%' and  division_e LIKE  '%$divisionem%' GROUP by empleado,start,division_e)b1 GROUP by empleado"; // select column
    $aresult = $con->query($query);


}else{
    $query = "SELECT DATE(start) AS FECHA,ROUND((SUM(horas_asignadas_total_dia)/ ($h*20))* 100,1) as Asignado, ROUND( (($h*20)-SUM(horas_asignadas_total_dia))/($h*20)*100,1) as Libre,empleado,title from (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas_total_dia,month(start) as mes,semana,dia, empleado,title FROM `events` WHERE empleado LIKE '%%' and month(start) =$mes and division_e = '$division' GROUP by empleado,start,division_e)b1 GROUP by empleado"; // select column
    $aresult = $con->query($query);
    
}
    if ($division== null) {
        $division = $divisionem;
    }
    if($mesactual==1){
        $mesactual = 'Enero';
   }else if($mesactual== 2){
    $mesactual = 'Febrero';
   }else if($mesactual==3){
    $mesactual = 'Marzo';
   }else if($mesactual==4){
    $mesactual = 'Abril';
   }else if($mesactual==5){
    $mesactual = 'Mayo';
   }else if($mesactual==6){
    $mesactual = 'Junio';
   }else if($mesactual==7){
    $mesactual = 'Julio';
   }else if($mesactual==8){
    $mesactual = 'Agosto';
   }else if($mesactual==9){
    $mesactual = 'Septiembre';
   }else if($mesactual==10){
    $mesactual = 'Octubre';
   }else if($mesactual==11){
    $mesactual = 'Noviembre';
   }else if($mesactual==12){
    $mesactual = 'Diciembre';
   }


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
                ['empleado','Division: <?php  echo $division   ?> - Mes: <?php 
               
               if($mes==null){
                echo $mesactual;
               }else if($mes==1){
                   echo 'Enero';
               }else if($mes== 2){
                   echo 'Febrero';
               }else if($mes==3){
                   echo 'Marzo';
               }else if($mes==4){
                echo 'Abril';
               }else if($mes==5){
                echo 'Mayo';
               }else if($mes==6){
                echo 'Junio';
               }else if($mes==7){
                echo 'Julio';
               }else if($mes==8){
                echo 'Agosto';
               }else if($mes==9){
                echo 'Septiembre';
               }else if($mes==10){
                echo 'Octubre';
               }else if($mes==11){
                echo 'Noviembre';
               }else if($mes==12){
                echo 'Diciembre';
               }?>  | % Asignado','División: <?php echo $division?> - Mes: <?php 
               
               if($mes==null){
                echo $mesactual;
               }else if($mes==1){
                   echo 'Enero';
               }else if($mes== 2){
                   echo 'Febrero';
               }else if($mes==3){
                   echo 'Marzo';
               }else if($mes==4){
                echo 'Abril';
               }else if($mes==5){
                echo 'Mayo';
               }else if($mes==6){
                echo 'Junio';
               }else if($mes==7){
                echo 'Julio';
               }else if($mes==8){
                echo 'Agosto';
               }else if($mes==9){
                echo 'Septiembre';
               }else if($mes==10){
                echo 'Octubre';
               }else if($mes==11){
                echo 'Noviembre';
               }else if($mes==12){
                echo 'Diciembre';
               }?> | % Libre'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["empleado"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Asignados Vs. Libres Empleado | División: <?php echo $division?> - Mes: <?php 
               
               if($mes==null){
                echo $mesactual;
               }else if($mes==1){
                   echo 'Enero';
               }else if($mes== 2){
                   echo 'Febrero';
               }else if($mes==3){
                   echo 'Marzo';
               }else if($mes==4){
                echo 'Abril';
               }else if($mes==5){
                echo 'Mayo';
               }else if($mes==6){
                echo 'Junio';
               }else if($mes==7){
                echo 'Julio';
               }else if($mes==8){
                echo 'Agosto';
               }else if($mes==9){
                echo 'Septiembre';
               }else if($mes==10){
                echo 'Octubre';
               }else if($mes==11){
                echo 'Noviembre';
               }else if($mes==12){
                echo 'Diciembre';
               }
                 ?> ',
                curveType: 'function',
                legend: { position: 'bottom' },
                
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('areachart'));
            chart.draw(data, options);
        }

    </script>
</head>
<body>
    <div id="areachart" class="text-center" style="width: 1035px; height: 400px"></div>
</body>
</html>