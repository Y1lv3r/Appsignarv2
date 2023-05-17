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
     //suma de horas por año en divison 01
     $sd1 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO01'";
     $suma01 = $con->query($sd1); 
     while($row = mysqli_fetch_assoc($suma01)){
         $c1= $row['tota'];
         $c1m= $row['mes'];
         }
    //suma de horas por año en divison 02
    $sd2 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO02'";
    $suma02 = $con->query($sd2); 
    while($row = mysqli_fetch_assoc($suma02)){
        $c2= $row['tota'];
        $c2m= $row['mes'];
        }//suma de horas por año en divison 03
    $sd3 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO03'";
    $suma03 = $con->query($sd3); 
    while($row = mysqli_fetch_assoc($suma03)){
        $c3= $row['tota'];
        $c3m= $row['mes'];
        }
        //suma de horas por año en divison 04
    $sd4 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO04'";
    $suma04 = $con->query($sd4); 
    while($row = mysqli_fetch_assoc($suma04)){
        $c4= $row['tota'];
        $c4m= $row['mes'];
        }
    //suma de horas por año en divison 05
    $sd5 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO05'";
    $suma05 = $con->query($sd5); 
    while($row = mysqli_fetch_assoc($suma05)){
        $c5= $row['tota'];
        $c5m= $row['mes'];
        }
   
    //suma de horas por año en divison 06
    $sd6 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO06'";
    $suma06 = $con->query($sd6); 
    while($row = mysqli_fetch_assoc($suma06)){
        $c6= $row['tota'];
        $c6m= $row['mes'];
        }//suma de horas por año en divison 07
    $sd7 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO07'";
    $suma07 = $con->query($sd7); 
    while($row = mysqli_fetch_assoc($suma07)){
        $c7= $row['tota'];
        $c7m= $row['mes'];
        }
        //suma de horas por año en divison 08
    $sd8 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO08'";
    $suma08 = $con->query($sd8); 
    while($row = mysqli_fetch_assoc($suma08)){
        $c8= $row['tota'];
        $c8m= $row['mes'];
        }
    //suma de horas por año en divison 09
    $sd9 ="SELECT  COUNT(division) as total,(COUNT(division)*2160) as tota,(COUNT(division)*180) as mes FROM empleados WHERE division='CO09'";
    $suma09 = $con->query($sd9); 
    while($row = mysqli_fetch_assoc($suma09)){
        $c9= $row['tota'];
        $c9m= $row['mes'];
        }
    $mesdiv= (isset($_POST['mesdiv'])) ? $_POST['mesdiv'] : "";

    if ($mesdiv==13 or $mesdiv==null) {
    ///division CO01  
    $d1 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c1))* 100,1) as Asignado,ROUND( (($c1)-SUM(horas_asignadas))/($c1)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO01' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
    ///division CO02    
    $d2 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c2))* 100,1) as Asignado,ROUND( (($c2)-SUM(horas_asignadas))/($c2)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO02'
     GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
    ///division CO03  
   $d3 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c3))* 100,1) as Asignado,ROUND( (($c3)-SUM(horas_asignadas))/($c3)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO03' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
    ///division CO04    
    $d4 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c4))* 100,1) as Asignado,ROUND( (($c4)-SUM(horas_asignadas))/($c4)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO04' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";

    ///division CO05
    $d5 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c5))* 100,1) as Asignado,ROUND( (($c5)-SUM(horas_asignadas))/($c5)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO05'
     GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
    ///division CO06    
    $d6 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c6))* 100,1) as Asignado,ROUND( (($c6)-SUM(horas_asignadas))/($c6)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO06' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
    ///division CO07
    $d7 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c7))* 100,1) as Asignado,ROUND( (($c7)-SUM(horas_asignadas))/($c7)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO07' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
    ///division CO08  
    $d8 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c8))* 100,1) as Asignado,ROUND( (($c8)-SUM(horas_asignadas))/($c8)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO08' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
    ///division CO09  
    $d9 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c9))* 100,1) as Asignado,ROUND( (($c9)-SUM(horas_asignadas))/($c9)*100,1) as Libre  from 
    (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
    WHERE estado='Asignado' and month(start) in (1,2,3,4,5,6,7,8,9,10,11,12) and division_e= 'CO09' 
    GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
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
    }else{
        ///division CO01  
        $d1 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c1m))* 100,1) as Asignado,ROUND( (($c1m)-SUM(horas_asignadas))/($c1m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO01' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
        ///division CO02    
        $d2 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c2m))* 100,1) as Asignado,ROUND( (($c2m)-SUM(horas_asignadas))/($c2m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO02'
         GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
        ///division CO03  
       $d3 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c3m))* 100,1) as Asignado,ROUND( (($c3m)-SUM(horas_asignadas))/($c3m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO03' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
        ///division CO04    
        $d4 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c4m))* 100,1) as Asignado,ROUND( (($c4m)-SUM(horas_asignadas))/($c4m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO04' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";

        ///division CO05
        $d5 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c5m))* 100,1) as Asignado,ROUND( (($c5m)-SUM(horas_asignadas))/($c5m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO05'
         GROUP by division_e,estado,start,empleado)b1 GROUP by division_e"; 
        ///division CO06    
        $d6 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c6m))* 100,1) as Asignado,ROUND( (($c6m)-SUM(horas_asignadas))/($c6m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO06' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
        ///division CO07
        $d7 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c7m))* 100,1) as Asignado,ROUND( (($c7m)-SUM(horas_asignadas))/($c7m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO07' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
        ///division CO08  
        $d8 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c8m))* 100,1) as Asignado,ROUND( (($c8m)-SUM(horas_asignadas))/($c8m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO08' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
        ///division CO09  
        $d9 = "SELECT division_e,ROUND((SUM(horas_asignadas)/ ($c9m))* 100,1) as Asignado,ROUND( (($c9m)-SUM(horas_asignadas))/($c9m)*100,1) as Libre  from 
        (SELECT start,TIMESTAMPDIFF(hour,start,end) as horas_asignadas,division_e,estado FROM `events` 
        WHERE estado='Asignado' and month(start) in ($mesdiv) and division_e= 'CO09' 
        GROUP by division_e,estado,start,empleado)b1 GROUP by division_e";
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
                ['division','<?php 
                if($mesdiv==13 or $mesdiv==null){
                    echo 'Todo el año';
                }else if($mesdiv==1){
                   echo 'Enero';
               }else if($mesdiv== 2){
                   echo 'Febrero';
               }else if($mesdiv==3){
                   echo 'Marzo';
               }else if($mesdiv==4){
                echo 'Abril';
               }else if($mesdiv==5){
                echo 'Mayo';
               }else if($mesdiv==6){
                echo 'Junio';
               }else if($mesdiv==7){
                echo 'Julio';
               }else if($mesdiv==8){
                echo 'Agosto';
               }else if($mesdiv==9){
                echo 'Septiembre';
               }else if($mesdiv==10){
                echo 'Octubre';
               }else if($mesdiv==11){
                echo 'Noviembre';
               }else if($mesdiv==12){
                echo 'Diciembre';
               }?>  - % Asignado','<?php 

               if($mesdiv==13 or $mesdiv==null){
                echo 'Todo el año';
                }else if($mesdiv==1){
                   echo 'Enero';
               }else if($mesdiv== 2){
                   echo 'Febrero';
               }else if($mesdiv==3){
                   echo 'Marzo';
               }else if($mesdiv==4){
                echo 'Abril';
               }else if($mesdiv==5){
                echo 'Mayo';
               }else if($mesdiv==6){
                echo 'Junio';
               }else if($mesdiv==7){
                echo 'Julio';
               }else if($mesdiv==8){
                echo 'Agosto';
               }else if($mesdiv==9){
                echo 'Septiembre';
               }else if($mesdiv==10){
                echo 'Octubre';
               }else if($mesdiv==11){
                echo 'Noviembre';
               }else if($mesdiv==12){
                echo 'Diciembre';
               }?> - % Libre'],
                   ///co01
                   <?php
                    while($row = mysqli_fetch_assoc($co01)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                 ///co02
                 <?php
                    while($row = mysqli_fetch_assoc($co02)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                ///co03
                <?php
                    while($row = mysqli_fetch_assoc($co03)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                  ///co04
                  <?php
                    while($row = mysqli_fetch_assoc($co04)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                  ///co05
                  <?php
                    while($row = mysqli_fetch_assoc($co05)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
               ///co06
                <?php
                    while($row = mysqli_fetch_assoc($co06)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                ///co07
                <?php
                    while($row = mysqli_fetch_assoc($co07)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                  ///co08
                  <?php
                    while($row = mysqli_fetch_assoc($co08)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
                  ///co09
                  <?php
                    while($row = mysqli_fetch_assoc($co09)){
                        echo "['".$row["division_e"]."', ".$row["Asignado"].", ".$row["Libre"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Asignados Vs. Libres - Divisiones en: <?php 
               
               if($mesdiv==13 or $mesdiv==null){
                echo 'Todo el año';
                }else if($mesdiv==1){
                   echo 'Enero';
               }else if($mesdiv== 2){
                   echo 'Febrero';
               }else if($mesdiv==3){
                   echo 'Marzo';
               }else if($mesdiv==4){
                echo 'Abril';
               }else if($mesdiv==5){
                echo 'Mayo';
               }else if($mesdiv==6){
                echo 'Junio';
               }else if($mesdiv==7){
                echo 'Julio';
               }else if($mesdiv==8){
                echo 'Agosto';
               }else if($mesdiv==9){
                echo 'Septiembre';
               }else if($mesdiv==10){
                echo 'Octubre';
               }else if($mesdiv==11){
                echo 'Noviembre';
               }else if($mesdiv==12){
                echo 'Diciembre';
               }
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