<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
define("DB_NAME", "appsignar_cambios");
define("DB_USER", "root");
define("DB_PASS", "");

class Conexion{
    public $cnx;
    public function conectar(){
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
            );
            $this->cnx = new PDO(
                "mysql:host=localhost;
                dbname=".DB_NAME,
                DB_USER, 
                DB_PASS,
                $opciones
            );
            return $this->cnx;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function desconectar(){
        $this->cnx = null;
    }
}
class Consulta{
    private $_db;
    private  $lista_usuarios;

    public function __construct(){
        $this->_db = new Conexion();
    }

    public function buscar(){
        
        $this->_db->conectar();

        $consulta = $this->_db->cnx->prepare("SELECT * FROM dias_festivos");
        
        $consulta->execute();

        while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            $this->lista_usuarios[] =$row;
        }

        $this->_db->desconectar();
        return $this->lista_usuarios;

    }

}

$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>fecha</th> <th>dia</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr> <td>".$r->fecha."</td> <td>".$r->dia."</td> </tr>";
}
$salida .= "</table>";




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"Festivos.xls\"");
header("Expires: 0");
header("Cache-Control: max-age=0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo $salida;
?>
