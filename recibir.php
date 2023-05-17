<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("./global/conexion.php");


//echo "soy empleado en modulos" 
$link = mysqli_connect("localhost", "root", "");
if ($link) {
    mysqli_select_db($link, "appsignar_cambios");
}



/* RECIBE EL NOMBRE DEL FORMULARIO */
$empleado = (isset($_POST['empleado'])) ? $_POST['empleado'] : "";
/******************* */
echo $empleado . "primero<br>";

$sentenciaSQL = $bdd->prepare("SELECT DISTINCT empleado FROM events WHERE empleado LIKE '%$empleado%' ");
$sentenciaSQL->execute();
$NomEmpleados = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
$numeroRegistros = $sentenciaSQL->rowCount();

if ($numeroRegistros >= 1) {
    echo $nom['Nombre'] . "<br>";
    echo $_SESSION['emple'];
    echo $calendarios = $empleadoprueba['empleado'];
    header('Location: asignar.php?nombresi='.$empleado);
} else {
?>
    <script>
        Swal.fire('no se encontraron asignaciones de este empleado')
    </script>
<?php
    $variable1 = 'NO';
    header('Location: asignar.php?variable1='.$variable1);
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//header('Location: ' . $_SERVER['HTTP_REFERER']);