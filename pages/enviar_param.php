<?php
setlocale(LC_ALL, "es_ES");
// Connexion a la base de datos
require_once('../global/conexion.php');
//echo $_POST['title'];



if (isset($_POST['hora_in']) && isset($_POST['hora_fin'])) {

    $hora_in = (isset($_POST['hora_in'])) ? $_POST['hora_in'] : "";
    $hora_fin = (isset($_POST['hora_fin'])) ? $_POST['hora_fin'] : "";

    $horaif = $hora_in;
    $horaff = $hora_fin;

    $hora_in .= ":00";
    $hora_fin .= ":00";
    //echo $hora_in . "<br>";
    //echo $hora_fin . "<br>";
    //echo "entro en las horas <br>";
    $sql = "UPDATE hora_laboral SET  hora_inicio = '$hora_in', hora_fin = '$hora_fin' WHERE id = 1 ";
    $query = $bdd->prepare($sql);
    if ($query == false) {
        print_r($bdd->errorInfo());
        die('Erreur prepare');
    }
    $res = $query->execute();
    if ($res == false) {
        print_r($query->errorInfo());
        die('Erreur execute');
    }

    //******************Hora total laborales***************************** */
    $sql2 = "SELECT @valor := TIMESTAMPDIFF(hour, hora_inicio, hora_fin) as total, (@valor - 1) as hora_lab,((@valor - 1) *5)as semana from hora_laboral; ";
    $requ = $bdd->prepare($sql2);
    $requ->execute();
    $result = $requ->fetchAll();
    $hora_fi = '';
    $semana = '';
    foreach ($result as $resultado) :
        $semana = $resultado['semana'];
        $hora_fi = $resultado['hora_lab'];
    endforeach;


    $sql = "UPDATE hora_laboral SET total = '$hora_fi',totalhoras='$totalhoras',totalsemana='$semana' WHERE id = 1 ";
    $query = $bdd->prepare($sql);
    if ($query == false) {
        print_r($bdd->errorInfo());
        die('Erreur prepare');
    }
    $res = $query->execute();
    if ($res == false) {
        print_r($query->errorInfo());
        die('Erreur execute');
    }
    $valorHoras = 'horas';
    header('Location: ../jornada_laboral.php?valorHoraj=<?php echo $valorHoras;?>');
}
/*******************seleccion fin de semana***************************** */
if (isset($_POST['radio'])) {

    $fin_semana = (isset($_POST['radio'])) ? $_POST['radio'] : "";

    //echo "resultado " . $fin_semana . "<br>";

    if ($fin_semana == 'true') {
        //echo "este es el true" . $fin_semana . "<br>";
        $sqlfs = "UPDATE fin_semana SET fin_de_semana = '$fin_semana' WHERE id = 1;";
        $queryfs = $bdd->prepare($sqlfs);
        if ($queryfs == false) {
            print_r($bdd->errorInfo());
            die('Erreur prepare');
        }
        $resfs = $queryfs->execute();
        if ($resfs == false) {
            print_r($queryfs->errorInfo());
            die('Erreur execute');
        }
        $valorfinde1 = 'yaesta';
        header('Location: ../findesemana.php?valorfinde11=<?php echo $valorfinde1;?>');
    } elseif ($fin_semana == 'false') {
        //echo "este es el false" . $fin_semana . "<br>";
        $sqlfsf = "UPDATE fin_semana SET fin_de_semana = '$fin_semana' WHERE id = 1;";
        $queryfsf = $bdd->prepare($sqlfsf);
        if ($queryfsf == false) {
            print_r($bdd->errorInfo());
            die('Erreur prepare');
        }
        $resfsf = $queryfsf->execute();
        if ($resfsf == false) {
            print_r($queryfsf->errorInfo());
            die('Erreur execute');
        }
        $valorfinde2 = 'yaesta';
        header('Location: ../findesemana.php?valorfinde22=<?php echo $valorfinde2;?>');
    }
}
/*******************Dias festivos***************************** */


$link = mysqli_connect("localhost", "root", "");
if ($link) {
    mysqli_select_db($link, "appsignar_cambios");
}
if (isset($_POST['Festivo_dia'])) {

    $Festivo_dia = (isset($_POST['Festivo_dia'])) ? $_POST['Festivo_dia'] : "";

    $festivoDia = date("Y/m/d", strtotime($Festivo_dia));

    echo $festivoDia . "<br>";

    /*********************************************************************************** */
   		$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
		$dia = $dias[date("w", strtotime($Festivo_dia))];
		echo "<br>" . $dia . "<br>";
    /************************************************************************************ */
    $verificar = null;

    $veri = "SELECT fecha FROM dias_festivos WHERE fecha = '$festivoDia';";
    $verificar = mysqli_query($link, $veri);

    if (mysqli_num_rows($verificar) > 0) {
        $valorenviar2 = 'yaesta';
        header('Location: ../festivos.php?variable2=<?php echo $valorenviar2;?>');
    } else {
        echo $sqldf = "INSERT INTO dias_festivos(fecha,dia) values ('$festivoDia','$dia');";
        $querydf = $bdd->prepare($sqldf);
        if ($querydf == false) {
            print_r($bdd->errorInfo());
            die('Erreur prepare');
        }
        $resdf = $querydf->execute();
        if ($resdf == false) {
            print_r($querydf->errorInfo());
            die('Erreur execute');
        }
        $valorenviar = 'festivo';
        header('Location: ../festivos.php?variable=<?php echo $valorenviar;?>');
    }
}

//header('Location: ' . $_SERVER['HTTP_REFERER']);
