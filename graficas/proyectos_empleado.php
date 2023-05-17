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
     $empleado = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
     $division = (isset($_POST['division'])) ? $_POST['division'] : "";
                 $mes= (isset($_POST['mes'])) ? $_POST['mes'] : "";

                 if($mes==1){
                    $me= 160;
                }else if($mes== 2 ){
                $me = 160;
                }else if($mes==3  ){
                    $me=176;
                }else if($mes==4  ){
                    $me=152;
                }else if($mes==5 ) {
                    $me=168;
                }else if($mes==6  ){
                    $me=160;
                }else if($mes==7  ){
                    $me=152;
                }else if($mes==8 ){
                    $me=176;
                }else if($mes==9 ){
                    $me=176;
                }else if($mes==10 ){
                    $me=160;
                }else if($mes==11 ){
                    $me=160;
                }else if($mes==12  ){
                    $me=168;
                };

                if($mesactual==1){
                    $mea= 160;
                }else if($mesactual== 2 ){
                     $mea= 160;
                }else if($mesactual==3  ){
                    $mea=176;
                }else if($mesactual==4  ){
                    $mea=152;
                }else if($mesactual==5 ) {
                    $mea=168;
                }else if($mesactual==6  ){
                    $mea=160;
                }else if($mesactual==7  ){
                    $mea=152;
                }else if($mesactual==8 ){
                    $mea=176;
                }else if($mesactual==9 ){
                    $mea=176;
                }else if($mesactual==10 ){
                    $mea=160;
                }else if($mesactual==11 ){
                    $mea=160;
                }else if($mesactual==12  ){
                    $mea=168;

                };


 $evedisa = 'AGP';
 if($division==null or $mes==null){
    $query = "SELECT DATE(start) AS FECHA,ROUND((SUM(horas_asignadas_total_dia)/ ($h*20))* 100,1) as Asignado,empleado,title from (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas_total_dia,month(start) as mes,semana,dia, empleado,title FROM `events` WHERE empleado LIKE '%%' and month(start) LIKE '%$mesactual%' and  title  LIKE  '%$evedisa%' GROUP by empleado,start,title)b1 GROUP by empleado"; // select column
    
    $aresult = $con->query($query);
 }else{
     
    $query = "SELECT DATE(start) AS FECHA,ROUND((SUM(horas_asignadas_total_dia)/ ($h*20))* 100,1) as Asignado,empleado,title from (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas_total_dia,month(start) as mes,semana,dia, empleado,title FROM `events` WHERE empleado LIKE '%$empleado%' and month(start) LIKE '%$mes%' and  title  LIKE  '%$division%' GROUP by empleado,start,title)b1 GROUP by empleado"; // select column
   
   $aresult = $con->query($query);

 }
 if ($division== null) {
    $division = $evedisa ;
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
    <title>Massive Electronics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['Empleado','Proyecto: <?php echo $division ?> | %'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["empleado"]."', ".$row["Asignado"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Asignación en el proyecto: <?php echo $division?> - Mes: <?php 
               
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
                bars: 'vertical'
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